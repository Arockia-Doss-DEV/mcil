<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Auditlog;
use App\Models\SsAttachment;
use App\Models\LogAttachment;
use Illuminate\Support\Facades\Auth;
use PDF;
use Setting;
use Carbon\Carbon;
use File;
use Log;

class AutoRenewReinvestmentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reinvestment:renew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew the reinvestment status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $start_date = Carbon::yesterday();
        $subscriptions = Subscription::with('User', 'McilFund')
                            ->where('status', 6)
                            ->where('reinvestment_request', 1)
                            ->where('redemption_request', 0)
                            ->whereDate('maturity_date', $start_date)
                            ->get();

        Log::info('AutoRenewReinvestmentStatus Date and Time: ' . date('m/d/Y h:i:s a', time()));
                           
        foreach($subscriptions as $subscription){
            
            $user_id = $subscription->user_id;
            $userEntity = User::findOrFail($user_id);

            $subscription_id = $subscription->id;


            $investmentData['username'] = $subscription->User->first_name . $subscription->User->last_name;
            $investmentData['fund_name'] = $subscription->McilFund->name;
            $investmentData['fund_type'] = $subscription->fund_type;
            $investmentData['is_joint_applicant'] = $subscription->is_joint_applicant;
            $investmentData['commence_date'] = $subscription->commence_date;
            $investmentData['subscription'] = $subscription;

            $reinvestmentCount = Subscription::where('user_id', $user_id)->whereNotNull('reinvestment_child_id')->count();
            $investmentData['reinvestment_letter'] = $this->columnNumberToLetter($reinvestmentCount, 1);

            $reference_no = generateInvestementId($investmentData);


            // $subscriptionEntity = Subscription::findOrFail($subscription_id);
            $original = Subscription::findOrFail($subscription_id);
            $copy = $original->replicate();

            $get_seq_no = new Subscription();
            $get_serial_sc = $get_seq_no->get_serial_sc();
            $get_draft_no = $get_seq_no->get_draft_no();

            // $subscription['refreance_id']=$get_serial_sc;
            // $old_commence_date_plus_day = Carbon::parse($subscriptionMail->commence_date)->format('Y-m-d')

            $old_maturity_date = $original['maturity_date'];
            $old_commence_date_plus_day = date('Y-m-d', strtotime($old_maturity_date . ' +1 day'));

            $maturity_date1 = strtotime($old_commence_date_plus_day);
            $maturity_date2 = strtotime('+2 year', $maturity_date1);
            $maturity_date = strtotime('-1 day', $maturity_date2);

            $copy->draft_refrence_id =  $get_draft_no;
            $copy->refreance_id =  $get_serial_sc;
            $copy->reference_no = $reference_no;
            $copy->reinvestment_request = 0;
            $copy->reinvestment_parant_id = $subscription_id;
            $copy->commence_date =  $old_commence_date_plus_day;
            $copy->maturity_date =  date('Y-m-d', $maturity_date);
            $copy->is_reinvestment = 1;
            $copy->status = 0;
            $copy->is_first = 0;
            $copy->created_at = Carbon::now();

            if($original->fund_type == 1){
                $msg_fund_type = "MCIL1";
            }else if($original->fund_type == 2){
                $msg_fund_type = "MCIL2";
            }else if($original->fund_type == 3){
                $msg_fund_type = "MCIL3";
            }else{
                $msg_fund_type = "";
            }

            if ($copy->save()) {
                
                $this->copyDocument($subscription_id, $copy->id);

                $get_serial_no = new Subscription();
                $get_serial_no->serial_sc();
                $get_serial_no->serial_draft_no(); 

                $updateOld = Subscription::findOrFail($subscription_id);
                $updateOld->reinvestment_request = 0;
                $updateOld->reinvestment_status = 1;
                //$updateOld->status = 6;
                $updateOld->reinvestment_child_id = $copy->id;
                $updateOld->save();

                $user_id = $copy->user_id;
                $user = User::findOrFail($user_id);

                $old_investment_no = $original['reference_no'].$original['refreance_id'];
                $new_investment_no = $copy['reference_no'].$copy['refreance_id'];


                Log::info('Renewal investments Date and Time: ' . date('m/d/Y h:i:s a', time()) . ' Old Invesetment: ' .$old_investment_no . ' New Invesetment: ' .$new_investment_no );

                /*Send Mail*/
                $pdfData = array(
                                'subscription' => $copy, 
                                'user' => $user, 
                                "old_investment_no"=> $old_investment_no,
                                "new_investment_no" => $new_investment_no
                            );

                if($user->role_id == 2){

                    if($copy->fund_type == 2){
                        $pdf = \PDF::loadView('pdf.mcil2.reinvestPfia', $pdfData);
                    }else if($copy->fund_type == 3){
                        $pdf = \PDF::loadView('pdf.mcil3.reinvestPfia', $pdfData);
                    } else {
                        $pdf = \PDF::loadView('pdf.reinvestPfia', $pdfData);   
                    }
                    
                }else{ 

                    if($copy->fund_type == 2){
                        $pdf = \PDF::loadView('pdf.mcil2.company.reinvestPfia', $pdfData);
                    }else if($copy->fund_type == 3){
                        $pdf = \PDF::loadView('pdf.mcil3.company.reinvestPfia', $pdfData);
                    } else {
                        $pdf = \PDF::loadView('pdf.company.reinvestPfia', $pdfData);  
                    }
                }

                $path = public_path('pdf/docs/pfia');
                $fileName =  'pfia'.$user_id.'.'. 'pdf';

                if (File::exists(public_path('pdf/docs/pfia/'.$fileName))) {
                    File::delete(public_path('pdf/docs/pfia/'.$fileName));
                }

                $pdf->save($path . '/' . $fileName);
                $attach = public_path('pdf/docs/pfia/'.$fileName);

                if(!empty($attach)){
                    $attachment = $attach;
                    
                }else{
                    $attachment = "";
                }

                $base_path = base_path().'/public/pdf/docs/pfia/';

                if(!empty($fileName)){
                    //Send Email
                    sendReInvestmentSuccessNotice($user, $copy, $old_investment_no, $new_investment_no, $old_maturity_date, $attachment, $base_path, $fileName);
                }

                if($user->role_id == 2){
                    $link_base = "/individual/view/subscription/";
                }else{
                    $link_base = "/company/view/subscription/";
                }
                
                if($user->id){
                    $noti_sender_user_id = 1;
                    $noti_receiver_user_id = $user->id;
                    $noti_link = $link_base.$subscription_id;
                    $noti_message = $new_investment_no." - Your Auto Re-Investment Request Created Successfully";
                    
                    $notification = new User;
                    $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                }

                $actionLog = [];
                $actionLog['user_browser'] = '';
                $actionLog['user_ip'] = '';
                $actionLog['subscription_id'] = $original->id;
                $actionLog['user_id'] = $user->id;
                $actionLog['user_type'] = "Investor";
                $actionLog['fund_type'] = $original->fund_type;
                $actionLog['is_doc_enable'] = 0; 
                $actionLog['model'] = "Subscriptions"; 
                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - Old Investment No ".$old_investment_no." - New investment No " . $new_investment_no . " Auto Re-Investment Request Created Successfully.";
                $actionLog['clicked_from'] = '';

                $auditlog = Auditlog::create($actionLog);

                // return response()->json(['data' => "", 'error' => true, 'msg' => "The auto generate investment created successfully"], 200);

            } else {

                // return response()->json(['data' => "null", 'error' => false, 'msg' => "The auto generate investment could not be saved. Please, try again."], 200);
            }
        }
    }

    private function copyDocument($old_subscription_id, $subscription_id) {
        $check_empty = SsAttachment::where('subscription_id', $subscription_id)->first();

        if(empty($check_empty)){

            $attachments = SsAttachment::where('subscription_id', $old_subscription_id)->get();
            foreach ($attachments as $data) {
                $id = $data->id;
                $attachment_type = $data->attachment_type;
                $attachment = $data->attachment;
                $attachment_path = "";
                $remarks = $data->remarks; 

                if(($attachment_type == 1) || ($attachment_type == 2) || ($attachment_type == 3) ||($attachment_type == 4) ||($attachment_type == 5) ||($attachment_type == 6) ||($attachment_type == 7) ||($attachment_type == 8)||($attachment_type == 9)||($attachment_type == 10) ||($attachment_type == 11) || ($attachment_type == 12) || ($attachment_type == 13)){

                    $ssAttachment2 = new SsAttachment;
                    $ssAttachment2->attachment = $attachment;
                    $ssAttachment2->attachment_type = $attachment_type;
                    $ssAttachment2->attachment_path = $attachment_path;
                    $ssAttachment2->remarks = $remarks;
                    $ssAttachment2->notification = 0;
                    $ssAttachment2->subscription_id = $subscription_id;

                    $ssAttachment2->save();
                }
            }
        }
    }

    private function columnNumberToLetter(int $columnNumber, int $indexStart = 0): string
    {
        $columnLetter = '';
        $columnNumber -= $indexStart;
        while ($columnNumber >= 0) {
            $modulus = $columnNumber % 26;
            $columnLetter = chr(65 + $modulus) . $columnLetter;
            $columnNumber = intdiv($columnNumber, 26) - 1;
        }
        return $columnLetter;
    }
}

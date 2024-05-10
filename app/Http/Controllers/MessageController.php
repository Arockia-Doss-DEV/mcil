<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\User;
use App\Models\Subscription;
use App\Models\SsAttachment;
use App\Models\Individual;
use App\Models\McilFund;
use App\Models\Auditlog;
use App\Models\LogAttachment;
use App\Models\Payment;
use App\Models\UserEmail; 
use Auth;
use PDF;
use Setting;
use Carbon\Carbon;
use File;
use Log;

class MessageController extends Controller
{
    public function msg()
    {
        echo "called msg";
    }

    public function subsInvestments(Request $request)
    {   
        return view('docUploads.investmentList');
    }

    public function activeInvestment(Request $request)
    {
        $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
            ->where('status', 3)
            ->where('draft', 0)
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('docUploads.investments', compact('subscriptions'));
    }

    public function deActiveInvestment(Request $request)
    {
        $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
            ->where('status', 4)
            ->where('draft', 0)
            ->orderBy('id', 'DESC')
            ->paginate(10);
            
        return view('docUploads.investments', compact('subscriptions'));
    }

    public function updateModelType(Request $request)
    {
        //Model::query()->update(['confirmed' => 1]);
        //$affected = DB::table('table')->update(array('confirmed' => 1));

        // User::where('role_id', 2)->update(['model_type'=> "App\Models\User"]);

        // User::query()->update(['email_verified_at' => \Carbon::now()]);

        // User::query()->update(['email_verified' => 1]);

        // User::query()->update(['model_type'=> "App\Models\User"]);

        // User::where('role_id', 3)->update(['role_id'=> 4]);
    }

    public function updateSourceWealth(Request $request)
    {
        // $string = Individual::findOrFail(4);
        // $source_wealth_rows = str_replace(array( '\\', '"', ';', '<', '>', '[', ']' ), ' ', $string->source_wealth);

        // $source_wealth_rows = trim(preg_replace('/\s\s+/', ' ', str_replace(array( '\\', '"', ';', '<', '>', '[', ']' ), " ", $string->source_wealth)));

        // $string->source_wealth = $source_wealth_rows;
        // $string->save();

        // return $source_wealth_rows;


        // subscriptions ja_source_wealth update
        // $ja_source_wealth = Subscription::all();

        //Individual
        // $source_wealth_rows = Individual::all();

        // foreach ($source_wealth_rows as $key => $value) {
            
        //     $string = Individual::findOrFail($value->id);
        //     $source_wealth_rows = trim(preg_replace('/\s\s+/', ' ', str_replace(array( '\\', '"', ';', '<', '>', '[', ']' ), " ", $string->source_wealth)));

        //     $string->source_wealth = $source_wealth_rows;
        //     $string->save();
        // }


        
        // $string = Subscription::findOrFail(116);

        // $source_wealth = trim(preg_replace('/\s\s+/', ' ', str_replace(array( '\\', '"', ';', '<', '>', '[', ']' ), " ", $string->ja_source_wealth)));

        // if ($string->ja_source_wealth == '""') {
        //     // code...
        // } else {
        //     $string->ja_source_wealth = $source_wealth;
        // }
        
        // $string->save();



        // $source_wealth_rows = Subscription::all();
        // foreach ($source_wealth_rows as $key => $value) {
            
        //     $string = Subscription::findOrFail($value->id);
        //     $source_wealth = trim(preg_replace('/\s\s+/', ' ', str_replace(array( '\\', '"', ';', '<', '>', '[', ']' ), " ", $string->ja_source_wealth)));

        //     if ($string->ja_source_wealth == '""') {
        //         // code...
        //     } else {
        //         $string->ja_source_wealth = $source_wealth;
        //     }
            
        //     $string->save();
        // }
    }

    public function updateFileName(Request $request)
    {

        // Update bank charges
        $files = Subscription::all();
        foreach ($files as $key => $file) {

            $subscription = Subscription::findOrFail($file->id);
            $bankCharge = $subscription->bank_charge;
            
            if ($bankCharge == 1) {
                $subscription->bank_charge = 0;
            }
            $subscription->save();
        }

        // $file = SsAttachment::findOrFail(49);
        // $string = $file->attachment;
        // $replacement = 'ssattachment/';
        // if (!empty($string))  {
        
        //     if($string == $replacement) {
        //         $file->attachment = null;
        //         $file->save();
        //     }
        // }

        // $files = SsAttachment::all();
        // foreach ($files as $key => $file) {
        //     $file = SsAttachment::findOrFail($file->id);
        //     $string = $file->attachment;
        //     $replacement = 'ssattachment/';
        //     if (!empty($string))  {
            
        //         if($string == $replacement) {
        //             $file->attachment = null;
        //             $file->save();
        //         }
        //     }
        // }






        // SS Attachments

        // $files = SsAttachment::all();
        // foreach ($files as $key => $file) {

        //     $file = SsAttachment::findOrFail($file->id);
        //     $string = $file->attachment;
        //     $replacement = 'ssattachment/';

        //     $newName = substr_replace($string, $replacement, 0, 0);
        //     $file->attachment = $newName;
        //     $file->save();
        // }


        // Subscriptions

        // $files = Subscription::all();
        // foreach ($files as $key => $file) {

        //     $file = Subscription::findOrFail($file->id);

        //     $string = $file->signeddoc_file;
        //     if (!empty($string))  {
               
        //         $replacement = 'pdf/uploadedDocs/';
        //         $newName = substr_replace($string, $replacement, 0, 0);

        //         // $newName = str_replace('ssattachment/', 'pdf/uploadedDocs/', $string);

        //         $file->signeddoc_file = $newName;
        //         $file->save();
        //     }
        // }


        // for Redemption file

        // $files = Subscription::all();
        // foreach ($files as $key => $file) {

        //     $file = Subscription::findOrFail($file->id);
        //     $string = $file->redemption_file;

        //     if (!empty($string)) {

        //         $replacement = 'ssattachment/';
        //         $newName = substr_replace($string, $replacement, 0, 0);

        //         // $newName = str_replace('ssattachment/', '', $string);

        //         $file->redemption_file = $newName;
        //         $file->save();
        //     }
        // }


        //for payment

        // $files = Payment::all();
        // foreach ($files as $key => $payment) {

        //     $payment = Payment::findOrFail($payment->id);
        //     $string = $payment->file;

        //     if (!empty($string)) {

        //         $replacement = 'payment/';
        //         $newName = substr_replace($string, $replacement, 0, 0);
        //         $payment->file = $newName;
        //         $payment->save();
        //     }
        // }


        //for newsletter
        // $files = UserEmail::all();
        // foreach ($files as $key => $email) {

        //     $email = UserEmail::findOrFail($email->id);
        //     $string = $email->attachment;

        //     if (!empty($string)) {

        //         $replacement = 'newsletter/uploads/';
        //         $newName = substr_replace($string, $replacement, 0, 0);
        //         $email->attachment = $newName;
        //         $email->save();
        //     }
        // }
    }

    public function dividentMail(Request $request)
    {
        // ini_set('max_execution_time', 180);
        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 5200);

        $subscriptions = Subscription::with('User', 'Payments')
            ->where('status', 3)
            ->where('reinvestment_status', 0)
            ->where('draft', 0)
            ->where('draft_delete', 0)
            ->orderBy('id', 'ASC')
            ->get();

        // dividend payouts
        $commencement_year = [];

        if(!empty($subscriptions)) {

            foreach ($subscriptions as $key => $active_investment) {
                
                if(!empty($active_investment->commence_date)){
                    if(!empty($active_investment->maturity_date)){
                        $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($active_investment->commence_date)), date('Y-m-d', strtotime($active_investment->maturity_date)));

                        $i = 0;
                        $per_count = 0;
                        $len = count($quartersCR);

                        // return $quartersCR;

                        foreach ($quartersCR as $value) {
                            $dis_month = $value->start_month;
                            $dis_month_num = $value->start_month_num;
                            $dis_year = $value->year;

                            if ($i == 1) {

                                $ts1 = date('Y-m-d', strtotime($active_investment->commence_date));
                                $ts2 = strtotime($value->period_start);
                                $dyear1 = date('Y', strtotime($ts1));
                                $dyear2 = date('Y', $ts2);
                                $dmonth1 = date('m', strtotime($ts1));
                                $dmonth2 = date('m', $ts2);
                                
                                $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                if($month_count == 3){
                                    
                                    $commencement_year[$key][$i]['subscription_id'] = $active_investment->id;
                                    $commencement_year[$key][$i]['user_id'] = $active_investment->user_id;
                                    $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                    $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                    $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                    $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                    $commencement_year[$key][$i]['year'] = $dis_year;
                                    $commencement_year[$key][$i]['month'] = $dis_month;
                                    $s_month = date('m',strtotime($dis_month));
                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                    $commencement_year[$key][$i]['date'] = date('Y-m-d', strtotime($dividendDate));
                                    $commencement_year[$key][$i]['percentage'] = 3;
                                    $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*3)/100;
                                    $per_count += 3;

                                }else if($month_count == 2){

                                    $commencement_year[$key][$i]['subscription_id'] = $active_investment->id;
                                    $commencement_year[$key][$i]['user_id'] = $active_investment->user_id;
                                    $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                    $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                    $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                    $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                    $commencement_year[$key][$i]['year'] = $dis_year;
                                    $commencement_year[$key][$i]['month'] = $dis_month;
                                    $s_month = date('m',strtotime($dis_month));
                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                    $commencement_year[$key][$i]['date'] = date('Y-m-d', strtotime($dividendDate));
                                    $commencement_year[$key][$i]['percentage'] = 2;
                                     $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*2)/100;
                                    $per_count += 2;

                                }else{

                                    $commencement_year[$key][$i]['subscription_id'] = $active_investment->id;
                                    $commencement_year[$key][$i]['user_id'] = $active_investment->user_id;
                                    $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                    $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                    $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                    $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                    $commencement_year[$key][$i]['year'] = $dis_year;
                                    $commencement_year[$key][$i]['month'] = $dis_month;
                                    $s_month = date('m',strtotime($dis_month));
                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                    $commencement_year[$key][$i]['date'] = date('Y-m-d', strtotime($dividendDate));
                                    $commencement_year[$key][$i]['percentage'] = 1;
                                     $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*1)/100;
                                    $per_count += 1;
                                }
                                
                            } else if ($i == $len - 1) {

                                $per_count += 3;
                                $commencement_year[$key][$i]['subscription_id'] = $active_investment->id;
                                $commencement_year[$key][$i]['user_id'] = $active_investment->user_id;
                                $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                $commencement_year[$key][$i]['year'] = $dis_year;
                                $commencement_year[$key][$i]['month'] = $dis_month;
                                $s_month = date('m',strtotime($dis_month));
                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                $commencement_year[$key][$i]['date'] = date('Y-m-d', strtotime($dividendDate));
                                $commencement_year[$key][$i]['percentage'] = 3;
                                $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*3)/100;

                            }else if(($i !=0)){

                                $per_count += 3;
                                $commencement_year[$key][$i]['subscription_id'] = $active_investment->id;
                                $commencement_year[$key][$i]['user_id'] = $active_investment->user_id;
                                $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                $commencement_year[$key][$i]['year'] = $dis_year;
                                $commencement_year[$key][$i]['month'] = $dis_month;
                                $s_month = date('m',strtotime($dis_month));
                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                $commencement_year[$key][$i]['date'] = date('Y-m-d', strtotime($dividendDate));
                                $commencement_year[$key][$i]['percentage'] = 3;
                                $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*3)/100;
                            }

                            $i++;
                        }
                        $len = count($quartersCR)-1;
                        $commence_dateee = strtotime($quartersCR[$len]->period_end);
                        $maturity_dateee = strtotime('+28 days', $commence_dateee);

                        if($per_count != 24){

                            $last_val = 24 - $per_count;

                            $commencement_year[$key][$i]['subscription_id'] = $active_investment->id;
                            $commencement_year[$key][$i]['user_id'] = $active_investment->user_id;
                            $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                            $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                            $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                            $commencement_year[$key][$i]['full'] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                            $commencement_year[$key][$i]['quarter'] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                            $commencement_year[$key][$i]['year'] = date('Y', $maturity_dateee);
                            $commencement_year[$key][$i]['month'] = date('F', $maturity_dateee);
                            $e_month = date('F', $maturity_dateee);
                            $e_month = date('m',strtotime($e_month));
                            $e_year = date('Y', $maturity_dateee);

                            $dividendDate = $e_year.'-'.$e_month.'-'."15";
                            $commencement_year[$key][$i]['date'] = date('Y-m-d', strtotime($dividendDate));

                            $commencement_year[$key][$i]['percentage'] = $last_val;
                            $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*$last_val)/100;
                                
                        }
                    }
                }
            }
        }

        // return $commencement_year;

        $final = [];
        if(!empty($commencement_year)) {
            for ($i=0; $i < count($commencement_year); $i++) {  
                for ($j=1; $j <= count($commencement_year[$i]); $j++) { 
                    if(!in_array($commencement_year[$i][$j]['quarter'], $final)){
                        $final[] = $commencement_year[$i][$j];
                    }
                }
            }
        }

        // return $final;

        foreach ($final as $key => $dividend) {

            // $paymentDate = date('2022-06-15');

            $month = date('m');
            $year = date('Y');
            $currentDate = $year.'-'.$month.'-'.'15';
            $paymentDate = date("Y-m-d", strtotime($currentDate));

            // $paymentDate=date('Y-m-d', strtotime($paymentDate));

            $dividendDate = $dividend['date'];
            $dividendDate2=date('Y-m-d', strtotime($dividendDate));
            $endDate = date("Y-m-d", strtotime ('+1 month', strtotime ($paymentDate))) ;

            if($dividendDate2 >= $paymentDate && $dividendDate2 <= $endDate) {

                $dividendData['full'] = $dividend['full'];
                $dividendData['quarter'] = $dividend['quarter'];
                $dividendData['year'] = $dividend['year'];
                $dividendData['month'] = $dividend['month'];
                $dividendData['percentage'] = $dividend['percentage'];
                $dividendData['amount'] = $dividend['amount'];

                $user = User::findOrFail($dividend['user_id']);
                $subscriptionData = Subscription::findOrFail($dividend['subscription_id']);

                $emailUserData = array('subscription' => $subscriptionData, 'user' => $user, 'dividend' => $dividendData);

                //Make PDF
                if($user->role_id == 2){

                    if($subscriptionData->fund_type == 2){

                        $pdf = \PDF::loadView('pdf.mcil2.dividentPayout', $emailUserData);
                    }else if($subscriptionData->fund_type == 3){
                        
                        $pdf = \PDF::loadView('pdf.mcil3.dividentPayout', $emailUserData);
                    } else {

                        $pdf = \PDF::loadView('pdf.dividentPayout', $emailUserData);
                    }

                }else{ 
                    
                    if($subscriptionData->fund_type == 2){

                        $pdf = \PDF::loadView('pdf.mcil2.company.dividentPayout', $emailUserData);
                    }else if($subscriptionData->fund_type == 3){

                        $pdf = \PDF::loadView('pdf.mcil3.company.dividentPayout', $emailUserData);
                    } else {

                        $pdf = \PDF::loadView('pdf.company.dividentPayout', $emailUserData);
                    }
                }

                $path = public_path('pdf/docs/dividentPayout');
                $fileName =  'dividentPayout'.$user->id.'.'. 'pdf';

                if (File::exists(public_path('pdf/docs/dividentPayout/'.$fileName))) {
                    File::delete(public_path('pdf/docs/dividentPayout/'.$fileName));
                }

                $pdf->save($path . '/' . $fileName);
                $attach = public_path('pdf/docs/dividentPayout/'.$fileName);

                if(!empty($attach)){
                    $attachment = $attach;
                    
                }else{
                    $attachment = "";
                }

                if(!empty($fileName)){
                    
                    // /Email for User
                    sendDividentPayoutMail($user, $attachment);
                }

            } else {

                // echo "NO";  
            }
        }
    }

    private function get_quarters2($start_date, $end_date){
        
        $quarters = array();
        
        $start_month = date( 'm', strtotime($start_date) );
        $start_year = date( 'Y', strtotime($start_date) );
        
        $end_month = date( 'm', strtotime($end_date) );
        $end_year = date( 'Y', strtotime($end_date) );
        
        $start_quarter = ceil($start_month/3);
        $end_quarter = ceil($end_month/3);

        $quarter = $start_quarter; 

        for( $y = $start_year; $y <= $end_year; $y++ ){
            if($y == $end_year)
                $max_qtr = $end_quarter;
            else
                $max_qtr = 4;
            
            for($q=$quarter; $q<=$max_qtr; $q++){
                
                $current_quarter = new \stdClass();
                
                $end_month_num = $this->zero_pad($q * 3);
                $start_month_num = ($end_month_num - 2);

                $q_start_month = $this->month_name($start_month_num);
                $q_end_month = $this->month_name($end_month_num);
                
                //$current_quarter->period = "Qtr $q ($q_start_month - $q_end_month) $y";
                $current_quarter->start_month = $q_start_month;
                $current_quarter->end_month = $q_end_month;
                $current_quarter->start_month_num = $start_month_num;
                $current_quarter->year = $y;
                $current_quarter->period_start = "$y-$start_month_num-01"; 
                $current_quarter->period_end = "$y-$end_month_num-" . $this->month_end_date($y, $end_month_num);
                
                $quarters[] = $current_quarter;
                unset($current_quarter);
            }

            $quarter = 1;
        }
        
        return $quarters;
    }

    private function month_name($month_number){
        return date('F', mktime(0, 0, 0, $month_number, 10));
    }


    private function month_end_date($year, $month_number){
        return date("t", strtotime("$year-$month_number-0"));
    }

    private function zero_pad($number){
        if($number < 10)
            return "0$number";
        
        return "$number";
    }
}

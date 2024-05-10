<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\User;
use App\Models\Subscription;
use App\Models\SsAttachment;
use App\Models\Individual;
use App\Models\Company;
use App\Models\McilFund;
use App\Models\Auditlog;
use App\Models\LogAttachment;
use Auth;
use Session;
use PDF;
use Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewInvestmentEmail;
use App\Mail\NewInvestmentEmailForInvester;
use File;
use App\Models\Flashmsg;

use App\Models\UserEmail;
use App\Models\UserEmailRecipient;
use App\Models\UserEmailSignature;
use App\Models\UserEmailTemplate;
use Spatie\Permission\Models\Role;

class CompanyController extends Controller
{
    public function index(Request $request) {

        $user_id = \Auth::user()->id;

        $query = Subscription::where('status', 3)
                        // ->where('reinvestment_status', 0)
                        ->whereIn('reinvestment_status', [0, 1])
                        ->where('user_id', $user_id)
                        ->get();

        $investment_count = $query->count();

        $investment_amount = Subscription::where('status', 3)
                    // ->where('reinvestment_status', 0)
                    ->whereIn('reinvestment_status', [0, 1])
                    ->where('user_id', $user_id)
                    ->sum('initial_investment');

        $reinvestment_query = Subscription::where('status', 3)
                        ->where('reinvestment_status', 1)
                        ->where('user_id', $user_id)
                        ->get();

        $reinvestment_count = $reinvestment_query->count();

        $reinvestment_amount = Subscription::where('status', 3)
                    ->where('reinvestment_status', 1)
                    ->where('user_id', $user_id)
                    ->sum('initial_investment');

        $subscriptionWithoutDraft = Subscription::where('user_id', $user_id)
                                    ->where('draft', 0)
                                    ->first();

        $subscription = Subscription::where('user_id', $user_id)
                            ->where('draft', 1)
                            ->first();

        $subscription2 = Subscription::where('user_id', $user_id)->first();

        if(empty($subscriptionWithoutDraft)){
            if(!empty($subscription)){
                return redirect('/company/initialCreate');
            }
        }

        if(empty($subscription2)){
            return redirect('/company/initialCreate');
        }

        if(!empty($subscription2)){

            if($subscription2->status == 0){
                return redirect('/landing');
            }else if($subscription2->status == 2){
                return redirect('/landing');
            }else if($subscription2->status == 5){
                return redirect('/landing');
            }
        }

        $subscription3 = Subscription::where('user_id', $user_id)
                            ->where('status', 3)
                            ->get();

        $q = $request->input('q');
        if($q!=""){

            $subscription4 = Subscription::with('Payments')
                                ->where('user_id', $user_id)
                                ->where('status', 3)
                                ->where('reference_no', 'like', '%' . $q . '%')
                                ->orWhereHas('Payments', function($query) use($q) {
                                    $query->where('payout_type', 'like', '%' . $q . '%');
                                    $query->orWhere('percentage', 'like', '%' . $q . '%');
                                    $query->orWhere('reference', 'like', '%' . $q . '%');
                                })
                                ->get();
        }else{
            $subscription4 = Subscription::with('Payments')
                                ->where('user_id', $user_id)
                                ->where('status', 3)
                                ->get();
        }            

        // $subscription4 = Subscription::with('Payments')
        //                     ->where('user_id', $user_id)
        //                     ->where('status', 3)
        //                     ->get()
        //                     ->toArray();

        $total_dividends = 0;
        foreach($subscription4 as $subscription_pay){
            if(!empty($subscription_pay->payments)){
                foreach($subscription_pay->payments as $payment){
                    
                    if(!empty($payment->payout_date)){
                        $currentDate = date('Y-m-d');
                        $startDate = date('Y-m-d', strtotime($payment->payout_date));
                        if($currentDate > $startDate){
                            $total_dividends += $payment->amount;
                        }
                    }
                }
            }
        }

        $investment_query = Subscription::where('status', 3)
                            ->where('is_first', 1)
                            ->where('user_id', $user_id)
                            ->get();

        $total_ini_investment_count = $investment_query->count(); 

        $add_investment_query = Subscription::where('status', 3)
                                ->where('is_first', 0)
                                ->where('user_id', $user_id)
                                ->get();

        $total_addinvestment_count = $add_investment_query->count(); 

        $total_investment_count = $total_ini_investment_count + $total_addinvestment_count;

        if($total_ini_investment_count != 0){
            $initial_avg = $total_ini_investment_count * 100 / $total_investment_count;
        }else{
            $initial_avg = 0;
        }
        
        if($total_addinvestment_count != 0){
            $addinitial_avg = $total_addinvestment_count * 100 / $total_investment_count;
        }else{
            $addinitial_avg = 0;
        }

        $initial_obj=[];
        $initial_obj[] = array(
                    'value' => number_format($initial_avg, 2),
                    'label' => "Initial Investment"
                );
        $initial_obj[] = array(
                    'value' => number_format($addinitial_avg, 2),
                    'label' => "Additional Investment"
                );

        $flash_msg = Flashmsg::where('active', 1)
                        ->where('start_date', '<=', Carbon::now())
                        ->where('end_date', '>=', Carbon::now())
                        ->first();

        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+2 months'));

        $maturity_exps = Subscription::where('status', 3)
                            ->where('reinvestment_status', 0)
                            ->where('redemption_status', 0)
                            ->where('user_id', $user_id)
                            ->whereBetween('maturity_date', [$start_date, $end_date])
                            ->get();

        $above_investment2 = Subscription::where('status', 3)
                                ->where('user_id', $user_id)
                                ->where('initial_investment', '>=', 70000)
                                ->get();

        $above_investment_count = $above_investment2->count();       

        $redemption_query = Subscription::where('status', 6)
                            ->where('user_id', $user_id)
                            ->get();

        $redemption_investment_count = $redemption_query->count();

        $redemption_upcoming_query = Subscription::where('status', 3)
                                        ->where('redemption_status', 1)
                                        ->where('user_id', $user_id)
                                        ->get();

        $redemption_upcoming_count = $redemption_upcoming_query->count();

        $redemption_investment_amount = Subscription::where('status', 6)
                                            ->where('user_id', $user_id)
                                            ->sum('initial_investment');

        $start_date2 = date('Y-m-d'); 
        $upcoming_query = Subscription::where('status', 3)
                            ->whereNotNull('reinvestment_parant_id')
                            ->where('user_id', $user_id)
                            ->where('commence_date', '>=', $start_date2)
                            ->get();

        $upcoming_investment_count = $upcoming_query->count();

        $enable_subscription = Subscription::where('user_id', $user_id)
                                ->where('draft', 0)
                                ->where('is_first', 1)
                                ->whereNotIn('status', [0, 1])
                                ->first();  

        return view('company.dashboard', compact('investment_count', 'total_dividends', 'investment_amount', 'subscription2', 'subscription3', 'flash_msg', 'subscription4', 'initial_obj', 'maturity_exps', 'redemption_investment_count', "redemption_investment_amount", "upcoming_investment_count", "redemption_upcoming_count", 'above_investment_count', 'reinvestment_count', 'reinvestment_amount', 'enable_subscription'));
    }

    public function subscriptionIndex(Request $request)
    {
        $userId = \Auth::user()->id;

        $q = Subscription::query();
        $q->with('User', 'McilFund');
        $q->where('user_id', $userId);
        $q->where('draft',0);
        $q->where('draft_delete',0);

        $status = $request->input('status');
        if($status != "") {
            $q->where('status', $status);
        } else {
            $q->whereIn('status', [0, 1, 2, 3, 6]);
        }

        $term = trim($request->input('q'));
        if( $term ) {
            $q->whereRaw("( subscriptions.reference_no like '%".$term."%' or subscriptions.refreance_id like '%".$term."%')");
        }

        $q->orderBy('id', 'ASC');
        $subscriptions = $q->paginate(10);

        $subscriptions->appends(['q' => $q]);

    //*****************************************************************************//

        // $subscriptions = Subscription::with('User', 'McilFund')
        //                     ->where('user_id', $userId)
        //                     ->where('draft', 0)
        //                     ->where('draft_delete', 0)
        //                     ->whereIn('status', [0,1, 2, 3,6])
        //                     ->orderBy('id', 'ASC')
        //                     ->get();

        $subscriptionsDraft = Subscription::with('User', 'McilFund')
                                ->where('user_id', $userId)
                                ->where('draft', 1)
                                ->where('draft_delete', 0)
                                ->whereIn('status', [0,1])
                                ->orderBy('id', 'DESC')
                                ->paginate(10);

        $enable_subscription = Subscription::where('user_id', $userId)
                                ->where('draft', 0)
                                ->where('is_first', 1)
                                ->whereNotIn('status', [0, 1])
                                ->first();


        return view('company.subscription.subscriptionIndex', ['subscriptions' => $subscriptions, 'subscriptionsDraft' => $subscriptionsDraft, 'enable_subscription' => $enable_subscription, 'q' => $q]);
        
        // return view('company.subscription.subscriptionIndex', compact('subscriptions', 'subscriptionsDraft', 'enable_subscription'));                    

    }

    public function subscriptionInitialCreate(Request $request)
    {
        $user_id = \Auth::user()->id;
        $userData = User::with('countryAs','stateAs', 'mobilePrefix', 'individual')->findOrFail($user_id);

        $mobile_prefix = User::has('mobilePrefix') ? $userData->mobile_prefix['calling_code'] : '';

        $additional = false;
        
        $subscriptionData = Subscription::with('SsAttachments')->where('user_id',$user_id)->first();
        if(!empty($subscriptionData)){

            $subscription = $subscriptionData;
            $edit = true;
        }else{
            $edit = false;
            $subscription = "";
        }

        // $countries = Country::pluck('name', 'id');
        $my_countries = Country::whereIn('id', [32,100,129,188,209])->get();
        $all_countries = Country::all()->except([32,100,129,188,209]);
        $merged = $my_countries->merge($all_countries);
        $countries = $merged->all();

        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);

        $fund_types = McilFund::where('active', 1)->pluck('name', 'id');

        // return $userData;
        return view('company.initialCreate', ['edit' => $edit, 'countries'=> $countries, 'mobile_prefix'=> $mobile_prefix, 'phone_prefix'=> $phone_prefix, 'userData'=> $userData, 'subscription' => $subscription, 'additional' => $additional, 'fund_types' => $fund_types]);
    }

    public function subscriptionInitialSave(Request $request)
    {
        $subscription_id = $request->input('subscription_id');

        $user_id = Auth::user()->id;
        $requestData = $request->all();
        $requestData['user_id'] = $user_id;
        $requestData['draft'] = 0;
        $requestData['is_first'] = 1;
        $requestData['notification_invest'] = 1;

        $user = User::with('countryAs','stateAs', 'mobilePrefix','individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        $originalImage= $request->file('signeddoc_file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->signeddoc_file->getClientOriginalName();
            $filePath = $originalImage->storeAs('pdf/uploadedDocs', $fileName, 'public');

            $image_name = $filePath;
            $status = 1;
        }else{
            $image_name = "";
            $status = 0;
        }

        $requestData['signeddoc_file'] = $image_name;
        $requestData['enable_signeddoc'] = $status;
        $requestData['service_charge']=Setting::get('service_charge');
        $requestData['bank_charge']=Setting::get('bank_charge');

        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);
            $subscription->update($requestData);

        }else{
            $requestData = $request->all();
            $subscription = Subscription::create($requestData);
        }

        if($subscription){

            if($subscription->fund_type == 1){
                $msg_fund_type = "MCIL1";
            }else if($subscription->fund_type == 2){
                $msg_fund_type = "MCIL2";
            }else if($subscription->fund_type == 3){
                $msg_fund_type = "MCIL3";
            }else{
                $msg_fund_type = "";
            }

            //Notification Save
            $noti_sender_user_id = Auth::user()->id;
            $noti_receiver_user_id = 1;
            $noti_link = "/subscription/view/".$subscription->id;
            $investment_no = $subscription->refreance_id;
            $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no ."" ."New investment";
            
            $notification = new User;
            $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            //Notification END

            //Email for User
            // sendRegistrationMail($user);

            //Email for User
            sendNewFundRegistrationMail($user);

            //Email for Admin
            $investment_id = $subscription->refreance_id;
            sendNewInvestment($user, $investment_id);

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 1; 
            $actionLog['model'] = "Subscriptions"; 
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Company Initial investment Created";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            // log attachments
            $attachmentData = Subscription::with('SsAttachments')
                                ->where('id', $subscription->id)
                                ->where('user_id',$user_id)
                                ->first();
                   
            if (!$attachmentData->SsAttachments->isEmpty()){
                foreach ($attachmentData->SsAttachments as $ssAttachments){

                    $logAttachment = [];
                    $logAttachment['auditlog_id'] = $auditlog->id;
                    $logAttachment['attachment'] = $ssAttachments->attachment;

                    LogAttachment::create($logAttachment);
                }
            }

            return redirect('/landing')->with("success","Thanks for Subscribing !");
        }else{
            return redirect()->back()->with("error","Something Went Wrong Try again !");
        }
    }

    public function subscriptionInitialSaveDraft(Request $request)
    {
        $userId = Auth::user()->id;
        $subscription_id = $request->input('subscription_id');

        if (!empty($subscription_id)) {
            
            $subscription = Subscription::with('SsAttachments')
                                ->where('id', $subscription_id)
                                ->where('user_id',$userId)
                                ->first();
        } else {
            $subscription = [];
        }

        $flag = "edit";
        if (empty($subscription)) {
            $flag = "add";
        }

        if(request()->isMethod('post')){

            $requestData = $request->all();
            $requestData['user_id'] = Auth::user()->id;
            $requestData['draft'] = 1;

            $originalImage= $request->file('signeddoc_file');
            if(!empty($originalImage)){
                
                $fileName = time().'_'.$request->signeddoc_file->getClientOriginalName();
                $filePath = $originalImage->storeAs('pdf/uploadedDocs', $fileName, 'public');

                $image_name = $filePath;
                $status = 1;
            }else{
                $image_name = "";
                $status = 0;
            }

            $requestData['signeddoc_file'] = $image_name;
            $requestData['enable_signeddoc'] = $status;
            $requestData['service_charge']=Setting::get('service_charge');
            $requestData['bank_charge']=Setting::get('bank_charge');
            
            if(!empty($subscription_id)){

                $subscription = Subscription::find($subscription_id);
                $subscription->update($requestData);

                return response()->json(['data' => $subscription, 'error'=>0, 'msg' => "The Subscriptions updated successfully"], 200);

            }else{

                $subscription = Subscription::create($requestData);
                $this->update_draft_refreance_no($subscription->id);

                return response()->json(['data' => $subscription, 'error'=>0, 'msg' => "The Subscriptions save successfully"], 200);  
            }

            return response()->json(['error'=>1, 'msg' => "The subscription could not be saved. Please, try again."], 200);
        }

        return response()->json(['error'=>1, 'msg' => "The subscription could not be saved. Please, try again."], 201);
    }

    public function subscriptionView($id)
    {
        $userId = Auth::user()->id;
        $subscription = Subscription::with(['User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'SsAttachments', 'Individual.IndiResidence', 'Individual.IndiNationality', 'Company', 'Payments', 'McilFund', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country'])
            ->whereIn('status', [0,1, 2, 3,6])
            ->where('user_id', $userId)
            ->findOrFail($id);

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiResidence','individual.IndiNationality','company.CompanyCountryCorporate')->findOrFail($userId);

        return view('company.subscription.subscriptionView', compact('subscription', 'user'));
    }

    public function subscriptionEdit($id)
    {
        $user_id = Auth::user()->id;
        $subscription_id = $id;

        $subscription = Subscription::with('SsAttachments', 'McilFund')
                            ->where('id', $subscription_id)
                            ->where('user_id', $user_id)
                            ->first();

        $subscription_id = $subscription->id;
        $fund_type_desc = $subscription->McilFund->name;
        $fund_type = $subscription->fund_type;
        $edit = true;

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality', 'company.CompanyCountryCorporate')
                    ->where('id', $user_id)
                    ->first();

        $mobile_prefix = $user->mobile_prefix ? $user->mobilePrefix->calling_code : '';
                    
        // $countries = Country::pluck('name', 'id');
        $my_countries = Country::whereIn('id', [32,100,129,188,209])->get();
        $all_countries = Country::all()->except([32,100,129,188,209]);
        $merged = $my_countries->merge($all_countries);
        $countries = $merged->all();

        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);

        $fund_types = McilFund::where('active', 1)->pluck('name', 'id');

        $userData = ['edit' => $edit, 'countries'=> $countries, 'mobile_prefix'=> $mobile_prefix, 'phone_prefix'=> $phone_prefix, 'user'=> $user, 'subscription' => $subscription, 'subscription_id' => $subscription_id, 'fund_types' => $fund_types, 'fund_type_desc' => $fund_type_desc, 'fund_type' => $fund_type];

        return view('company.additionalCreate', $userData);
    }

    public function subscriptionDelete($id)
    {
        $userId = Auth::user()->id;
        $subscription = Subscription::with('SsAttachments')
                        ->where('id', $id)
                        ->where('user_id', $userId)
                        ->first();

        $subscription->draft_delete = 1;
        $subscription->save();

        return \Redirect::back()->with('success', 'Your subscription was deleted.');
    }

    public function subscriptionAdditionalCreate(Request $request)
    {
        $subscription_id = $request->get('subId'); 
        $userId = Auth::user()->id;

        if(!empty($subscription_id)){

            $subscription = Subscription::with('SsAttachments','McilFund')
                ->where('id', $subscription_id)
                ->where('user_id', $userId)
                ->first();

            $subscription_id = $subscription->id;
            $fund_type_desc = $subscription->McilFund->name;
            $fund_type = $subscription->fund_type;

        } else {

            $subscription = Subscription::with('SsAttachments','McilFund')
                ->where('is_first', 1)
                ->where('user_id', $userId)
                ->first();

            $subscription_id = $subscription->id;
            $fund_type_desc = $subscription->McilFund->name;
            $fund_type = $subscription->fund_type;

            unset($subscription['id']);
            unset($subscription['certification_1']);
            unset($subscription['certification_2']);
            unset($subscription['certification_3']);
            unset($subscription['certification_4']);
            unset($subscription['kyc_1']);
            unset($subscription['kyc_2']);
            unset($subscription['kyc_3']);
            unset($subscription['kyc_4']);
            unset($subscription['kyc_5']);
            unset($subscription['kyc_6']);

        }

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality', 'company.CompanyCountryCorporate')
                    ->where('id', $userId)
                    ->orderBy('id', 'ASC')
                    ->first();
                                        
        if(!empty($subscription)){

            $subscription = $subscription;
            $edit = true;
        }else{
            $edit = false;
            $subscription = "";
        }

        $mobile_prefix = $user->mobile_prefix ? $user->mobilePrefix->calling_code : '';
                    
        // $countries = Country::pluck('name', 'id');
        $my_countries = Country::whereIn('id', [32,100,129,188,209])->get();
        $all_countries = Country::all()->except([32,100,129,188,209]);
        $merged = $my_countries->merge($all_countries);
        $countries = $merged->all();
        
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);

        $fund_types = McilFund::where('active', 1)->pluck('name', 'id');

        $userData = ['edit' => $edit, 'countries'=> $countries, 'mobile_prefix'=> $mobile_prefix, 'phone_prefix'=> $phone_prefix, 'user'=> $user, 'subscription' => $subscription, 'subscription_id' => $subscription_id, 'fund_type' => $fund_type, 'fund_type_desc' => $fund_type_desc, 'fund_types' => $fund_types];

        return view('company.additionalCreate', $userData);
    }

    public function subscriptionAdditionalDraft(Request $request)
    {
        $userId = Auth::user()->id;
        $subscription_id = $request->get('subscription_id');

        if (!empty($subscription_id)) {
            $subscription = Subscription::with('SsAttachments','McilFund')
                ->where('id', $subscription_id)
                ->where('user_id', $userId)
                ->first();
        } else {
            $subscription = [];
        }

        $flag = "edit";
        if(empty($subscription)){
            $flag = "add";
        }

        if(request()->isMethod('post')){

            $requestData = $request->all();
            $requestData['user_id'] = $userId;
            $requestData['is_first'] = 0;
            $requestData['draft'] = 1;

            $originalImage= $request->file('signeddoc_file');
            if(!empty($originalImage)){
                
                $fileName = time().'_'.$request->signeddoc_file->getClientOriginalName();
                $filePath = $originalImage->storeAs('pdf/uploadedDocs', $fileName, 'public');

                $image_name = $filePath;
                $status = 1;
            }else{
                $image_name = "";
                $status = 0;
            }

            $requestData['signeddoc_file'] = $image_name;
            $requestData['enable_signeddoc'] = $status;
            $requestData['service_charge']=Setting::get('service_charge');
            $requestData['bank_charge']=Setting::get('bank_charge');

            $old_subscription_id = $request->get('old_subscription_id');

            if(!empty($subscription_id)){

                $subscription = Subscription::find($subscription_id);
                $subscription->update($requestData);

                return response()->json(['data' => $subscription, 'error'=>0, 'msg' => "The Subscriptions updated successfully"], 200);
            }else{

                $subscription = Subscription::create($requestData);
                $this->update_draft_refreance_no($subscription->id);
                $this->copyDocument($old_subscription_id, $subscription->id);

                return response()->json(['data' => $subscription, 'error'=>0, 'msg' => "The Subscriptions save successfully"], 200);  
            }

            return response()->json(['error'=>1, 'msg' => "The subscription could not be saved. Please, try again."], 200);
        }

        return response()->json(['error'=>1, 'msg' => "The subscription could not be saved. Please, try again."], 201);
    }

    public function subscriptionAdditionalSave(Request $request)
    {
        $subscription_id = $request->get('subscription_id');
        $userId = Auth::user()->id;

        $subscription = Subscription::with('SsAttachments','McilFund')
                ->where('id', $subscription_id)
                ->where('user_id', $userId)
                ->first();

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality', 'company.CompanyCountryCorporate')
                    ->where('id', $userId)
                    ->first();

        $requestData = $request->all();

        $requestData['user_id'] = $userId;
        $requestData['draft'] = 0;
        $requestData['is_first'] = 0;
        $requestData['notification_invest'] = 1;

        $originalImage= $request->file('signeddoc_file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->signeddoc_file->getClientOriginalName();
            $filePath = $originalImage->storeAs('pdf/uploadedDocs', $fileName, 'public');

            $image_name = $filePath;
            $status = 1;
        }else{
            $image_name = "";
            $status = 0;
        }

        $requestData['signeddoc_file'] = $image_name;
        $requestData['enable_signeddoc'] = $status;
        $requestData['service_charge']=Setting::get('service_charge');
        $requestData['bank_charge']=Setting::get('bank_charge');

        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);
            $subscription->update($requestData);

        }else{
            $requestData = $request->all();
            $subscription = Subscription::create($requestData);
        }

        if(($subscription->status == 3) || ($subscription->status == 6)){
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }else{
            $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
        }

        if($subscription->fund_type == 1){
            $msg_fund_type = "MCIL1";
        }else if($subscription->fund_type == 2){
            $msg_fund_type = "MCIL2";
        }else if($subscription->fund_type == 3){
            $msg_fund_type = "MCIL3";
        }else{
            $msg_fund_type = "";
        }

        //Notification Save
        $noti_sender_user_id = Auth::user()->id;
        $noti_receiver_user_id = 1;
        $noti_link = "/subscription/view/".$subscription->id;
        $investment_no = $subscription->refreance_id;
        $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no ."" ."New investment";
        
        $notification = new User;
        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        //Notification END

        //Email for User
        // sendRegistrationMail($user);

        //Email for User
        sendNewFundRegistrationMail($user);

        //Email for Admin
        $investment_id = $subscription->refreance_id;
        sendNewInvestment($user, $investment_id);

        //user action logs
        $auth_user = Auth::user();
        $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = $subscription->id;
        $actionLog['user_id'] = $user->id;
        $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = $subscription->fund_type;
        $actionLog['is_doc_enable'] = 1; 
        $actionLog['model'] = "Subscriptions"; 
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no."Company Additional Investment Created.";
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        // log attachments
        $attachmentData = Subscription::with('SsAttachments')
                            ->where('id', $subscription->id)
                            ->where('user_id',$userId)
                            ->first();
               
        if (!$attachmentData->SsAttachments->isEmpty()){
            foreach ($attachmentData->SsAttachments as $ssAttachments){

                $logAttachment = [];
                $logAttachment['auditlog_id'] = $auditlog->id;
                $logAttachment['attachment'] = $ssAttachments->attachment;

                LogAttachment::create($logAttachment);
            }
        }

        return \Redirect::to('/company/subscriptions')->with('success', 'The Additional Subscription save successfully.');
    }
    
    public function uploadDocumentRemove(Request $request)
    {
        $subscription_id =  $request->input('subscription_id');
        $attachment_type = $request->input('attachment_type');

        $ssAttachment = SsAttachment::where(['subscription_id' => $subscription_id, 'attachment_type' => $attachment_type])               ->first();

        if(!empty($ssAttachment)){
            $id = $ssAttachment->id;
            SsAttachment::find($id)->delete();

            return response()->json(['error' => 0, 'msg' => "The document has been deleted."], 200);     
        }else{
            return response()->json(['error' => 1, 'msg' => "The document could not be deleted. Please, try again."], 200);
        }    
    }

    public function uploadDocument(Request $request)
    {
        if(request()->isMethod('post')){

            $subscription_id = $request->input('subscription_id');
            $attachment_type = $request->input('attachment_type');
            $attachment = $request->file('attachment');
            $remarks = $request->input('remarks');

            $originalImage = $attachment;

            if(!empty($originalImage)){
                
                $fileName = time().'_'.$request->attachment->getClientOriginalName();
                $filePath = $originalImage->storeAs('ssattachment', $fileName, 'public');

                $image_name = $filePath;
            }else{
                $image_name = "";
            }

            if(!empty($subscription_id)){

                $requestData = $request->all();
                $requestData['subscription_id'] = $subscription_id;
                $requestData['attachment_type'] = $attachment_type;
                $requestData['attachment_path'] = "";
                $requestData['attachment'] = $image_name;
                $requestData['remarks'] = $remarks;

                $ssAttachmentData = SsAttachment::where(['subscription_id' => $subscription_id, 'attachment_type' => $attachment_type])
                                ->first();

                if(!empty($ssAttachmentData)){

                    $ssAttachment = SsAttachment::find($ssAttachmentData->id);
                    $ssAttachment->update($requestData);
                }else{

                    $ssAttachment = SsAttachment::create($requestData);
                }   
            }

            return response()->json(['error' => 0, 'msg' => "The document has been save."], 200);  
        }
    }

    public function getDocument(Request $request)
    {
        $subscription_id = $request->input('id');

        if(request()->isMethod('get')) {

            $subscription = Subscription::where('id', $subscription_id)->first();
            $attachments = SsAttachment::where('subscription_id', $subscription->id)->get();

            $output = [];
            foreach ($attachments as $data) {
                                                
                $id = $data['id'];
                $attachment_type = $data['attachment_type'];
                $attachment = $data['attachment'];
                $attachment_path = $data['attachment_path'];
                $remarks = $data['remarks']; 

                if(!empty($data)){
                    $output[] = ["id"=> $id, "attachment_type"=> $attachment_type,"attachment"=> $attachment, "attachment_path"=> $attachment_path, "remarks"=> $remarks];
                }
            }     

            if(!empty($output)){
                return response()->json(['data' => $output], 200); 
            }

            return response()->json(['data' => ""], 200); 
        }
    }

    public function reviewImage(Request $request)
    {
        $subscription_id = $request->input('id');
        if(request()->isMethod('get')) {

            $subscription = Subscription::where('id', $subscription_id)->first();
            $attachments = SsAttachment::where('subscription_id', $subscription->id)->get();              

            if(!empty($attachments)){
                return response()->json(['data' => $attachments], 200);
            }
            return response()->json(['data' => ""], 200);
        }
    }

    public function signedPdfDownload(Request $request)
    {
        $subscription_id = $request->input('id');

        if(!empty($subscription_id)){

            $user_id = Auth::user()->id;
            $subscription = Subscription::with(['SsAttachments', 'Individual', 'Company.CompanyCountryCorporate', 'User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionJaCountry', 'SubscriptionJaState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionJaNationality' ,'SubscriptionJaMobilePrefix', 'SubscriptionB1PhonePrefix', 'SubscriptionB1Country', 'SubscriptionB1State', 'SubscriptionB1Nationality', 'SubscriptionB2Country', 'SubscriptionB2State', 'SubscriptionB2PhonePrefix', 'SubscriptionB2Nationality', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country', 'SubscriptionJaTrCountry', 'SubscriptionJaTrState', 'SubscriptionJaTd1Country', 'SubscriptionJaTd2Country', 'SubscriptionJaTd3Country'])->where('user_id', $user_id)->where('id',$subscription_id)->first();

            if(empty($subscription)){
                return "";
            }
            
            $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

            $userDataArr = array('subscription' => $subscription, 'user' => $user);   

            if($subscription->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.company.signedApplication', $userDataArr);
            }else if($subscription->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.company.signedApplication', $userDataArr);
            } else {
                $pdf = \PDF::loadView('pdf.company.signedApplication', $userDataArr); 
            }

            // $currency_word = $this->convert_number_to_words($subscription->initial_investment);

            $path = public_path('pdf/company/signedPdf');
            $fileName =  $subscription_id.'.'. 'pdf' ;

            if (File::exists(public_path('pdf/company/signedPdf/'.$fileName))) {
                File::delete(public_path('pdf/company/signedPdf/'.$fileName));
            }

            $pdf->save($path . '/' . $fileName);

            if(!empty($fileName)){
               $signedPdf = $fileName;
            }

            //return response()->download($pdf)->deleteFileAfterSend(false);
            return response()->json(['data' => "success", 'filename' => $signedPdf, 'subscription_id' => $subscription_id], 201);
        }else{
            return "";
        }
    }

    public function signedApplication($subscription_id)
    {
        $user_id = \Auth::user()->id;

        $subscription = Subscription::with(['SsAttachments', 'Individual', 'User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'McilFund', 'Payments', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country'])->where('id',$subscription_id)->first();

        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        $userDataArr = array('subscription' => $subscription, 'user' => $user);

        //Stream View Signed PDF

        if($subscription->fund_type == 2){
            $pdf = \PDF::loadView('pdf.mcil2.company.signedApplication', $userDataArr);
            return $pdf->stream('signedApplication.pdf');
        }else if($subscription->fund_type == 3){
            $pdf = \PDF::loadView('pdf.mcil3.company.signedApplication', $userDataArr);
            return $pdf->stream('signedApplication.pdf');
        } else {
            $pdf = \PDF::loadView('pdf.company.signedApplication', $userDataArr);
            return $pdf->stream('signedApplication.pdf');
        }
    }

    public function bankInstruction($subscription_id)
    {
        $user_id = \Auth::user()->id;
        $subscription = Subscription::with('User', 'SubscriptionState', 'SubscriptionCountry')
                            ->where('id', $subscription_id)
                            ->where('user_id', $user_id)
                            ->first();

        $old_address = $subscription->old_address;

        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        $userDataArr = array('subscription' => $subscription, 'user' => $user, 'old_address' => $old_address);

        if($subscription->fund_type == 2){
            $pdf = \PDF::loadView('pdf.mcil2.company.bankInstruction', $userDataArr);
            return $pdf->stream('bankInstruction.pdf');
        }else if($subscription->fund_type == 3){
            $pdf = \PDF::loadView('pdf.mcil3.company.bankInstruction', $userDataArr);
            return $pdf->stream('bankInstruction.pdf');
        } else {
            $pdf = \PDF::loadView('pdf.company.bankInstruction', $userDataArr);
            return $pdf->stream('bankInstruction.pdf');
        }
    }

    public function pfia($subscription_id)
    {
        $user_id = \Auth::user()->id;
        $subscription = Subscription::with('User', 'SubscriptionState', 'SubscriptionCountry')
                        ->where('id', $subscription_id)
                        ->where('user_id', $user_id)
                        ->first();

        if(!empty($subscription->reinvestment_parant_id)){
            $old_subscription = Subscription::findOrFail($subscription->reinvestment_parant_id);
        }else{
            $old_subscription = [];
        }

        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        $currency_word = $this->convert_number_to_words($subscription->initial_investment);

        $quarters = $this->get_quarters2(Carbon::parse($subscription->commence_date)->format('Y-m-d'), Carbon::parse($subscription->maturity_date)->format('Y-m-d'));

        $emailUserData = array('subscription' => $subscription, 'user' => $user, 'old_address' => $subscription->old_address, 'currency_word' => $currency_word, 'quarters' => $quarters);

        if($subscription->fund_type == 2){
            $pdf = \PDF::loadView('pdf.mcil2.company.activePfia', $emailUserData);
            return $pdf->stream('activePfia.pdf');
        }else if($subscription->fund_type == 3){
            $pdf = \PDF::loadView('pdf.mcil3.company.activePfia', $emailUserData);
            return $pdf->stream('activePfia.pdf');
        } else {
            $pdf = \PDF::loadView('pdf.company.activePfia', $emailUserData);
            return $pdf->stream('activePfia.pdf'); 
        }

    }

    public function documentBankIndex(Request $request)
    {
        $userId = Auth::user()->id;              

        $subscriptions = Subscription::with('SsAttachments')
                            ->where('user_id',$userId)
                            ->where('notification_doc', 1)
                            ->where('draft', 0)
                            ->where('status', 1)
                            ->get();

        $attachment =0;                    
        foreach ($subscriptions as $key => $ss) {
            
            if (!$ss->SsAttachments->isEmpty()){
                foreach ($ss->SsAttachments as $ssAttachments){

                    if($ssAttachments->attachment_type == 15){ 
                        if(!empty($ssAttachments->attachment)){
                            $attachment = 1;
                        } else{
                            $attachment = 0;
                        }

                    } else {
                        $attachment = 0;
                    }
                }

            } else {
                $attachment = 0;
            }
        }

        return view('company.documentBankIndex', compact('subscriptions', 'attachment'));
    }

    public function documentBankUpload(Request $request)
    {
        $user_id = Auth::user()->id;
        $sub_att_id = $request->get('sub_att_id');
        
        $subscription = Subscription::where('id', $sub_att_id)
                        ->where('user_id', $user_id)
                        ->where('notification_doc', 1)
                        ->first();

        $ssAttachment = SsAttachment::where('subscription_id', $sub_att_id)
                        ->where('attachment_type', 15)
                        ->first();

        if(!empty($sub_att_id)){

            $requestData = $request->all();
            $ss_attachments = $request->file('ss_attachments');

            if ($request->hasFile('ss_attachments')) :
                foreach ($ss_attachments as $ss) {
                    
                    $fileName = time().'_'.$ss->getClientOriginalName();
                    $filePath = $ss->storeAs('ssattachment', $fileName, 'public');
                    $requestData['attachment'] = $filePath;
                    $requestData['attachment_type'] = 15;
                    $requestData['notification'] = 1;
                    $requestData['subscription_id'] = $subscription->id;
                    $requestData['remarks'] = "Bank Slip";

                    if(!empty($ssAttachment)){

                        // $ssAttachment = SsAttachment::find($ssAttachment->id);
                        // $ssAttachment->update($requestData);
                        
                        $ssAttachment = SsAttachment::create($requestData);

                    }else{

                        $ssAttachment = SsAttachment::create($requestData);
                    }
                }

            else:
                $fileName = '';
            endif;
        }

        // if(empty($ssAttachment)){
        //     $requestData = $request->all();
        // }

        // $requestData['attachment_type'] = 15;
        // $requestData['notification'] = 1;  
        // $requestData['subscription_id'] = $subscription->id;

        if(!empty($sub_att_id)){

            $requestData = $request->all();
            $ss_attachments = $request->file('ss_attachments');

            foreach ($ss_attachments as $ss) {
                
                $fileName = time().'_'.$ss->getClientOriginalName();
                $filePath = $ss->storeAs('ssattachment', $fileName, 'public');
                $requestData['attachment'] = $filePath;
                $requestData['attachment_type'] = 15;
                $requestData['notification'] = 1;
                $requestData['subscription_id'] = $subscription->id;
                $requestData['remarks'] = "Bank Slip";

                if(!empty($ssAttachment)){

                    $ssAttachment = SsAttachment::find($ssAttachment->id);
                    $ssAttachment->update($requestData);
                }else{

                    $ssAttachment = SsAttachment::create($requestData);
                }
            }
        }

        if ($ssAttachment) {
            
            $subscriptionData = Subscription::findOrFail($sub_att_id);
            $subscriptionData->notification_doc_hidden = 1;

            $subscriptionData->Save();

            if(!empty($subscription['draft_refrence_id'])){

                if(($subscription->status == 3) || ($subscription->status == 6)){
                    $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                }else{
                    $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                }

            }else{
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }

            $user = User::findOrFail($user_id);

            //send mail
            sendBankSlip($user, $investment_no);

            if($subscription->fund_type == 1){
                $msg_fund_type = "MCIL1";
            }else if($subscription->fund_type == 2){
                $msg_fund_type = "MCIL2";
            }else if($subscription->fund_type == 3){
                $msg_fund_type = "MCIL3";
            }else{
                $msg_fund_type = "";
            }

            if($user->id){
                $noti_sender_user_id = $user->id;
                $noti_receiver_user_id = 1;
                $noti_link = "/subscription/view/".$subscription->id;
                $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." The Bank Slip";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 1; 
            $actionLog['model'] = "SsAttachments"; 
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Company Bank Slip Uploaded.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            // log attachments
            $attachmentData = SsAttachment::where('subscription_id',$sub_att_id)
                                    ->where('attachment_type', 15)
                                    ->get();

            foreach ($attachmentData as $key => $data) {
                
                $logAttachment = [];
                $logAttachment['auditlog_id'] = $auditlog->id;
                $logAttachment['attachment'] = $data->attachment;

                LogAttachment::create($logAttachment);
            }

            return response()->json(['error' => 0, 'msg' => "The Bank Slip has been saved."], 200);
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Bank Slip could not be saved. Please, try again."], 200); 
    }

    public function bankDocReview(Request $request)
    {
        $subscription_id = $request->input('id');
        if(request()->isMethod('get')) {

            $subscription = Subscription::where('id', $subscription_id)->first();
            $attachments = SsAttachment::where('subscription_id', $subscription->id)
                                ->where('attachment_type', 15)
                                ->get();       

            if(!empty($attachments)){
                return response()->json(['data' => $attachments], 200);
            }
            return response()->json(['data' => ""], 200);
        }
    }

    public function changeBankDetailsUpload(Request $request)
    {
        $user_id = Auth::user()->id;
        $sub_att_id = $request->get('sub_att_id');

        $subscription = Subscription::where('id', $sub_att_id)
                                ->where('user_id', $user_id)
                                ->first();

        $attachment_type_ids = [21,22];
        $del_ss_attachments = SsAttachment::where('subscription_id', $subscription->id)
                                ->whereIn('attachment_type', $attachment_type_ids)
                                ->get()
                                ->delete();

        $attachment = $request->file('attachment');
        if(!empty($attachment)){
            
            $fileName = time().'_'.$request->attachment->getClientOriginalName();
            $filePath = $attachment->storeAs('ssattachment', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }

        $ssAttachment1['attachment'] = $image_name;
        $ssAttachment1['attachment_type'] = 21;
        $ssAttachment1['notification'] = 0;
        $ssAttachment1['subscription_id'] = $subscription->id;

        $ssAttachment = SsAttachment::create($ssAttachment1);

        $bank_statement = $request->file('bank_statement');
        if(!empty($bank_statement)){
            
            $fileName = time().'_'.$request->bank_statement->getClientOriginalName();
            $filePath = $bank_statement->storeAs('ssattachment', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }

        $ssAttachment2['attachment'] = $image_name;
        $ssAttachment2['attachment_type'] = 22;
        $ssAttachment2['notification'] = 0;
        $ssAttachment2['subscription_id'] = $subscription->id;

        $ssAttachment = SsAttachment::create($ssAttachment2);

        if ($ssAttachment) {
            
            if(($subscription->status == 3) || ($subscription->status == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }

            $user = User::findOrFail($user_id);

            sendBankAcNoticeForAdmin($user, $subscription);
            sendBankAcNoticeForInvestor($user, $subscription);

            if($subscription->fund_type == 1){
                $msg_fund_type = "MCIL1";
            }else if($subscription->fund_type == 2){
                $msg_fund_type = "MCIL2";
            }else if($subscription->fund_type == 3){
                $msg_fund_type = "MCIL3";
            }else{
                $msg_fund_type = "";
            }

            if($user->id){
                $noti_sender_user_id = $user->id;
                $noti_receiver_user_id = 1;
                $noti_link = "/subscription/view/".$subscription->id;
                $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." The Bank Address Change Request";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 1; 
            $actionLog['model'] = "Subscriptions"; 
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Company Bank Detail Change Request.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            // log attachments
            $attachment_type_ids = [21,22];
            $attachmentData = SsAttachment::where('subscription_id',$sub_att_id)
                                ->whereIn('attachment_type', $attachment_type_ids)
                                ->get();

            foreach ($attachmentData as $key => $data) {
            
                $logAttachment = [];
                $logAttachment['auditlog_id'] = $auditlog->id;
                $logAttachment['attachment'] = $data->attachment;

                LogAttachment::create($logAttachment);
            }


            $subscriptionData = Subscription::findOrFail($sub_att_id);
            $subscriptionData->bankac_status = 1;
            $subscriptionData->save();

            return response()->json(['data' => "done", 'error' => true, 'msg' => "The bank account form has been saved"], 200); 
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The bank account form could not be saved. Please, try again."], 200);
    }

    public function uploadAttachImageRemove(Request $request)
    {
        //
    }

    public function reinvestRequest(Request $request)
    {
        $user_id = Auth::user()->id;
        $sub_id = $request->get('sub_id');

        $subscription = Subscription::where('id', $sub_id)
                            ->where('user_id', $user_id)
                            ->first();

        $requestData['reinvestment_request'] =1;
        $updated = $subscription->update($requestData);

        if($updated) {

            if(($subscription->status == 3) || ($subscription->status == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }

            $user = User::findOrFail($user_id);

            // reinvestment request emails
            
            // sendReinvestmentNoticeForAdmin($user, $subscription);
            // sendReinvestmentNoticeForInvestor($user, $subscription);

            if($subscription->fund_type == 1){
                $msg_fund_type = "MCIL1";
            }else if($subscription->fund_type == 2){
                $msg_fund_type = "MCIL2";
            }else if($subscription->fund_type == 3){
                $msg_fund_type = "MCIL3";
            }else{
                $msg_fund_type = "";
            }

            if($user->id){
                $noti_sender_user_id = $user->id;
                $noti_receiver_user_id = 1;
                $noti_link = "/subscription/view/".$subscription->id;
                $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." The Re-Investment Request";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 0; 
            $actionLog['model'] = "Subscriptions"; 
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." The Re-Investment Request Created.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['data' => "done", 'error' => true, 'msg' => "The reinvestment request has been saved"], 200); 
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The reinvestment request could not be saved. Please, try again."], 200); 
    }

    public function redemptionUpload(Request $request)
    {
        $user_id = Auth::user()->id;
        $sub_att_id = @$request->get('subs_att_id') == "" ? $request->get('sub_att_id') : $request->get('subs_att_id');
        $subscription = Subscription::where('id', $sub_att_id)
                            ->where('user_id', $user_id)
                            ->first();

        $attachment = $request->file('redemption_file');
        if(!empty($attachment)){
            
            $fileName = time().'_'.$request->redemption_file->getClientOriginalName();
            $filePath = $attachment->storeAs('ssattachment', $fileName, 'public');

            $image_name = $filePath;
        }else{
            $image_name = "";
        }

        $requestData['redemption_file'] = $image_name;
        $requestData['redemption_request'] =1;
        $updated = $subscription->update($requestData);

        if ($updated) {
            
            if(($subscription->status == 3) || ($subscription->status == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }

            $user = User::findOrFail($user_id);

            sendRedemptionNoticeForAdmin($user, $subscription);
            sendRedemptionNoticeForInvestor($user, $subscription);

            if($subscription->fund_type == 1){
                $msg_fund_type = "MCIL1";
            }else if($subscription->fund_type == 2){
                $msg_fund_type = "MCIL2";
            }else if($subscription->fund_type == 3){
                $msg_fund_type = "MCIL3";
            }else{
                $msg_fund_type = "";
            }

            if($user->id){
                $noti_sender_user_id = $user->id;
                $noti_receiver_user_id = 1;
                $noti_link = "/subscription/view/".$subscription->id;
                $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." The Redemption Request";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 1; 
            $actionLog['model'] = "SsAttachments"; 
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Company Redemption Request Documents Uploaded.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            // log attachments
            $logAttachment = [];
            $logAttachment['auditlog_id'] = $auditlog->id;
            $logAttachment['attachment'] = $image_name;

            LogAttachment::create($logAttachment);

            return response()->json(['data' => "done", 'error' => true, 'msg' => "The Redemption Form has been saved"], 200); 
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Redemption Form could not be saved. Please, try again."], 200); 
    }

    public function myProfile(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($userId);

        return view('company.profile', compact('user'));
    }

    public function settings(Request $request)
    {
        $userId = Auth::user()->id;

        if($userId) {
            $user = User::findOrFail($userId);

            $google2fa = app('pragmarx.google2fa');
            $google2fa_secret = $google2fa->generateSecretKey();

            $qr_image = $google2fa->getQRCodeInline(
                config('app.name'),
                rand(),
                $google2fa_secret
            );


        } else {
            return redirect('/company/dashboard');
        }

        return view('company.settings', compact('user', 'google2fa_secret', 'qr_image'));
    }

    public function changePassword(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        if (empty($user)) {
            return redirect()->back()->with("error","User not found. Please try again.");
        }

        if (!(\Hash::check($request->get('oldpassword'), $user->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('oldpassword'), $request->get('password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        //Change Password
        $user->password = \Hash::make($request->get('password'));
        $user->save();

        //user action logs
        $auth_user = Auth::user();
        $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = 0;
        $actionLog['user_id'] = $user->id;
        $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = 0;
        $actionLog['is_doc_enable'] = 0; 
        $actionLog['model'] = "Settings"; 
        $actionLog['action'] = $user->first_name.$user->last_name." Updated his Password.";
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function gauthEnable(Request $request)
    {   
        $userId = Auth::user()->id;
        $userData = User::find($userId);
        
        $secret = $request->input('secretcode');
        $oneCode = $request->input('code');

        $userstatus =  $userData['2fa_status'];
        $userkey =  $userData['2fa_key'];

        if($userstatus==1 && $userkey!="") {
            return response()->json(['status' => 2, 'error'=>1, 'msg' => "Wrong code entered.Please try again.."], 200);
        }

        $google2fa = app('pragmarx.google2fa');
        $valid = $google2fa->verifyKey($secret, $oneCode, 2); // 2 = 2*30sec clock tolerance

        if ($valid) {
            $userData['2fa_key'] =  $secret;
            $userData['2fa_status'] = 1;
            $userData->save();

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = 0;
            $actionLog['user_id'] = $userData->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = 0;
            $actionLog['is_doc_enable'] = 0; 
            $actionLog['model'] = "Settings"; 
            $actionLog['action'] = $userData->first_name.$userData->last_name." Disabled Messaging OTP and Enabled Two-Factor Authentication (2FA).";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['status' => 0, 'error'=>0, 'msg' => "Two-Factor Authentication (2FA) Is Enabled"], 201); 
        }
        return response()->json(['status' => 1, 'error'=>1, 'msg' => "Wrong code entered.Please try again.."], 200);
    }

    public function gauthDisable(Request $request)
    {
        $status = $request->get('status'); 
        $userId = Auth::user()->id;
        $userData = User::find($userId);

        if ($status == 0) {
            
            $userData['2fa_key'] =  "";
            $userData['2fa_status'] = 0;
            $userData->save();

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = 0;
            $actionLog['user_id'] = $userData->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = 0;
            $actionLog['is_doc_enable'] = 0; 
            $actionLog['model'] = "Settings"; 
            $actionLog['action'] = $userData->first_name.$userData->last_name." Disabled Two-Factor Authentication (2FA) and Enabled Messaging OTP.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);
            
            return response()->json(['status' => 0, 'error'=>0, 'msg' => "Two-Factor Authentication (2FA) Is Disbled."], 201); 
        }
        
        return response()->json(['status' => 1, 'error'=>1, 'msg' => "Something Went Wrong.Please try again.."], 200);
    }

    public function notification(Request $request)
    {
        $user = \Auth::user(); 
        $notificationGlobal = getNotifications();

        return view('notification.coNotification', compact('notificationGlobal'));
    }

    public function notificationIndex(Request $request)
    {
        $user_id = Auth::user()->id;
        $emails = UserEmailRecipient::with('UserEmails')
                    ->where('user_id', $user_id)
                    ->orderBy('id', 'DESC')
                    ->get();

        return view('company.messages.index', compact('emails')); 
    }

    public function notificationView(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $email = UserEmailRecipient::with('UserEmails')
                    ->where('user_id', $user_id)
                    ->where('id', $id)
                    ->first();

        $userEmail = UserEmailRecipient::findOrFail($email->id);
        $emailData['notification'] = 0;

        $userEmail->update($emailData);

        return view('company.messages.view', compact('email')); 
    }

    public function fmsgIndex(Request $request)
    {
        $flash_msgs = Flashmsg::where('active', 1)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);

        return view('company.flashmsgs.index', compact('flash_msgs'));
    }

    public function fmsgView(Request $request, $id)
    {
        $fmsg = Flashmsg::findOrFail($id);
        return view('company.flashmsgs.view', compact('fmsg'));
    }

    private function copyDocument($old_subscription_id, $subscription_id) 
    {
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

    private function update_draft_refreance_no($id) 
    {
        $subscription = Subscription::find($id);
               
        if(empty($subscription->draft_refrence_id)){
            $get_draft_no = new Subscription();
            $subscriptionData['draft_refrence_id'] = $get_draft_no->get_draft_no();
            $subscription->update($subscriptionData);
            
            // update draft serial no
            // $serial_draft_no = new Subscription();
            $get_draft_no->serial_draft_no();
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

    private function convert_number_to_words($num) {

        $num = str_replace(array(',', ' '), '' , trim($num));
        if(! $num) {
            return false;
        }
        $num = (int) $num;
        $words = array();
        $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');

        $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
        
        $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion', 'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion', 'quindecillion','sexdecillion','septendecillion','octodecillion','novemdecillion', 'vigintillion');
        
        $num_length = strlen($num);
        $levels = (int) (($num_length + 2) / 3);
        $max_length = $levels * 3;
        $num = substr('00' . $num, -$max_length);
        $num_levels = str_split($num, 3);
        for ($i = 0; $i < count($num_levels); $i++) {
            $levels--;
            $hundreds = (int) ($num_levels[$i] / 100);
            $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
            $tens = (int) ($num_levels[$i] % 100);
            $singles = '';
            if ( $tens < 20 ) {
                $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
            } else {
                $tens = (int)($tens / 10);
                $tens = ' ' . $list2[$tens] . ' ';
                $singles = (int) ($num_levels[$i] % 10);
                $singles = ' ' . $list1[$singles] . ' ';
            }
            $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
        } //end for loop
        $commas = count($words);
        if ($commas > 1) {
            $commas = $commas - 1;
        }
        return implode(' ', $words);
    }
}

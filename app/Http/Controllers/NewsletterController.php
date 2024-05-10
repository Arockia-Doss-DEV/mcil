<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Subscription;
use App\Models\UserEmail;
use App\Models\UserEmailRecipient;
use App\Models\UserEmailSignature;
use App\Models\UserEmailTemplate;
use App\Models\ScheduledEmail;
use App\Models\ScheduledEmailRecipient;
use App\Models\McilFund;
use Spatie\Permission\Models\Role;
use Setting;
use Session;
use Mail;
use App\Mail\SendMailToUser;
use Log;
use Illuminate\Support\Facades\Validator;
use Newsletter;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        $user = Auth::user();

        if ($getGlobalFund == "All") {
        
        } else {
            $cond['fund_type'] = $getGlobalFund;
        }

        if(!$user->hasRole('Admin')){
            $cond['sent_by'] = $user_id = Auth::user()->id;
        }

        $q =  $request->input('q');
        if($q!=""){

            $userEmails = UserEmail::whereHas('Users', function($query) use($q) {
                $query->where('first_name', 'like', '%'.$q.'%');
            })
            ->where($cond)
            ->where('from_name','LIKE','%'.$q.'%')
            ->orWhere('from_email', 'LIKE','%'.$q.'%')
            ->orWhere('subject', 'LIKE','%'.$q.'%')
            ->orWhere('message', 'LIKE','%'.$q.'%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

            $userEmails->appends(['q' => $q]);
        }else{
            $userEmails = UserEmail::with('Users')
                                ->where($cond)
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        }

        if ($userEmails->count() > 0) {

            foreach ($userEmails as $key=>$row) {
                
                if(!empty($row['user_group_id'])) {

                    $g_name = [];
                    $invester_array = explode(',', $row['user_group_id']);

                    foreach ($invester_array as $key1 => $value) {
                        
                        if($value == "ALL"){
                            $g_name[$key1] = "All";
                        }
                        
                        if($value == "IA"){
                            $g_name[$key1] = "Investors Active";
                        }
                        
                        if($value == "IIA"){
                            $g_name[$key1] = "Investors In-active";
                        }

                        if($value == "AA"){
                            $g_name[$key1] = "Agents Active";
                        }

                        if($value == "AIA"){
                            $g_name[$key1] = "Agents In-active";
                        }
                    }

                    $userEmails[$key]['group_name'] = implode(', ', $g_name);
                }

                $userEmails[$key]['total_sent_emails'] = UserEmailRecipient::where('user_email_id', $row['id'])
                                                            ->where('is_email_sent', 1)
                                                            ->count();
            }
        }

        return view('newsletter.index', compact('userEmails'));
    }

    public function createNewsletter(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        $cond = [];
        $fund = 0;

        if($getGlobalFund == "All"){

            $fund = 0;
        } else {

            $fundCond = [
                ['fund_type', '=', $getGlobalFund]
            ];

            $fund = $getGlobalFund;
        }

        $confirm = null;
        if($request->get('confirmEmail')) {
            $confirm = 'confirm';
        }

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 5200);

        $userEmails = $request->all();

        $confirmRender = false;
        if($request->get('UserEmails.type')) {

            if ($request->get('UserEmails.type') == 'USERS') {
                
                $request->request->remove('UserEmails.user_group_id');
                $request->request->remove('UserEmails.to_email');
                $request->request->remove('UserEmails.user_fund_id');

                if(is_array($request->get('UserEmails.user_id'))) {
                    sort($request->get('UserEmails.user_id'));
                    $userEmails['UserEmails']['user_id'] = implode(',', $request->get('UserEmails.user_id'));
                }

            } elseif($request->get('UserEmails.type') == 'GROUPS') {

                $request->request->remove('UserEmails.user_id');
                $request->request->remove('UserEmails.to_email');
                $request->request->remove('UserEmails.user_fund_id');

                if(is_array($request->get('UserEmails.user_group_id'))) {
                    sort($request->get('UserEmails.user_group_id'));
                    $userEmails['UserEmails']['user_group_id'] = implode(',', $request->get('UserEmails.user_group_id'));
                }

            } elseif($request->get('UserEmails.type') == 'FUNDS') {

                $request->request->remove('UserEmails.user_group_id');
                $request->request->remove('UserEmails.to_email');
                $request->request->remove('UserEmails.user_id');

                if(is_array($request->get('UserEmails.user_fund_id'))) {
                    sort($request->get('UserEmails.user_fund_id'));
                    $userEmails['UserEmails']['user_group_id'] = implode(',', $request->get('UserEmails.user_fund_id'));
                }

            } else {

                $request->request->remove('UserEmails.user_id');
                $request->request->remove('UserEmails.to_email');
                $request->request->remove('UserEmails.user_group_id');
                $request->request->remove('UserEmails.user_fund_id');
            }
        }

        if(!empty($request->get('UserEmails.schedule_date'))) {
            $userEmails['UserEmails']['schedule_date'] = new Time($request->get('UserEmails.schedule_date'));
        }

        $userEmailEntity = $request->all();
        
        if(request()->isMethod('post')) {

            $validator = Validator::make($request->all(), [
                'UserEmails.type'  => 'in:GROUPS,USERS,MANUAL,FUNDS',             
                'UserEmails.user_group_id' => 'required_if:UserEmails.type,==,GROUPS',
                'UserEmails.user_id' => 'required_if:UserEmails.type,==,USERS', 
                'UserEmails.to_email' => 'required_if:UserEmails.type,==,MANUAL',
                'UserEmails.user_fund_id' => 'required_if:UserEmails.type,==,FUNDS',
            ],
            [
                'UserEmails.type.required' => 'Please Select Any Group',
                'UserEmails.user_group_id.required_if' => 'Please Select Atleast One User Group!',
                'UserEmails.user_id.required_if' => 'Please Select Atleast One User Country!',
                'UserEmails.to_email.required_if' => 'Please fillout the valid email in the box!',
                'UserEmails.user_fund_id.required_if' => 'Please Select Atleast One User Fund!',
            ]);
            
            if ($validator->fails()) {
                Session::flash('error', $validator->messages()->first());
                return redirect()->back()->withInput();
            }

            $users = [];
            if(is_null($confirm)) {

                if ($request->hasFile('attachment')) {
                    $attachment= $request->file('attachment');
                    // $fileName = time().'_'.$attachment->getClientOriginalName();
                    $fileName = uniqid() . $attachment->getClientOriginalName();
                    $filePath = $attachment->storeAs('newsletter/uploads', $fileName, 'public');

                    $file_name = $filePath;
                    if(!empty($file_name)){
                        $userEmailEntity['attachment'] = $file_name;
                    }

                } else {
                    $userEmailEntity['attachment']="";
                }

                if($userEmailEntity['UserEmails']['type'] == 'GROUPS') {

                    $cond = [];
                    $groupCond = [];
                    $groupSubCond = [];
                    $groupSubCond2 = [];
                    $groupSubCond3 = [];

                    if (in_array("ALL", $userEmailEntity['UserEmails']['user_group_id'])) {

                        $groupCond[] = [
                            ['is_agent', '=', 0],
                        ];

                        $groupSubCond[] = [
                        ];

                        $groupSubCond2[] = [
                            
                        ];

                        $groupSubCond3[] = [
                        ];

                    } else {

                        $cond = [
                            ['active', '=', 1]
                        ];

                        foreach($userEmailEntity['UserEmails']['user_group_id'] as $groupId) {

                            if($groupId == "IA"){

                                if ($fund == 0) {
                                   
                                    $groupCond[] = [
                                        ['status', '=', 1],
                                        ['is_agent', '=', 0],
                                        ['active', '=', 1]
                                    ];

                                    $groupSubCond[] = [
                                        ['is_first', '=', 1],
                                        ['status', '=', 3],
                                    ];

                                    $groupSubCond2[] = [
                                        ['is_first', '=', 0],
                                        ['status', '=', 3],
                                    ];

                                    $groupSubCond3[] = [
                                        ['is_first', '=', 0],
                                        ['is_reinvestment', '=', 1],
                                    ];

                                } else {

                                    $groupCond[] = [
                                        ['status', '=', 1],
                                        ['is_agent', '=', 0],
                                        ['active', '=', 1]
                                    ];

                                    $groupSubCond[] = [
                                        ['fund_type', '=', $getGlobalFund],
                                        ['is_first', '=', 1],
                                        ['status', '=', 3],
                                    ];

                                    $groupSubCond2[] = [
                                        ['fund_type', '=', $getGlobalFund],
                                        ['is_first', '=', 0],
                                        ['status', '=', 3],
                                    ];

                                    $groupSubCond3[] = [
                                        ['fund_type', '=', $getGlobalFund],
                                        ['is_first', '=', 0],
                                        ['is_reinvestment', '=', 1],
                                    ];
                                }
                            }
                            
                            if($groupId == "IIA"){

                                if ($fund == 0) {

                                    $groupCond[] = [
                                        ['status', '=', 0],
                                        ['is_agent', '=', 0],
                                        ['active', '!=', 3]
                                    ];

                                    $groupSubCond[] = [
                                        ['is_first', '=', 1],
                                        ['status', '!=', 3],
                                    ];

                                    $groupSubCond2[] = [
                                        ['is_first', '=', 0],
                                        ['status', '!=', 3],
                                    ];

                                    $groupSubCond3[] = [
                                        ['is_first', '=', 0],
                                        ['is_reinvestment', '!=', 1],
                                    ];

                                } else {

                                    $groupCond[] = [
                                        ['status', '=', 0],
                                        ['is_agent', '=', 0],
                                        ['active', '!=', 3]
                                    ];

                                    $groupSubCond[] = [
                                        ['fund_type', '=', $getGlobalFund],
                                        ['is_first', '=', 1],
                                        ['status', '!=', 3],
                                    ];

                                    $groupSubCond2[] = [
                                        ['fund_type', '=', $getGlobalFund],
                                        ['is_first', '=', 0],
                                        ['status', '!=', 3],
                                    ];

                                    $groupSubCond3[] = [
                                        ['fund_type', '=', $getGlobalFund],
                                        ['is_first', '=', 0],
                                        ['is_reinvestment', '!=', 1],
                                    ];
                                }
                            }

                            if($groupId == "AA"){

                                $groupCond[] = [
                                    ['status', '=', 1],
                                    ['is_agent', '=', 1],
                                    ['active', '=', 1],
                                ];

                                $groupSubCond[] = [
                                ];

                                $groupSubCond2[] = [
                                    
                                ];

                                $groupSubCond3[] = [
                                ];
                            }

                            if($groupId == "AIA"){

                                $groupCond[] = [
                                    ['status', '=', 0],
                                    ['is_agent', '=', 1],
                                    ['active', '=', 0],
                                ];

                                $groupSubCond[] = [
                                ];

                                $groupSubCond2[] = [
                                    
                                ];

                                $groupSubCond3[] = [
                                ];
                            }
                        }
                    }

                    $users = User::with(['subscriptions'])

                                // ->whereHas('subscriptions', function($qry) use($fundCond) {
                                //     $qry->where($fundCond);
                                // })

                                ->whereHas('subscriptions', function($query) use($groupSubCond, $groupSubCond2, $groupSubCond3) {
                                    $query->where([$groupSubCond]);
                                    $query->orWhere([$groupSubCond2]);
                                    $query->orWhere([$groupSubCond3]);
                                })

                            ->where(
                                    function($q) use ($groupCond) {
                                        return $q->where([
                                            $groupCond
                                        ]);
                                    }
                                )
                            ->where('role_id', '!=', 1)
                            ->where('is_tester', '!=', 1)
                            ->get()
                            ->toArray();

                    //get unique user mail
                    $temp_array = [];
                    foreach ($users as &$v) {
                       if (!isset($temp_array[$v['email']]))
                       $temp_array[$v['email']] =& $v;
                    }
                    $users = array_values($temp_array);

                } else if($userEmailEntity['UserEmails']['type'] == 'USERS') {

                    $cond = [];
                    $cond = [
                        ['active', '=', 1]
                    ];

                    $groupCond = [];
                    foreach($userEmailEntity['UserEmails']['user_id'] as $groupId) {

                        $groupCond[] = $groupId;
                    }

                    $users = User::with(['subscriptions'])
                                ->whereHas('subscriptions', function($query) use($fundCond) {
                                    $query->where($fundCond);
                                })
                            ->where(
                                    function($q) use ($groupCond) {
                                        return $q->whereIn('country', $groupCond);
                                    }
                                )
                            ->where($cond)
                            ->where('role_id', '!=', 1)
                            ->where('is_tester', '!=', 1)
                            ->get()
                            ->toArray();

                    //get unique user mail
                    $temp_array = [];
                    foreach ($users as &$v) {
                       if (!isset($temp_array[$v['email']]))
                       $temp_array[$v['email']] =& $v;
                    }
                    $users = array_values($temp_array);

                } else if($userEmailEntity['UserEmails']['type'] == 'MANUAL') {

                    $emails = array_filter(array_map('trim', explode(',', strtolower($userEmailEntity['UserEmails']['to_email']))));

                    foreach ($emails as $key => $email) {

                        $users[] = [
                            'email' => $email,
                            'id' => null,
                            'first_name' => null,
                            'last_name' => null
                        ];
                    }

                } else if($userEmailEntity['UserEmails']['type'] == 'FUNDS') {

                    $cond = [];
                    $cond = [
                        ['active', '=', 1]
                    ];

                    $groupCond = [];
                    if (in_array("0", $userEmailEntity['UserEmails']['user_fund_id'])) {

                        $groupCond[] = 0;
                    } else {

                        foreach($userEmailEntity['UserEmails']['user_fund_id'] as $fundId) {

                            $groupCond[] = $fundId;
                        }
                    }

                    $groupSubCond1[] = [
                        ['status', '=', 1],
                        ['is_agent', '=', 0],
                        ['active', '=', 1]
                    ];

                    $groupSubCond2[] = [
                        ['is_first', '=', 1],
                        ['status', '=', 3],
                    ];

                    $groupSubCond3[] = [
                        ['is_first', '=', 0],
                        ['status', '=', 3],
                    ];

                    $groupSubCond4[] = [
                        ['is_first', '=', 0],
                        ['is_reinvestment', '=', 1],
                    ];

                    $users = User::with(['subscriptions'])

                                ->whereHas('subscriptions', function($query) use($groupCond) {
                                    if (!in_array("0", $groupCond)){
                                        $query->whereIn('fund_type', $groupCond);
                                    }
                                })
                                
                                ->whereHas('subscriptions', function($query) use($groupCond, $groupSubCond2, $groupSubCond3, $groupSubCond4) {
                                    
                                    $query->where([$groupSubCond2]);
                                    $query->orWhere([$groupSubCond3]);
                                    $query->orWhere([$groupSubCond4]);
                                })
                            ->where([$groupSubCond1])
                            ->where('is_tester', '!=', 1)
                            ->where('role_id', '!=', 1)
                            ->get()
                            ->toArray();

                    //get unique user mail
                    $temp_array = [];
                    foreach ($users as &$v) {
                       if (!isset($temp_array[$v['email']]))
                       $temp_array[$v['email']] =& $v;
                    }
                    $users = array_values($temp_array);

                } else {
            
                    return \Redirect()->back()->with("error", "Please Select Type.");
                }

            } else if($confirm == 'confirm') {

                $i = 0;
                foreach($userEmailEntity['UserEmails']['EmailList'] as $row) {
                    if(isset($row['emailcheck']) && $row['emailcheck'] && !empty($row['email'])) {
                        $users[$i]['id'] = $row['uid'];
                        $users[$i]['email'] = $row['email'];
                        $i++;
                    }
                }
            }

            if(!empty($users)) {
                if(is_null($confirm)) {

                    $userEmailEntity['UserEmails']['total_rows'] = count($users);
                    if($userEmailEntity['UserEmails']['template']) {
                        $template = UserEmailTemplate::GetEmailTemplateById($userEmailEntity['UserEmails']['template']); 
                    }
                    if($userEmailEntity['UserEmails']['signature']) {
                        $signature = UserEmailSignature::GetEmailSignatureById($userEmailEntity['UserEmails']['signature']);
                    }
                    $message = '';
                    if(!empty($template['header'])) {
                        $message .= $template['header']."<br/>";
                    }
                    $message .= $userEmailEntity['UserEmails']['message'];
                    if(!empty($signature['signature'])) {
                        $message .= $signature['signature'];
                    }
                    if(!empty($template['footer'])) {
                        $message .= "<br/>".$template['footer'];
                    }

                    $userEmailEntity['UserEmails']['fundType'] = $fund;
                    $userEmailEntity['UserEmails']['modified_message'] = $message;
                    session(['send_email_data' => $userEmailEntity]);
                    $confirmRender = true;

                } else if($confirm == 'confirm') {

                    $data = session('send_email_data');

                    $postRows = count($userEmailEntity['UserEmails']['EmailList']);
                    if($data['UserEmails']['total_rows'] > $postRows) {
                        die('We did not get all email rows in post data, please check max_input_vars configuration on server.');
                    }
                    if(!empty($data['UserEmails']['schedule_date'])) {

                        $scheduled = $this->saveScheduledEmails($data, $users);
                        if($scheduled) {
                            $request->session()->forget('send_email_data');
                            // $this->redirect(['controller'=>'ScheduledEmails', 'action'=>'index']);
                        } else {
                            return \Redirect::to('/newsletters')->with('error', 'Something Went Wrong.');
                        }

                    } else {

                        $sent = $this->sendAndSaveUserEmail($data, $users);
                        if($sent) {
                            $request->session()->forget('send_email_data');
                            return \Redirect::to('/newsletters')->with('success', 'All Emails have been sent successfully.');
                        } else {
                            return \Redirect::to('/newsletters')->with('error', 'Something Went Wrong..');
                        }
                    }
                }

            } else {

                if($userEmailEntity['UserEmails']['type'] == 'GROUPS') {
                    return \Redirect::back()->with('error', 'No users found in selected group');
                }
            }

        } else {

            $userEmailEntity['UserEmails']['from_name'] = Setting::get('email_from_name');
            $userEmailEntity['UserEmails']['from_email'] = Setting::get('email_from_address');

            if(session('send_email_data')) {
                $userEmailEntity['UserEmails'] = session('send_email_data');
                if(!empty($userEmailEntity['UserEmails']['schedule_date'])) {
                    $userEmailEntity['UserEmails']['schedule_date'] = date('Y-m-d H:i:s', strtotime($userEmailEntity['schedule_date']));
                }
                $request->session()->forget('send_email_data');
            }
        }

        $sel_users = [];
        $templates = [];
        $signatures = [];
        if(!$confirmRender) {

            $sel_users = [];
            if(!empty($userEmailEntity['UserEmails']['user_id'])) {
                $sel_users = User::GetAllUsersWithUserIds($userEmailEntity['UserEmails']['user_id'])->get();
            }

            $templates = UserEmailTemplate::GetEmailTemplates();
            $signatures = UserEmailSignature::GetEmailSignatures();
        }

        $groups = Role::pluck('name','name')->all();
        $funds = McilFund::where('active', 1)->get();

        $country_result =  User::with(['countryAs', 'subscriptions'])
                                ->whereHas('countryAs', function($q) {
                                    $q->select('name');
                                })
                                ->whereHas('subscriptions', function($q) use($fundCond) {
                                    $q->orWhere('fund_type', '=', $fundCond);
                                    $q->where('draft_delete', '!=', 1);
                                })
                            ->select('country', 'id')
                            ->where('active', 1)
                            ->where('role_id', '!=', 1)
                            ->where('is_tester', '!=', 1)
                            ->distinct('id')
                            ->get();

        $userCountrys = [];
        
        foreach($country_result as $row) {
            $userCountrys[$row['country']] = $row['countryAs']['name'];         
        }

        $userCountrys = array_unique($userCountrys);

        if($confirmRender) {

            return view('newsletter.sendConfirm', compact('groups', 'sel_users', 'userCountrys', 'templates', 'signatures', 'userEmailEntity', 'users'));
        }

        return view('newsletter.create', compact('groups', 'funds', 'sel_users', 'userCountrys', 'templates', 'signatures', 'userEmailEntity'));
    }

    public function viewNewsletter($id)
    {
        if(!empty($id)) {

            $cond = [];
            $cond['id'] = $id;
            $user = Auth::user();

            if(!$user->hasRole('Admin')){
                $cond['sent_by'] = Auth::user()->id;
            }

            $userEmail = UserEmail::with('Users')
                                ->where($cond)
                                ->first();

            if(!empty($userEmail)) {
                if(!empty($userEmail['user_group_id'])) {

                    $g_name = [];
                    $invester_array = explode(',', $userEmail['user_group_id']);

                    foreach ($invester_array as $key1 => $value) {

                        if($value == "ALL"){
                            $g_name[$key1] = "All";
                        }

                        if($value == "IA"){
                            $g_name[$key1] = "Investors Active";
                        }
                        
                        if($value == "IIA"){
                            $g_name[$key1] = "Investors In-active";
                        }

                        if($value == "AA"){
                            $g_name[$key1] = "Agents Active";
                        }

                        if($value == "AIA"){
                            $g_name[$key1] = "Agents In-active";
                        }
                    }

                    $userEmail['group_name'] = implode(', ', $g_name);
                }

                $userEmail['total_sent_emails'] = UserEmailRecipient::where('user_email_id', $userEmail['id'])
                                                            ->where('is_email_sent', 1)
                                                            ->count();

                $userEmailRecipients = UserEmailRecipient::with('Users')
                                                ->where('user_email_id', $id)
                                                ->get();

                return view('newsletter.view', compact('userEmail', 'userEmailRecipients'));                               

            } else {

                return \Redirect::to('/newsletters')->with('error', 'Missing User Email Id.');
            }

        } else {
            return \Redirect::to('/newsletters')->with('error', 'Missing User Email Id.');
        }
    }

    public function subscribeIndex()
    {
        return view('newsletter.subscribeIndex');
    }

    public function subscribe(Request $request)
    {
        $email = $request->email;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $phone = "51251232";

        try {
            
            if (Newsletter::isSubscribed($request->email)) {
                return redirect('newsletters')->with('error', 'Email Already Subscribed');

            } else {

                // Newsletter::subscribe($request->email);
                Newsletter::subscribe($email, [
                    'FNAME'=>$firstName, 
                    'LNAME'=>$lastName, 
                    "ADDRESS" => [
                        "addr1" => "123 Freddie Ave",
                        "city" => "Atlanta",
                        "state" => "GA",
                        "zip" => "12345"
                    ], 
                    'PHONE'=>$phone]);
                return redirect('newsletters')->with('success', 'Thanks For Subscribe');
            }

        } catch (\Exception $e) {
            return redirect('newsletters')->with('error', $e->getMessage());
        }
    }

    private function sendAndSaveUserEmail($data, $users) {

        $requestData = [];

        $requestData['sent_by'] = Auth::user()->id;
        if(!empty($data['UserEmails']['user_group_id'])) {
            sort($data['UserEmails']['user_group_id']);
            $requestData['user_group_id'] = implode(',', $data['UserEmails']['user_group_id']);
        }

        $requestData['type'] = $data['UserEmails']['type'];
        $requestData['cc_to'] = $data['UserEmails']['cc_to'];
        $requestData['from_name'] = $data['UserEmails']['from_name'];
        $requestData['from_email'] = $data['UserEmails']['from_email'];
        $requestData['subject'] = $data['UserEmails']['subject'];
        $requestData['message'] = $data['UserEmails']['modified_message'];
        $requestData['fund_type'] = $data['UserEmails']['fundType'];
        $requestData['attachment'] = $data['attachment'];

        $userEmail = UserEmail::create($requestData);

        $fromConfig = $data['UserEmails']['from_email'];
        $fromNameConfig = $data['UserEmails']['from_name'];
        $msg = $data['UserEmails']['message'];
        $subject = $data['UserEmails']['subject'];

        $emailObj = new \stdClass();
        $emailObj->fromConfig = $fromConfig;
        $emailObj->fromNameConfig = $fromNameConfig;
        $emailObj->msg = $msg;
        $emailObj->subject = $subject;

        if(!empty($data['attachment'])){
            $attach = storage_path('app/public/' . $data['attachment']);

        }else{
            $attach = "";
        }

        $ccEmails = array_filter(array_map('trim', explode(',', strtolower($data['UserEmails']['cc_to']))));
        if (!empty($ccEmails)) {

            $ccEmails = $ccEmails;
        } else {
            $ccEmails = [];
        }

        $totalSentEmails = $totalEmails = 0;
        $sentEmails = [];

        $mail_conf = Setting::get('send_mail_conf');

        foreach($users as $user) {
            if(!isset($sentEmails[$user['email']])) {

                $totalEmails++;

                if ($mail_conf == 1) {

                    \Mail::to($user['email'])
                        ->cc($ccEmails)
                        ->send(new SendMailToUser($emailObj, $subject, $attach));
                }

                $userEmailRecipient = [];
                $userEmailRecipient['is_email_sent'] = 1;
                $userEmailRecipient['user_email_id'] = $userEmail['id'];
                $userEmailRecipient['user_id'] = $user['id'];
                $userEmailRecipient['email_address'] = $user['email'];

                // if (Newsletter::isSubscribed($user['email'])) {
                // }else{
                //     Newsletter::subscribe($user['email']);
                // }

                $UserEmailRecipients = UserEmailRecipient::create($userEmailRecipient);

                $totalSentEmails++;

                $sentEmails[$user['email']] = $user['email'];

                $user = User::where('id', $user['id'])->first();


                if (!$data['UserEmails']['type'] == "MANUAL") {
                    
                    if($user['role_id'] == 2){
                        $link_base = "/individual/newsletter/view/";
                    }else{
                        $link_base = "/company/newsletter/view/";
                    }

                    //Notification Save
                    if($user['id']){
                        $noti_sender_user_id = 1;
                        $noti_receiver_user_id = $user['id'];
                        $noti_link = $link_base.$UserEmailRecipients->id;
                        $noti_message = $subject;
                        
                        $notification = new User;
                        $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                    }
                }
            }
        }

        // \Log::info('totalSentEmails  : ' . $totalSentEmails. ' totalEmails : ' .$totalEmails);

        if(!empty($data['UserEmails']['cc_to'])) {
            $data['cc_to'] = array_filter(array_map('trim', explode(',', strtolower($data['UserEmails']['cc_to']))));
            foreach($data['cc_to'] as $ccEmail) {
                
                if ($mail_conf == 1) {
                    \Mail::to($ccEmail)->send(new SendMailToUser($emailObj, $subject, $attach));
                }
            }
        }

        if($totalSentEmails > 0) {

            if($totalSentEmails == $totalEmails) {
                return \Redirect::to('/newsletters')->with('success', 'All Emails have been sent successfully');
            } else {
                return \Redirect::to('/newsletters')->with('success', 'Out of {0) Emails only {1} Emails have been sent successfully', [$totalEmails, $totalSentEmails]);
            }
            return true;

        } else {

            return \Redirect::to('/newsletters')->with('error', 'There is problem in sending emails, please try again');
            return false;
        }
    }

    private function saveScheduledEmails($data, $users) {

        $data['scheduled_by'] = Auth::user()->id;
        if(!empty($data['UserEmails']['user_group_id'])) {
            sort($data['UserEmails']['user_group_id']);
            $data['user_group_id'] = implode(',', $data['UserEmails']['user_group_id']);
        }

        $data['message'] = $data['UserEmails']['modified_message'];
        $scheduledEmail = ScheduledEmail::create($data);

        if ($scheduledEmail) {
            $scheduledEmails = [];
            foreach($users as $user) {
                if(!isset($scheduledEmails[$user['email']])) {
                    $scheduledEmailRecipient = new scheduledEmailRecipient;
                    $scheduledEmailRecipient->scheduled_email_id = $data['id'];
                    $scheduledEmailRecipient->user_id = $user['id'];
                    $scheduledEmailRecipient->email_address = $user['email'];

                    $scheduledEmailRecipient->save();
                    $scheduledEmails[$user['email']] = $user['email'];
                }
            }

            return \Redirect::to('/newsletters')->with('success', 'Email has been scheduled successfully.');
            return true;

        } else {
            return \Redirect::to('/newsletters')->with('error', 'These is some problem in saving data, please try again');
            return false;
        }
    }

}

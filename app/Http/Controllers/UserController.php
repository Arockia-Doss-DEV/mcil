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
use Auth;
use PDF;
use Setting;
use Carbon\Carbon;
use Cache;

class UserController extends Controller
{
    public function createInvestor(Request $request)
    {   

        $countries = Country::orderBy('name','asc')->pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
            }
        }
        
        $phone_prefix = array_reverse($phone_prefix,true);

        if(request()->isMethod('post')){

            $role_id = $request->role_id;
        
            if ($role_id == 2) {

                $user =  User::create([
                    'is_tester' => $request->is_tester,
                    'role_id' => $request->role_id,
                    'model_type' => "App\Models\User",
                    'salutation' => $request->salutation,
                    'first_name' => trim($request->first_name),
                    'gender' => $request->gender,
                    'bday' => $request->dob,
                    'address_line1' => $request->address_line1,
                    'address_line2' => $request->address_line2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'post_code' => $request->postcode,
                    'mobile_prefix' => $request->mobile_prefix,
                    'mobile_no' => $request->mobile_no,
                    'peremail' => strtolower(trim($request->peremail)),
                    'agent_email' => $request->agent_email,
                    'email' => strtolower(trim($request->email)),
                    'password' => Hash::make($request->password),
                    'ip_address' => \Request::getClientIp(true),
                    'status' => 1,
                    '2fa_status' => 0, 
                    '2fa_key' => null,
                    'email_verified_at' => Carbon::now()->format('Y-m-d'),
                    'email_verified' => 1,
                    'active' => 1,
                ]);

                $source_wealth = implode(", ",$request->source_wealth);

                $individual_user =  Individual::create([

                    'user_id' => $user->id,
                    'salutation' => $request->salutation,
                    'name' => trim($request->first_name),
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'country_residence' => $request->country_residence,
                    'nationality' => $request->nationality,
                    'passport' => $request->passport,
                    'occupation' => $request->occupation,
                    'employer_name' => $request->employer_name,
                    'annual_income' => $request->annual_income,
                    'source_wealth' => $source_wealth,
                    'source_wealth_other' => $request->source_wealth_other,
                ]);

            } else {

                $user =  User::create([
                    'is_tester' => $request->is_tester,
                    'role_id' => $request->role_id,
                    'model_type' => "App\Models\User",
                    'last_name' => trim($request->last_name),
                    'gender' => $request->gender,
                    'bday' => $request->dob,
                    'address_line1' => $request->address_line1,
                    'address_line2' => $request->address_line2,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'post_code' => $request->postcode,
                    'mobile_prefix' => $request->mobile_prefix,
                    'mobile_no' => $request->mobile_no,
                    'peremail' => strtolower(trim($request->peremail)),
                    'agent_email' => $request->agent_email,
                    'email' => strtolower(trim($request->email)),
                    'password' => Hash::make($request->password),
                    'ip_address' => \Request::getClientIp(true),
                    'status' => 1,
                    '2fa_status' => 0, 
                    '2fa_key' => null,
                    'email_verified_at' => Carbon::now()->format('Y-m-d'),
                    'email_verified' => 1,
                    'active' => 1,
                ]);

                $company_user =  Company::create([
                    'user_id' => $user->id,
                    'name' => trim($request->last_name),
                    'company_reg_no' => $request->company_reg_no,
                    'country_corporate' => $request->company_country_corporate,
                    'date_corporation' => $request->date_corporation,
                    'business_activity' => $request->business_activity,
                    'type_company' => $request->type_company,
                    'other_type_desc' => $request->company_others_sub,
                ]);
            }

            return redirect('/investor/active')->with('success','Your user registration done!');
        }

        return view('admin.investor.create', ['countries' => $countries, 'phone_prefix' => $phone_prefix]);
    }

    public function active(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        if ($getGlobalFund == "All") {

        } else {
            $fundCond['fund_type'] = $getGlobalFund;
        }

        $groupSubCond1[] = [
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

        $search =  $request->input('q');
        if($search!=""){

            $users = User::with(['subscriptions'])

                        ->whereHas('subscriptions', function($query) use($fundCond) {
                            $query->where($fundCond);
                        })

                        ->whereHas('subscriptions', function($query) use($groupSubCond1, $groupSubCond2, $groupSubCond3) {
                            $query->where([$groupSubCond1]);
                            $query->orWhere([$groupSubCond2]);
                            $query->orWhere([$groupSubCond3]);
                        })

                        ->where(function($q) use ($search) {
                                $q->where('email', 'LIKE', '%'.$search.'%');
                                $q->orWhere('mobile_no', 'LIKE', '%'.$search.'%');
                                $q->orWhere('first_name', 'LIKE', '%'.$search.'%');
                                $q->orWhere('last_name', 'LIKE', '%'.$search.'%');
                            }
                        )

                        ->where('status', 1)
                        ->where('active', 1)
                        ->where('role_id', '!=', 1)
                        ->where('is_tester', '!=', 1)
                        ->orderBy('id', 'DESC')
                        ->paginate(10);

                        $users->appends(['q' => $search]);
            
        } else { 

            $users =  User::with('countryAs', 'stateAs', 'mobilePrefix', 'subscriptions', 'individual', 'company')

                        ->whereHas('subscriptions', function($query) use($fundCond) {
                            $query->where($fundCond);
                        })

                        ->whereHas('subscriptions', function ($query) use($groupSubCond1, $groupSubCond2, $groupSubCond3) {
                            $query->where([$groupSubCond1]);
                            $query->orWhere([$groupSubCond2]);
                            $query->orWhere([$groupSubCond3]);
                        })
                        ->where('status', 1)
                        ->where('active', 1)
                        ->where('role_id', '!=', 1)
                        ->where('is_tester', '!=', 1)
                        ->orderBy('id', 'DESC')
                        ->paginate(10);
        }

        return view('admin.investor.active', compact('users'));
    }

    public function inActive(Request $request)
    {   
        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        if ($getGlobalFund == "All") {

        } else {
            $fundCond['fund_type'] = $getGlobalFund;
        }

        $groupSubCond1[] = [
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

        $search =  $request->input('q');
        if($search!=""){

            // $users = User::doesntHave('subscriptions')

            //             //user
            //             ->where(function($q) use ($search) {
            //                     $q->where('email', 'like', '%'.$search.'%');
            //                     $q->orWhere('mobile_no', 'like', '%'.$search.'%');
            //                     $q->orWhere('first_name', 'like', '%'.$search.'%');
            //                     $q->orWhere('last_name', 'like', '%'.$search.'%');
            //                 }
            //             )

            //             ->where('role_id', '!=' , 1)
            //             ->orWhereNull('role_id')
            //             ->orWhere('is_tester', 1)
            //             ->whereIn('email_verified', [0, 1])
            //             ->orderBy('id', 'DESC')
            //             ->paginate(10);

            // $users->appends(['q' => $search]);

            $users = User::with('countryAs', 'stateAs', 'mobilePrefix', 'subscriptions', 'individual.Users', 'company')
                ->where(function ($query) use ($search) {
                    $query->whereHas('subscriptions', function ($query) use ($search) {
                        // $query->where('draft', 1);
                        $query->whereIn('status', [0, 1, 2, 5]);
                    });

                    // ->orWhereHas('subscriptions', function ($query) use ($search) {
                    //     $query->where('draft', 1);
                    // });
                })
                ->where(function($q) use ($search) {
                        $q->where('email', 'like', '%'.$search.'%');
                        $q->orWhere('mobile_no', 'like', '%'.$search.'%');
                        $q->orWhere('first_name', 'like', '%'.$search.'%');
                        $q->orWhere('last_name', 'like', '%'.$search.'%');
                    }
                )
                ->orDoesntHave('subscriptions')
                ->where('role_id', '!=' , 1)
                ->orWhereNull('role_id')
                ->orWhere('is_tester', 1)
                ->whereIn('email_verified', [0, 1])
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $users->appends(['q' => $search]);

        } else {

            // $users = User::doesntHave('subscriptions')
            //             ->where('role_id', '!=' , 1)
            //             ->orWhereNull('role_id')
            //             ->orWhere('is_tester', 1)
            //             ->whereIn('email_verified', [0, 1])
            //             ->orderBy('id', 'DESC')
            //             ->paginate(10);


            $users = User::with('countryAs', 'stateAs', 'mobilePrefix', 'subscriptions', 'individual.Users', 'company')
                ->where(function ($query) use ($search) {
                    $query->whereHas('subscriptions', function ($query) use ($search) {
                        // $query->where('draft', 1);
                        $query->whereIn('status', [0, 1, 2, 5]);
                    });

                    // ->orWhereHas('subscriptions', function ($query) use ($search) {
                    //     $query->where('draft', 1);
                    // });
                })
                ->orDoesntHave('subscriptions')
                ->where('role_id', '!=' , 1)
                ->orWhereNull('role_id')
                ->orWhere('is_tester', 1)
                ->whereIn('email_verified', [0, 1])
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.investor.inActive', compact('users'));
    }

    public function agentActive(Request $request)
    {
        $cond = [];
        $cond['active'] = 1;
        $cond['status'] = 1;
        $cond['is_agent'] = 1;

        $search =  $request->input('q');
        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->where('email', 'like', '%'.$search.'%')
                    ->orWhere('mobile_no', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%');
            })
            ->where($cond)
            // ->where('role_id', '!=', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
            $users->appends(['q' => $search]);
        }else{
            $users = User::with('countryAs', 'stateAs', 'mobilePrefix', 'subscriptions', 'individual', 'company')
                                ->where($cond)
                                // ->where('role_id', '!=', 1)
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        }

        return view('admin.investor.agentActive', compact('users'));
    }

    public function agentInactive(Request $request)
    {
        $cond = [];
        $cond['active'] = 0;
        $cond['status'] = 0;
        $cond['is_agent'] = 1;

        $search =  $request->input('q');
        if($search!=""){
            $users = User::where(function ($query) use ($search){
                $query->where('email', 'like', '%'.$search.'%')
                    ->orWhere('mobile_no', 'like', '%'.$search.'%')
                    ->orWhere('first_name', 'like', '%'.$search.'%')
                    ->orWhere('last_name', 'like', '%'.$search.'%');
            })
            ->where($cond)
            // ->where('role_id', '!=', 1)
            ->orderBy('id', 'DESC')
            ->paginate(10);
            $users->appends(['q' => $search]);
        }else{
            $users = User::with('countryAs', 'stateAs', 'mobilePrefix', 'subscriptions', 'individual', 'company')
                                ->where($cond)
                                // ->where('role_id', '!=', 1)
                                ->orderBy('id', 'DESC')
                                ->paginate(10);
        }

        return view('admin.investor.agentInctive', compact('users'));
    }

    public function activeAgent(Request $request)
    {
        $user_id = $request->get('userId');

        $user = User::findOrFail($user_id);
        // $user->is_agent = 1;
        $user->active = 1;
        $user->status = 1;
        $user->save();

        return \Redirect::back()->with('success', 'Successfully Changed status.');
    }

    public function deactiveAgent(Request $request)
    {
        $user_id = $request->get('userId');

        $user = User::findOrFail($user_id);
        // $user->is_agent = 0;
        $user->active = 0;
        $user->status = 0;
        $user->save();

        return \Redirect::back()->with('success', 'Successfully Changed status.');
    }

    public function viewInvestor($id)
    {
        $user = User::with('countryAs', 'stateAs', 'mobilePrefix', 'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($id);

        $check_subscription = Subscription::where('user_id', $id)->first();
        $subscriptions = Subscription::where(['user_id' => $id, 'draft_delete' => 0])->get();

        return view('admin.investor.show', compact('user', 'check_subscription', 'subscriptions'));
    }

    public function editInvestor(Request $request, $id)
    {

        $user = User::with('countryAs', 'stateAs', 'mobilePrefix', 'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($id);

        // return $user;

        $countries = Country::orderBy('name','asc')->pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
            }
        }
        
        $phone_prefix = array_reverse($phone_prefix,true);

        if(request()->isMethod('post')){

            $user = User::findOrFail($id);
            $role_id = $user->role_id;
        
            if ($role_id == 2) {

                $requestData['is_tester'] = $request->is_tester;
                $requestData['role_id'] = $request->role_id;
                $requestData['salutation'] = $request->salutation;
                $requestData['first_name'] = $request->first_name;
                $requestData['gender'] = $request->gender;
                $requestData['bday'] = $request->dob;
                $requestData['address_line1'] = $request->address_line1;
                $requestData['address_line2'] = $request->address_line2;
                $requestData['country'] = $request->country;
                $requestData['state'] = $request->state;
                $requestData['city'] = $request->city;
                $requestData['post_code'] = $request->postcode;
                $requestData['mobile_prefix'] = $request->mobile_prefix;
                $requestData['mobile_no'] = $request->mobile_no;
                $requestData['agent_email'] = $request->agent_email;
                $requestData['ip_address'] = \Request::getClientIp(true);

                if(!empty($request->password)) {
                    $requestData['password'] = Hash::make($request->password);
                }
                
                if($request->active) {
                    $requestData['active'] = 1;
                    $requestData['status'] = 1;
                } else {
                    $requestData['active'] = 0;
                    $requestData['status'] = 0;
                }
                
                $user->update($requestData);

                $source_wealth = implode(", ",$request->source_wealth); 
                $individual_user = $user->individual()->update([
                    'salutation' => $request->salutation,
                    'name' => $request->first_name,
                    'gender' => $request->gender,
                    'dob' => $request->dob,
                    'country_residence' => $request->country_residence,
                    'nationality' => $request->nationality,
                    'passport' => $request->passport,
                    'occupation' => $request->occupation,
                    'employer_name' => $request->employer_name,
                    'annual_income' => $request->annual_income,
                    'source_wealth' => $source_wealth,
                    'source_wealth_other' => $request->source_wealth_other,
                ]);

                // $requestData['status'] = 1;
                // $requestData['2fa_status'] = 0,;
                // $requestData['2fa_key'] = null;
                // $requestData['email_verified_at'] = Carbon::now()->format('Y-m-d');
                // $requestData['email_verified'] = 1;

            } else {

                $requestData['is_tester'] = $request->is_tester;
                $requestData['role_id'] = $request->role_id;
                $requestData['salutation'] = $request->salutation;
                $requestData['last_name'] = $request->last_name;
                $requestData['gender'] = $request->gender;
                $requestData['bday'] = $request->dob;
                $requestData['address_line1'] = $request->address_line1;
                $requestData['address_line2'] = $request->address_line2;
                $requestData['country'] = $request->country;
                $requestData['state'] = $request->state;
                $requestData['city'] = $request->city;
                $requestData['post_code'] = $request->postcode;
                $requestData['mobile_prefix'] = $request->mobile_prefix;
                $requestData['mobile_no'] = $request->mobile_no;
                $requestData['agent_email'] = $request->agent_email;
                $requestData['ip_address'] = \Request::getClientIp(true);

                if(!empty($request->password)) {
                    $requestData['password'] = Hash::make($request->password);
                }
                
                if($request->active) {
                    $requestData['active'] = 1;
                    $requestData['status'] = 1;
                } else {
                    $requestData['active'] = 0;
                    $requestData['status'] = 0;
                }
                
                $user->update($requestData);

                $company_user = $user->company()->update([
                    'user_id' => $user->id,
                    'name' => $request->last_name,
                    'company_reg_no' => $request->company_reg_no,
                    'country_corporate' => $request->company_country_corporate,
                    'date_corporation' => $request->date_corporation,
                    'business_activity' => $request->business_activity,
                    'type_company' => $request->type_company,
                    'other_type_desc' => $request->company_others_sub,
                ]);
            }

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
            $actionLog['action'] = $auth_user->first_name. " updated " . $user->first_name.$user->last_name." his profile information.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);
            //end user action logs
            
            return redirect('/investor/active')->with('success','The investor details has been saved!');
        }

        return view('admin.investor.edit', ['user' => $user, 'countries' => $countries, 'phone_prefix' => $phone_prefix]);
    }

    public function userActivity(Request $request) 
    {
        $users = User::with('userActivity')->get();
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $userActivityStatus = $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            }
        }
    }
}

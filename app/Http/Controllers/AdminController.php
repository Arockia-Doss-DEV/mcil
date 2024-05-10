<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\McilFund;
use App\Models\Subscription;
use DB;
use App\Models\User;
use App\Models\Individual;
use Auth;
use Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\Auditlog;
use App\Models\Notification;
use Faker\Factory as Faker;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }
    
    public function dashboard() 
    {

        //generate fake email to all users

        // $faker = Faker::create();
        $users = User::all();

        // foreach ($users as $key => $user) {
        //     $usr = User::findOrFail($user->id);

        //     $fakerEmail = $faker->unique()->safeEmail;

        //     $usr->email = $fakerEmail;
        //     $usr->peremail = $fakerEmail;
        //     $usr->mobile_no = $faker->phoneNumber;
        
        //     $usr->save();
        // }
        
        // exit();

        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        $fund = 0;
        if($getGlobalFund == "All"){

            $fund = 0;
        }else{

            $fundCond = [
                ['fund_type', '=', $getGlobalFund]
            ];

            $fund = $getGlobalFund;
        }

        $cond = [];
        if ($getGlobalFund == "All") {

            $investment_amount = Subscription::with(['User'])
                    ->whereHas('User', function($q) {
                        $q->where('role_id', '!=', 1);
                        $q->where('is_tester', '!=', 1);
                    })
                    ->where('status', 3)
                    ->where('reinvestment_status', 0)
                    ->where('draft', 0)
                    ->where('draft_delete', 0)
                    ->sum('initial_investment');

        } else {

            $investment_amount = Subscription::with(['User'])
                    ->whereHas('User', function($q) {
                        $q->where('role_id', '!=', 1);
                        $q->where('is_tester', '!=', 1);
                    })
                    ->where('status', 3)
                    ->where('reinvestment_status', 0)
                    ->where('draft', 0)
                    ->where('draft_delete', 0)
                    ->where('fund_type', $getGlobalFund)
                    ->sum('initial_investment');
        }

        $total_investment_amount = $investment_amount;

        /*=============YYYY==============*/

        if ($getGlobalFund == "All") {

            $total_dividend = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->get();

        } else {

            $total_dividend = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_dividends_count = 0;
        foreach($total_dividend as $subscription_pay){
            if(!empty($subscription_pay->payments)){
                foreach($subscription_pay->payments as $payment){
            
                    if(!empty($payment->payout_date)){
                            $currentDate = date('Y-m-d');
                            $startDate = date('Y-m-d', strtotime($payment->payout_date));
                        if($currentDate > $startDate){
                            $total_dividends_count += $payment->amount;
                        }
            
                    }
                }
            }
        }

        $total_earning = $total_investment_amount - $total_dividends_count;


        if ($getGlobalFund == "All") {

            $active_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $active_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }
        
        $total_active_count = $active_query->count();

        /*==============YYYY=============*/

        if ($getGlobalFund == "All") {

            $pending_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $pending_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_pending_count = $pending_query->count();  

        /*=============YYYY==============*/

        if ($getGlobalFund == "All") {

            $pendingF_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 1)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $pendingF_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 1)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_pendingFunding_count = $pendingF_query->count();  

        /*===============YYYY============*/

        if ($getGlobalFund == "All") {

            $investment_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('is_first', 1)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $investment_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('is_first', 1)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_investment_count = $investment_query->count();

        /*=============YYYY==============*/

        if ($getGlobalFund == "All") {

            $add_investment_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('is_first', 0)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $add_investment_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('is_first', 0)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_add_investment_count = $add_investment_query->count(); 

        ///*******************///

        if ($getGlobalFund == "All") {

            $reduption_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('draft', 0)
                        ->where('redemption_request', 1)
                        ->where('redemption_status', 0)
                        // ->where('redemption_status', 1)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $reduption_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('draft', 0)
                        ->where('redemption_request', 1)
                        ->where('redemption_status', 0)
                        // ->where('redemption_status', 1)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_reduption_count = $reduption_query->count();

        /*=============YYYY==============*/

        if ($getGlobalFund == "All") {

            $joint_account_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('is_joint_applicant', 1)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->get();

        } else {

            $joint_account_query = Subscription::with(['User'])
                        ->whereHas('User', function($q) {
                            $q->where('role_id', '!=', 1);
                            $q->where('is_tester', '!=', 1);
                        })
                        ->where('status', 3)
                        ->where('is_joint_applicant', 1)
                        ->where('reinvestment_status', 0)
                        ->where('draft', 0)
                        ->where('draft_delete', 0)
                        ->where('fund_type', $getGlobalFund)
                        ->get();
        }

        $total_joint_account_count = $joint_account_query->count(); 

        /*=============YYYYY==============*/

        if ($getGlobalFund == "All") {

            $month_wise_investment =Subscription::with('User')
                                    ->WhereHas('User', function($query) {
                                        $query->where('role_id', '!=', 1);
                                        $query->where('is_tester', '!=', 1);
                                    })
                                    ->select(
                                        DB::raw("(sum(initial_investment)) as amount"),
                                        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month")
                                    )
                                    ->where(['status'=>3])
                                    ->where(['is_first'=>1])
                                    ->where(['reinvestment_status'=>0])
                                    ->where(['draft'=>0])
                                    ->where(['draft_delete'=>0])
                                    ->groupBy('month')
                                    ->latest()->take(12)->get();

        } else {

            $month_wise_investment =Subscription::with('User')
                                    ->WhereHas('User', function($query) {
                                        $query->where('role_id', '!=', 1);
                                        $query->where('is_tester', '!=', 1);
                                    })
                                    ->select(
                                        DB::raw("(sum(initial_investment)) as amount"),
                                        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month")
                                    )
                                    ->where(['status'=>3])
                                    ->where(['is_first'=>1])
                                    ->where(['reinvestment_status'=>0])
                                    ->where(['draft'=>0])
                                    ->where(['draft_delete'=>0])
                                    ->where(['fund_type'=>$getGlobalFund])
                                    ->groupBy('month')
                                    ->latest()->take(12)->get();
        }

        $investment_amount_rows=[];
        $investment_month_rows2=[]; 
        $investment_month_rows = []; 

        foreach ($month_wise_investment as $key => $value) {

            $investment_amount_rows[]=$value['amount'];
            $investment_month_rows2[]= $value['month'];
        }

        usort($investment_month_rows2 , function($a, $b){
                $a = strtotime($a);
                $b = strtotime($b);
                return $a - $b;
            });

        foreach ($investment_month_rows2 as $key => $value) {
            $monthName = strtotime($value);
            $monthName2 = date("M", $monthName);
            $investment_month_rows[]= $monthName2;
        }

        /*=============YYYYY==============*/

        if ($getGlobalFund == "All") {

            $month_wise_add_investment =Subscription::with('User')
                                    ->WhereHas('User', function($query) {
                                        $query->where('role_id', '!=', 1);
                                        $query->where('is_tester', '!=', 1);
                                    })
                                    ->select(
                                        DB::raw("(sum(initial_investment)) as amount"),
                                        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month")
                                    )
                                    ->where(['status'=>3])
                                    ->where(['is_first'=>0])
                                    ->where(['reinvestment_status'=>0])
                                    ->where(['draft'=>0])
                                    ->where(['draft_delete'=>0])
                                    ->groupBy('month')
                                    ->latest()->take(12)->get();

        } else {

            $month_wise_add_investment =Subscription::with('User')
                                    ->WhereHas('User', function($query) {
                                        $query->where('role_id', '!=', 1);
                                        $query->where('is_tester', '!=', 1);
                                    })
                                    ->select(
                                        DB::raw("(sum(initial_investment)) as amount"),
                                        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month")
                                    )
                                    ->where(['status'=>3])
                                    ->where(['is_first'=>0])
                                    ->where(['reinvestment_status'=>0])
                                    ->where(['draft'=>0])
                                    ->where(['draft_delete'=>0])
                                    ->where(['fund_type'=>$getGlobalFund])
                                    ->groupBy('month')
                                    ->latest()->take(12)->get();
        }

        $addinvestment_amount_rows=[];
        $addinvestment_month_rows=[];  
        $addinvestment_month_rows2=[];

        foreach ($month_wise_add_investment as $key => $value) {
            $addinvestment_amount_rows[]=$value['amount'];
            $addinvestment_month_rows2[]= $value['month'];
        }

        usort( $addinvestment_month_rows2 , function($a, $b){
                $a = strtotime($a);
                $b = strtotime($b);
                return $a - $b;
            });

        foreach ($addinvestment_month_rows2 as $key => $value) {
            $monthName = strtotime($value);
            $monthName2 = date("M", $monthName);
            $addinvestment_month_rows[]= $monthName2;
        }

        /*==============YYYY=============*/

        if ($getGlobalFund == "All") {

            $month_wise_new_investment =Subscription::with('User')
                                    ->WhereHas('User', function($query) {
                                        $query->where('role_id', '!=', 1);
                                        $query->where('is_tester', '!=', 1);
                                    })
                                    ->select(
                                        DB::raw("(count(id)) as count"),
                                        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month")
                                    )
                                    ->where(['status'=>3])
                                    ->where(['reinvestment_status'=>0])
                                    ->where(['draft'=>0])
                                    ->where(['draft_delete'=>0])
                                    ->groupBy('month')
                                    ->latest()->take(12)->get();

        } else {

            $month_wise_new_investment =Subscription::with('User')
                                    ->WhereHas('User', function($query) {
                                        $query->where('role_id', '!=', 1);
                                        $query->where('is_tester', '!=', 1);
                                    })
                                    ->select(
                                        DB::raw("(count(id)) as count"),
                                        DB::raw("(DATE_FORMAT(created_at, '%M %Y')) as month")
                                    )
                                    ->where(['status'=>3])
                                    ->where(['reinvestment_status'=>0])
                                    ->where(['draft'=>0])
                                    ->where(['draft_delete'=>0])
                                    ->where(['fund_type'=>$getGlobalFund])
                                    ->groupBy('month')
                                    ->latest()->take(12)->get();
        }

        $month_wise_new_investment_rows2=[];
        $month_wise_new_investment_rows = [];

        foreach ($month_wise_new_investment as $key => $value) {
            $monthName = $value['month'];
        

            $month_wise_new_investment_rows2[] = array(
                    'a' => $value['count'],
                    'y' => $monthName
                );
        }

        usort($month_wise_new_investment_rows2 , function($a, $b){
            $a = strtotime($a['y']);
            $b = strtotime($b['y']);
            return $a - $b;
        });

        foreach ($month_wise_new_investment_rows2 as $key => $value) {
            $monthName = strtotime($value['y']);
            $monthName2 = date("M", $monthName);
            $month_wise_new_investment_rows[]= array(
                    'a' => $value['a'],
                    'y' => $monthName2
                );
        }

        /*===========================*/

        $source_wealth_rows = Individual::pluck('source_wealth')->toArray();

        $source_wealth = implode(', ', $source_wealth_rows);
        $source_wealth = explode(', ', $source_wealth);

        $personal = 0;
        $business = 0;
        $dividends = 0;
        $transactions = 0;
        $other = 0;

        for ($i=0, $len=count($source_wealth); $i<$len; $i++) {
            //echo "$source_wealth[$i] \n";
            switch ($source_wealth[$i]) {
                case 'Personal Saving / Salary':
                    $personal +=1;
                    break;
                case 'Business Income':
                    $business +=1;
                    break;
                case 'Dividends from other entry':
                    $dividends +=1;
                    break;
                case 'Benefits of transactions due to me all of which are known to me':
                    $transactions +=1;
                    break;
                case 'Other':
                    $other +=1;
                    break;
                default:
                    # code.
                    break;
            }

        }
        
        // foreach ($source_wealth_rows as $key => $value) {
            
        //     if(!empty($value)){
        //         $arr = json_decode($value);
        //         foreach ($arr as $key => $value2) {
        //             switch ($value2) {
        //                 case 'Personal Saving / Salary':
        //                     $personal +=1;
        //                     break;
        //                 case 'Business Income':
        //                     $business +=1;
        //                     break;
        //                 case 'Dividends from other entry':
        //                     $dividends +=1;
        //                     break;
        //                 case 'Benefits of transactions due to me all of which are known to me':
        //                     $transactions +=1;
        //                     break;
        //                 case 'Other':
        //                     $other +=1;
        //                     break;
        //                 default:
        //                     # code.
        //                     break;
        //             }
        //         }    
        //     }
        // }

        $total_percent = $personal + $business + $dividends+ $transactions + $other;
        
        if($personal != 0){
            $personal_avg = $personal * 100 / $total_percent;
        }else{
            $personal_avg = 0;
        }
        
        if($business != 0){
            $business_avg = $business * 100 / $total_percent;
        }else{
            $business_avg = 0;
        }
        
        if($dividends != 0){
            $dividends_avg = $dividends * 100 / $total_percent;
        }else{
            $dividends_avg = 0;
        }
    
        if($transactions != 0){
            $transactions_avg = $transactions * 100 / $total_percent;
        }else{
            $transactions_avg = 0;
        }
        
        if($other != 0){
            $other_avg = $other * 100 / $total_percent;
        }else{
            $other_avg = 0;
        }

        $source_wealth_obj=[];
        $source_wealth_obj[] = array(
                    'value' => number_format($personal_avg, 2),
                    'label' => "Personal Saving / Salary"
                );
        $source_wealth_obj[] = array(
                    'value' => number_format($business_avg, 2),
                    'label' => "Business Income"
                );
        $source_wealth_obj[] = array(
                    'value' => number_format($dividends_avg, 2),
                    'label' => "Dividends from other entry"
                );
        $source_wealth_obj[] = array(
                    'value' => number_format($transactions_avg, 2),
                    'label' => "Transactions"
                );
        $source_wealth_obj[] = array(
                    'value' => number_format($other_avg, 2),
                    'label' => "Others"
                );

        if ($getGlobalFund == "All") {

            $stmt2 = DB::table('users')
                ->select('country.name','country.iso_code_2', DB::raw('SUM(subscriptions.initial_investment) As TotalInvestmentAmount'), DB::raw('COUNT(subscriptions.id) As TotalInvestment'))
                ->join('subscriptions','users.id','=','subscriptions.user_id')
                ->join('country','users.country','=','country.id')
                ->where(['users.is_tester' => 0, 'users.active' => 1, 'subscriptions.status' => 3])
                ->groupBy('users.country')
                ->orderBy('TotalInvestmentAmount', 'DESC')
                ->get();

        } else {

            $stmt2 = DB::table('users')
                ->select('country.name','country.iso_code_2', DB::raw('SUM(subscriptions.initial_investment) As TotalInvestmentAmount'), DB::raw('COUNT(subscriptions.id) As TotalInvestment'))
                ->join('subscriptions','users.id','=','subscriptions.user_id')
                ->join('country','users.country','=','country.id')
                ->where(['users.is_tester' => 0, 'users.active' => 1, 'subscriptions.status' => 3, 'subscriptions.fund_type' => $getGlobalFund])
                ->groupBy('users.country')
                ->orderBy('TotalInvestmentAmount', 'DESC')
                ->get();
        }

        $country_wise = $stmt2;

        $country_list = [];
        foreach ($country_wise as $key => $value) {
            $iso_code_2 = strtolower($value->iso_code_2);
            $country_list[$iso_code_2] = "#28a745";
            
        }

        //maturity contracts
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+2 months'));

        $maturity_exps = Subscription::where('status', 3)
                                        ->where('reinvestment_status', 0)
                                        ->where('redemption_status', 0)
                                        ->whereBetween('maturity_date', [$start_date, $end_date])
                                        ->get();

        $groupCond[] = [
            ['status', '=', 1],
            ['is_agent', '=', 0],
            ['active', '=', 1]
        ];

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

        $active_investor_count = User::with(['subscriptions'])

                    ->whereHas('subscriptions', function($qry) use($fundCond) {
                        $qry->where($fundCond);
                    })

                    ->whereHas('subscriptions', function($query) use($groupSubCond1, $groupSubCond2, $groupSubCond3) {
                        $query->where([$groupSubCond1]);
                        $query->orWhere([$groupSubCond2]);
                        $query->orWhere([$groupSubCond3]);
                    })
                ->where(
                        function($q) use ($groupCond) {
                            return $q->where([$groupCond]);
                        }
                    )
                ->where('role_id', '!=', 1)
                ->where('is_tester', '!=', 1)
                ->count();                     

        $getUserActivity = getUserActivity();

        $userActivities = User::with('userActivity')
                                ->where('active', 1)
                                ->where('status', 1)
                                ->get();
        // return $maturity_exps;


        return view('admin.dashboard', compact('total_investment_amount', 'total_dividends_count', 'total_earning', 'total_active_count', 'total_pending_count', 'total_pendingFunding_count','total_investment_count', 'total_add_investment_count','total_reduption_count', 'total_joint_account_count', 'investment_month_rows', 'investment_amount_rows', 'addinvestment_month_rows', 'addinvestment_amount_rows', 'month_wise_new_investment_rows', 'source_wealth_obj', 'country_wise', 'country_list', 'maturity_exps', 'active_investor_count', 'userActivities'));
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
            return redirect('/dashboard');
        }

        return view('admin.settings', compact('user', 'google2fa_secret', 'qr_image'));
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
        $actionLog['action'] = $user->first_name.$user->last_name." Admin Updated his Password.";
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function gauthEnable(Request $request)
    {   
        // $userId = Auth::user()->id;
        $userId = $request->get('userId'); 
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
            $actionLog['action'] = "Admin Disabled " .$userData->first_name.$userData->last_name." Messaging OTP and Enabled Two-Factor Authentication (2FA).";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['status' => 0, 'error'=>0, 'msg' => "Two-Factor Authentication (2FA) Is Enabled"], 201); 
        }
        return response()->json(['status' => 1, 'error'=>1, 'msg' => "Wrong code entered.Please try again.."], 200);
    }

    public function gauthDisable(Request $request)
    {
        $status = $request->get('status');
        $userId = $request->get('userId');  
        // $userId = Auth::user()->id;
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
            $actionLog['action'] = "Admin Disabled " .$userData->first_name.$userData->last_name." Two-Factor Authentication (2FA) and Enabled Messaging OTP.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['status' => 0, 'error'=>0, 'msg' => "Two-Factor Authentication (2FA) Is Disbled."], 201); 
        }
        
        return response()->json(['status' => 1, 'error'=>1, 'msg' => "Something Went Wrong.Please try again.."], 200);
    }

    public function notification(Request $request) {

        $unreadNotifications = Notification::where('receiver_user_id', 1)
                                ->where('mark_as_seen', 0)
                                ->orderBy('id', 'DESC')
                                ->paginate(10);

        $readNotifications = Notification::where('receiver_user_id', 1)
                                ->where('mark_as_seen', 1)
                                ->orderBy('id', 'DESC')
                                ->paginate(10);

        return view('admin.notification', compact('unreadNotifications', 'readNotifications'));
    }
}

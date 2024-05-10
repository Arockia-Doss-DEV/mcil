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
use Auth;
use PDF;
use Setting;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\Http;

class SubscriptionController extends Controller
{
    public function pending(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 0;
            // $cond['reinvestment_status'] = 0;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 0;
            // $cond['reinvestment_status'] = 0;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.pending', compact('subscriptions'));
    }

    public function pendingFunding(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 1;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 1;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.pendingFunding', compact('subscriptions'));
    }

    public function active(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 3;
            // $cond['reinvestment_status'] = 0;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 3;
            // $cond['reinvestment_status'] = 0;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.active', compact('subscriptions'));
    } 

    public function deActive(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 4;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 4;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.deActive', compact('subscriptions'));
    }

    public function rejected(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 5;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 5;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.rejected', compact('subscriptions'));
    }

    public function matured(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 6;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 6;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.matured', compact('subscriptions'));
    }

    public function draft(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['draft'] = 1;

        } else {

            $cond['draft'] = 1;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.draft', compact('subscriptions'));
    }

    public function preMaturedRedemption(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 7;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 7;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                    ->whereHas('User', function($query) use($q) {
                        $query->where('first_name', 'LIKE', "%{$q}%");
                        $query->orWhere('last_name', 'LIKE', "%{$q}%");
                        $query->orWhere('reference_no','LIKE', "%{$q}%");
                        $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                    })

                    ->whereHas('User', function($qry) use($groupCond) {
                        $qry->where($groupCond);
                    })
                    ->where($cond)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

            $subscriptions->appends(['q' => $q]);
        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
            ->whereHas('User', function($qry) use($groupCond) {
                $qry->where($groupCond);
            })
            ->where($cond)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        return view('admin.subscription.individual.preMaturedRedemption', compact('subscriptions'));
    }

    public function jointAccount(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 3;
            $cond['reinvestment_status'] = 0;
            $cond['is_joint_applicant'] = 1;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 3;
            $cond['reinvestment_status'] = 0;
            $cond['is_joint_applicant'] = 1;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.jointAccount', compact('subscriptions'));
    }

    public function initialInvestment(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond = [
                ['status', '=', 3],
                ['reinvestment_status', '=', 0],
                ['is_first', '=', 1],
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
            ];

        } else {

            $cond = [
                ['status', '=', 3],
                ['reinvestment_status', '=', 0],
                ['is_first', '=', 1],
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
                ['fund_type', '=', $getGlobalFund],
            ];
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                    ->whereHas('User', function($query) use($q) {
                        $query->where('first_name', 'LIKE', "%{$q}%");
                        $query->orWhere('last_name', 'LIKE', "%{$q}%");
                        $query->orWhere('reference_no','LIKE', "%{$q}%");
                        $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                    })

                    ->whereHas('User', function($qry) use($groupCond) {
                        $qry->where($groupCond);
                    })
                    ->where($cond)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

                $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
            ->whereHas('User', function($qry) use($groupCond) {
                $qry->where($groupCond);
            })
            ->where($cond)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        return view('admin.subscription.individual.active', compact('subscriptions'));
    }

    public function additionalInvestment(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond = [
                ['status', '=', 3],
                ['reinvestment_status', '=', 0],
                ['is_first', '=', 0],
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
            ];

        } else {

            $cond = [
                ['status', '=', 3],
                ['reinvestment_status', '=', 0],
                ['is_first', '=', 0],
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
                ['fund_type', '=', $getGlobalFund],
            ];
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                    ->whereHas('User', function($query) use($q) {
                        $query->where('first_name', 'LIKE', "%{$q}%");
                        $query->orWhere('last_name', 'LIKE', "%{$q}%");
                        $query->orWhere('reference_no','LIKE', "%{$q}%");
                        $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                    })

                    ->whereHas('User', function($qry) use($groupCond) {
                        $qry->where($groupCond);
                    })
                    ->where($cond)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

                $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
            ->whereHas('User', function($qry) use($groupCond) {
                $qry->where($groupCond);
            })
            ->where($cond)
            ->orderBy('id', 'DESC')
            ->paginate(10);
        }

        return view('admin.subscription.individual.active', compact('subscriptions'));
    }

    public function redemption(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 3;
            $cond['redemption_request'] = 1;
            $cond['redemption_status'] = 0;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 3;
            $cond['redemption_request'] = 1;
            $cond['redemption_status'] = 0;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.redemption', compact('subscriptions'));
    }

    public function reInvestment(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {

            $cond['status'] = 3;
            $cond['reinvestment_request'] = 1;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;

        } else {

            $cond['status'] = 3;
            $cond['reinvestment_request'] = 1;
            $cond['draft'] = 0;
            $cond['draft_delete'] = 0;
            $cond['fund_type'] = $getGlobalFund;
        }

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];

        $q =  $request->input('q');
        if($q!=""){

            $subscriptions = Subscription::with(['User'])
                ->whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'LIKE', "%{$q}%");
                    $query->orWhere('last_name', 'LIKE', "%{$q}%");
                    $query->orWhere('reference_no','LIKE', "%{$q}%");
                    $query->orWhere('refreance_id', 'LIKE', "%{$q}%");
                })

                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'McilFund', 'SubscriptionState', 'SubscriptionCountry', 'SsAttachments')
                ->whereHas('User', function($qry) use($groupCond) {
                    $qry->where($groupCond);
                })
                ->where($cond)
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }

        return view('admin.subscription.individual.reInvestment', compact('subscriptions'));
    }

    public function maturing(Request $request)
    {
        //maturity contracts
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+2 months'));

        $groupCond = [
            ['role_id', '!=', 1],
            ['is_tester', '!=', 1],
        ];
        
        $maturity_exps = Subscription::with(['User'])
                        ->whereHas('User', function($qry) use($groupCond) {
                            $qry->where($groupCond);
                        })
                        ->where('status', 3)
                        ->where('reinvestment_status', 0)
                        ->where('redemption_status', 0)
                        ->whereBetween('maturity_date', [$start_date, $end_date])
                        ->get();

        return view('admin.subscription.individual.maturing', compact('maturity_exps'));
    }

    public function subscriptionView(Request $request, $id)
    {
        $subscription = Subscription::with(['User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'SsAttachments', 'Individual.IndiResidence', 'Individual.IndiNationality', 'Company.CompanyCountryCorporate', 'Payments', 'McilFund', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionJaCountry', 'SubscriptionJaState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionJaNationality' ,'SubscriptionJaMobilePrefix', 'SubscriptionJaResidence', 'SubscriptionB1PhonePrefix', 'SubscriptionB1Country', 'SubscriptionB1State', 'SubscriptionB1Nationality', 'SubscriptionB1Residence', 'SubscriptionB2Country', 'SubscriptionB2State', 'SubscriptionB2PhonePrefix', 'SubscriptionB2Nationality', 'SubscriptionB2Residence', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country', 'SubscriptionJaTrCountry', 'SubscriptionJaTrState', 'SubscriptionJaTd1Country', 'SubscriptionJaTd2Country', 'SubscriptionJaTd3Country', 'SubscriptionBankAcUpdatedBy', 'SubscriptionB1UpdatedBy', 'SubscriptionB2UpdatedBy'])->findOrFail($id);

        // return $subscription;
        $subscription->SsAttachments()->update(['notification'=> 0]);
        Subscription::where('id', $id)->update(['notification_invest'=> 0]);

        // clear notifications
        $uri = $request->path();
        getNotifications($uri);

        $child_investment_no = "";
        if($subscription->reinvestment_status == 1){
            if(($subscription->reinvestment_child_id != 0) && ($subscription->reinvestment_child_id != null)){ 

                $subscription2 = Subscription::where('id', $subscription->reinvestment_child_id)->first();

                if(!empty($subscription2['draft_refrence_id'])){

                    if (($subscription2['status'] == 3) || ($subscription2['status'] == 6)) {
                        $child_investment_no = $subscription2['reference_no'].$subscription2['refreance_id'];
                    } else {
                        $child_investment_no = $subscription2['draft_refrence_id']."-".$subscription2['reference_no'].$subscription2['refreance_id'];
                    }

                } else {
                    $child_investment_no = $subscription2['reference_no'].$subscription2['refreance_id'];
                }
            }
        }

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiResidence','individual.IndiNationality','company.CompanyCountryCorporate')->findOrFail($subscription->user_id);

        $countries = Country::pluck('name', 'id');
        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);
        $fund_types = McilFund::where('active', 1)->pluck('name', 'id');

        // return $subscription;

        if($user->role_id == 2){
            return view('admin.subscription.individual.subscriptionView', compact('subscription', 'user', 'countries', 'phone_prefix', 'fund_types', 'child_investment_no'));
        }else{
            return view('admin.subscription.company.subscriptionView', compact('subscription', 'user', 'countries', 'phone_prefix', 'fund_types', 'child_investment_no'));
        }
    }

    public function initialSubscriptionEditDraft(Request $request)
    {
        $userId = $request->get('user_id');
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

            if(!empty($request->input('ja_source_wealth'))) {
                $requestData['ja_source_wealth'] = implode(", ",$request->input('ja_source_wealth'));
            }

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

    public function changeStatus(Request $request)
    {
        // return $request->all();

        $subscription_id = $request->get('id');
        $subscription = Subscription::with('User', 'SubscriptionState', 'SubscriptionCountry')->findOrFail($subscription_id);

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

        if(request()->isMethod('post')){

            $actionLog = [];
            $user_id = $subscription->user_id;
            $user = User::findOrFail($user_id);

            $old_address = $subscription->old_address;

            if ($request->get('send_mail') == 'send') {
               
               //$userDataArr = array('subscription' => $subscription, 'user' => $user, 'old_address' => $subscription->old_address);

                // Make PDF
                if ($user->role_id == 2) {
                    $link_base = "/individual/documentBankIndex";
                    if($subscription->fund_type == 2){

                        $pdf = \PDF::loadView('pdf.mcil2.bankInstruction', compact('subscription', 'user', 'old_address'));
                    }else if($subscription->fund_type == 3){

                        $pdf = \PDF::loadView('pdf.mcil3.bankInstruction', compact('subscription', 'user', 'old_address'));
                    } else {

                        $pdf = \PDF::loadView('pdf.bankInstruction', compact('subscription', 'user', 'old_address'));
                    }

                } else {
                    $link_base = "/company/documentBankIndex";
                    if($subscription->fund_type == 2){

                        $pdf = \PDF::loadView('pdf.mcil2.company.bankInstruction', compact('subscription', 'user', 'old_address'));
                    } else if($subscription->fund_type == 3){

                        $pdf = \PDF::loadView('pdf.mcil3.company.bankInstruction', compact('subscription', 'user', 'old_address'));
                    } else{

                        $pdf = \PDF::loadView('pdf.company.bankInstruction', compact('subscription', 'user', 'old_address'));
                    }
                }

                $path = public_path('pdf/docs/bankInstruction');
                $fileName =  'bank_instruction'.$user_id.'.'. 'pdf' ;

                if (File::exists(public_path('pdf/docs/bankInstruction/'.$fileName))) {
                    File::delete(public_path('pdf/docs/bankInstruction/'.$fileName));
                }

                $pdf->save($path . '/' . $fileName);
                $attach = public_path('pdf/docs/bankInstruction/'.$fileName);

                if(!empty($attach)){
                    $attachment = $attach;
                    
                }else{
                    $attachment = "";
                }

                //Send Mail
                // if($request->get('form_status') == 1){
                //     if(!empty($fileName)){
                //        sendApprovalMail($user);
                //     }
                // }

                $subscriptionData = Subscription::findOrFail($subscription->id);
                $subscriptionData->notification_doc = 1;
                $subscriptionData->notification_doc_hidden = 0;
                $subscriptionData->save();

                //Notification Save
                if ($user->id) {
                    $noti_sender_user_id = 1;
                    $noti_receiver_user_id = $user->id;
                    $noti_link = $link_base;
                    $noti_message = "Please upload the Bank Slip to confirm the investment";

                    $notification = new User;
                    $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                }

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Please upload the Bank Slip to confirm the investment";
            }

            //0=>Pending 
            if($request->get('form_status') == 0){
                $user = User::findOrFail($user->id);
                
                if($subscription->is_first ==1){
                    $user->active = 1;
                    $user->status = 0;
                }
                $user->save();

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Status as Pending";
            }

            //1=>Pending Funding
            if($request->get('form_status') == 1){

                //sent Pending Funding
                if ($request->get('mail_confirm') == 'true') {

                    if(!empty($fileName)){
                        sendPendingFunding($user, $attachment);
                    }
                }
                
                $user = User::findOrFail($user->id);
        
                if($subscription->is_first ==1){
                    $user->active = 1;
                    $user->status = 0;
                }
                $user->save();

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Status as Pending Funding";
            }

            //2=>Incomplete
            if($request->get('form_status') == 2){
                $user = User::findOrFail($user->id);
                
                if($subscription->is_first ==1){
                    $user->active = 1;
                    $user->status = 0;
                }
                $user->save();

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Status as Incomplete";
            }

            //4=>Deactive
            if($request->get('form_status') == 4){

                //Send Mail
                sendDeActive($user);

                $user = User::findOrFail($user->id);
                
                if($subscription->is_first ==1){
                    $user->active = 0;
                    $user->status = 0;
                }
                $user->save();

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Status as Deactive";
            }

            //5=>Rejected
            if($request->get('form_status') == 5){
                //Send Mail
                sendReject($user);

                $user = User::findOrFail($user->id);
                
                if($subscription->is_first ==1){
                    $user->active = 0;
                    $user->status = 0;
                }
                $user->save();

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Status as Rejected";
            }

            //6=>Closed
            if($request->get('form_status') == 6){
                
                $subscriptionData = Subscription::findOrFail($subscription->id);
                $subscriptionData->status = 6;
                $subscriptionData->save();

                //Send Mail
                sendAutoClosedNotice($user, $subscription);

                if($user->role_id == 2){
                    $link_base = "/individual/view/subscription/";
                }else{
                    $link_base = "/company/view/subscription/";
                }

                //Notification Save
                if($user->id){
                    $noti_sender_user_id = 1;
                    $noti_receiver_user_id = $user->id;
                    $noti_link = $link_base.$subscription->id;
                    $noti_message = "Your Contract: ".$investment_no." Was Expired.";
                    
                    $notification = new User;
                    $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                }

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." was Closed";
            }

            if($request->get('form_status') == 7){ 
                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Status as Prematured Redemption";
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 0; 
            $actionLog['model'] = "Subscriptions"; 
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            //3=>Active
            if($request->get('form_status') == 3){

                $subscriptionData = Subscription::findOrFail($subscription->id);

                if(!empty($subscription->commence_date)){
                    $sno_change= false;

                    if(empty($subscription->refreance_id)){
                        $get_serial_sc = new Subscription();
                        $get_serial_sc = $get_serial_sc->get_serial_sc();
                        $subscriptionData['refreance_id']=$get_serial_sc;
                        $sno_change = true;
                    }

                    $subscriptionData['notification_doc']=0;
                    // $subscriptionData['service_charge']=Setting::get('service_charge');
                    // $subscriptionData['bank_charge']=Setting::get('bank_charge');
                    $subscriptionData['status'] = $request->get('form_status');
                    $updated = $subscriptionData->save();

                    if ($updated) {

                        if($sno_change){
                            $serial_sc = new Subscription();
                            $serial_sc = $serial_sc->serial_sc();
                        }

                        $user_id = $subscriptionData->user_id;
                        $user = User::findOrFail($user_id);
                        $userAgent = User::GetUserByEmail($user->agent_email)->first();

                        if($subscriptionData->is_first ==1){
                            $user->status = 1;
                            $user->agent_id = $userAgent['id'];
                            $user->active = 1;
                            //$user->is_agent = 1;
                            $user->save();
                        }

                        /////////////////////////////////////////

                        $subscriptionMail = Subscription::with('User', 'SubscriptionState', 'SubscriptionCountry', 'McilFund')->findOrFail($subscription_id);
                        $user_id = $subscriptionMail->user_id;
                        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

                        $currency_word = $this->convert_number_to_words($subscriptionMail->initial_investment);

                        $quarters = $this->get_quarters2(Carbon::parse($subscriptionMail->commence_date)->format('Y-m-d'), Carbon::parse($subscriptionMail->maturity_date)->format('Y-m-d'));

                        $emailUserData = array('subscription' => $subscriptionMail, 'user' => $user, 'old_address' => $subscriptionMail->old_address, 'currency_word' => $currency_word, 'quarters' => $quarters);

                        //Make PDF
                        if($user->role_id == 2){

                            if($subscriptionData->fund_type == 2){

                                $pdf = \PDF::loadView('pdf.mcil2.activePfia', $emailUserData);
                            }else if($subscriptionData->fund_type == 3){
                                
                                $pdf = \PDF::loadView('pdf.mcil3.activePfia', $emailUserData);
                            } else {

                                $pdf = \PDF::loadView('pdf.activePfia', $emailUserData);
                            }

                        }else{ 
                            
                            if($subscriptionData->fund_type == 2){

                                $pdf = \PDF::loadView('pdf.mcil2.company.activePfia', $emailUserData);
                            }else if($subscriptionData->fund_type == 3){

                                $pdf = \PDF::loadView('pdf.mcil3.company.activePfia', $emailUserData);
                            } else {

                                $pdf = \PDF::loadView('pdf.company.activePfia', $emailUserData);
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

                        if(!empty($fileName)){
                            
                            //Send Email
                            if ($request->get('mail_confirm') == 'true') {
                                sendActive($user, $attachment);
                            }
                        }
                        ///////////////////////////////////

                        //////////Save Signed PDF///////////
                        $generate_signed_pdf = $this->signedApplicationSave($subscriptionData->id);
                        if(!empty($generate_signed_pdf)){
                            $subscriptionPdf = Subscription::findOrFail($subscriptionData->id);
                            $subscriptionPdf->signed_pdf = $generate_signed_pdf;
                            $subscriptionPdf->save();
                        }

                        if($user->role_id == 2){
                            $link_base = "/individual/view/subscription/";
                        }else{
                            $link_base = "/company/view/subscription/";
                        }

                        //Notification Save
                        if($user->id){
                            $noti_sender_user_id = 1;
                            $noti_receiver_user_id = $user->id;
                            $noti_link = $link_base.$subscriptionData->id;
                            $noti_message = $investment_no." - Your Investment Activated Successfully";
                            
                            $notification = new User;
                            $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                        }

                        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name. " Investment: " .$investment_no. " Activated";

                        $auditlog = Auditlog::create($actionLog);

                        //AMS API for update investor's investment
                        $response = Http::post('http://178.128.52.63/calcrm/api/update/investment', [
                            'email' => $user->email,
                            'investment_no' => $investment_no,
                            'commence_date' => $subscriptionMail->commence_date,
                            'initial_investment' => $subscription->initial_investment,
                            'fund_type' => $subscription->fund_type,
                            'bank_name' => $subscription->bank_name,
                            'is_first' => $subscription->is_first
                        ]);

                        return \Redirect::back()->with('success', 'Successfully Changed status and sent mail, Admin please verify the bank instruction letter and PFIA form');
                    }

                    return \Redirect::back()->with('error', 'The subscription change status could not be saved. Please, try again.');

                } else {

                    return \Redirect::back()->with('error', 'The commencement date not set. Please set first.');
                }

            } else {

                $subscriptionData = Subscription::findOrFail($subscription->id);
                $subscriptionData->status = $request->get('form_status');
                $subscriptionData->save();

                $auditlog = Auditlog::create($actionLog);

                if($request->get('form_status') == 1){
                    return \Redirect::back()->with('warning', 'Successfully changed status as pending funding, Admin please verify the signed application form, bank attachments and relevent document information');
                } else {
                    return \Redirect::back()->with('success', 'Successfully Changed status and sent mail');
                }

                // if ($subscriptionData) {
                //     return \Redirect::back()->with('success', 'Successfully Changed status and sent mail');
                // }

                return \Redirect::back()->with('error', 'The subscription change status could not be saved. Please, try again.');
            }
        }
    }

    public function individualInitialCreate(Request $request)
    {
        $user_id = $request->get('userId');

        $subscriptionData = Subscription::with('SsAttachments', 'McilFund')
                            ->where('user_id', $user_id)
                            ->first();

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality')
                    ->where('id', $user_id)
                    ->first();
                                        
        if(!empty($subscriptionData)){

            $subscription = $subscriptionData;
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

        $userData = ['edit' => $edit, 'countries'=> $countries, 'mobile_prefix'=> $mobile_prefix, 'phone_prefix'=> $phone_prefix, 'user'=> $user, 'subscription' => $subscription, 'fund_types' => $fund_types];

        return view('admin.subscription.individual.subscriptionInitialCreate', $userData);
    }

    public function individualInitialDraft (Request $request)
    {
        $userId = $request->get('user_id');
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
            // $requestData['fund_type_desc'] = "MCIL Fund";
            $requestData['draft'] = 1;

            if(!empty($request->input('ja_source_wealth'))) {
                $requestData['ja_source_wealth'] = implode(", ",$request->input('ja_source_wealth'));
            }

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

    public function individualInitialSave(Request $request)
    {
        $userId = $request->get('userId');
        $subscription_id = $request->get('subscription_id');

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality')
                    ->where('id', $userId)
                    ->first();

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

        $requestData = $request->all();
        $requestData['user_id'] = $userId;
        $requestData['draft'] = 0;
        $requestData['is_first'] = 1;
        $requestData['notification_invest'] = 1;

        if(!empty($request->input('ja_source_wealth'))) {
            $requestData['ja_source_wealth'] = implode(", ",$request->input('ja_source_wealth'));
        }

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

        $commence_date2 = $request->get('commence_date');
        if(!empty($commence_date2)){
            $commence_date = strtotime($commence_date2);

            $maturity_date = strtotime('+2 year', $commence_date);
            $maturity_date = strtotime('-1 day', $maturity_date);
            $requestData['maturity_date'] = date('Y-m-d', $maturity_date);
        }

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
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no."Admin Initial Investment Created.";
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

        return \Redirect::to('/subscription/pending')->with('success', 'The Subscription save successfully.');
    }

    public function individualAdditionalCreate(Request $request)
    {
        $subscription_id = $request->get('subId'); 
        $userId = $request->get('userId');

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

            $fund_type_desc = $subscription->McilFund->name;
            $fund_type = $subscription->fund_type;

            $subscription_id = $subscription->id;
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

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality')
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

        return view('admin.subscription.individual.subscriptionAdditionalCreate', $userData);
    }

    public function individualAdditionalDraft(Request $request)
    {
        $userId = $request->get('user_id');
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

            if(@$subscription->status == 0){
                $requestData['draft'] = 1;
            }

            if(!empty($request->input('ja_source_wealth'))) {
                $requestData['ja_source_wealth'] = implode(", ",$request->input('ja_source_wealth'));
            }

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

    public function individualAdditionalSave(Request $request)
    {
        $subscription_id = $request->get('subscription_id'); 
        $userId = $request->get('userId');

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

        if(!empty($request->input('ja_source_wealth'))) {
            $requestData['ja_source_wealth'] = implode(", ",$request->input('ja_source_wealth'));
        }

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

        $commence_date2 = $request->get('commence_date');
        if(!empty($commence_date2)){
            $commence_date = strtotime($commence_date2);

            $maturity_date = strtotime('+2 year', $commence_date);
            $maturity_date = strtotime('-1 day', $maturity_date);
            $requestData['maturity_date'] = date('Y-m-d', $maturity_date);
        }

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
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Admin Additional Investment Created.";
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

        return \Redirect::to('/subscription/pending')->with('success', 'The Additional Subscription save successfully.');
    }

    public function companyInitialCreate(Request $request)
    {
        $user_id = $request->get('userId');
        $subscriptionData = Subscription::with('SsAttachments', 'McilFund')
                            ->where('user_id', $user_id)
                            ->first();

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality', 'company.CompanyCountryCorporate')
                    ->where('id', $user_id)
                    ->first();
                                        
        if(!empty($subscriptionData)){

            $subscription = $subscriptionData;
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

        $userData = ['edit' => $edit, 'countries'=> $countries, 'mobile_prefix'=> $mobile_prefix, 'phone_prefix'=> $phone_prefix, 'user'=> $user, 'subscription' => $subscription, 'fund_types' => $fund_types];

        return view('admin.subscription.company.subscriptionInitialCreate', $userData);
    }

    public function companyInitialDraft(Request $request)
    {
        $userId = $request->get('user_id');
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

    public function companyInitialSave(Request $request)
    {
        $subscription_id = $request->get('subscription_id'); 
        $userId = $request->get('userId');

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
        $requestData['is_first'] = 1;
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

        $commence_date2 = $request->get('commence_date');
        if(!empty($commence_date2)){
            $commence_date = strtotime($commence_date2);

            $maturity_date = strtotime('+2 year', $commence_date);
            $maturity_date = strtotime('-1 day', $maturity_date);
            $requestData['maturity_date'] = date('Y-m-d', $maturity_date);
        }

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
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no."Admin Company Initial Investment Created.";
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

        return \Redirect::to('/subscription/pending')->with('success', 'The Initial Subscription save successfully.');
    }

    public function companyAdditionalCreate(Request $request)
    {
        $subscription_id = $request->get('subId'); 
        $userId = $request->get('userId');

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

        return view('admin.subscription.company.subscriptionAdditionalCreate', $userData);
    }

    public function companyAdditionalDraft(Request $request)
    {
        $userId = $request->get('user_id');
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

    public function companyAdditionalSave(Request $request)
    {
        $subscription_id = $request->get('subscription_id'); 
        $userId = $request->get('userId');

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

        $commence_date2 = $request->get('commence_date');
        if(!empty($commence_date2)){
            $commence_date = strtotime($commence_date2);

            $maturity_date = strtotime('+2 year', $commence_date);
            $maturity_date = strtotime('-1 day', $maturity_date);
            $requestData['maturity_date'] = date('Y-m-d', $maturity_date);
        }

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
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Admin Company Additional Investment Created.";
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

        return \Redirect::to('/subscription/pending')->with('success', 'The Additional Subscription save successfully.');
    }

    public function individualSubscriptionEdit(Request $request)
    {
        $user_id = $request->get('userId');
        $subscription_id = $request->get('subId');

        $subscription = Subscription::with('SsAttachments', 'McilFund')
                            ->where('id', $subscription_id)
                            ->where('user_id', $user_id)
                            ->first();

        $subscription_id = $subscription->id;
        $fund_type_desc = $subscription->McilFund->name;
        $fund_type = $subscription->fund_type;
        $edit = true;

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality')
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

        if($subscription->is_first == 1){
            return view('admin.subscription.individual.subscriptionInitialEdit', $userData);
        }else{
            return view('admin.subscription.individual.additionalEdit', $userData);
            // return view('admin.subscription.individual.additionalWodocCreate', $userData);
        }
    }

    public function individualSubscriptionUpdate(Request $request)
    {
        $subscription_id = $request->get('subId'); 
        $userId = $request->get('userId');

        if (!empty($subscription_id)) {
            $subscription = Subscription::with('SsAttachments','McilFund')
                ->where('id', $subscription_id)
                ->where('user_id', $userId)
                ->first();
        } else {
            $subscription = [];
        }

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality')
                    ->where('id', $userId)
                    ->first();

        $flag = "edit";
        if(empty($subscription)){
            $flag = "add";
        }

        if(request()->isMethod('post')){

            $requestData = $request->all();

            if($subscription->status == 0){
                $requestData['draft'] = 0;
            }

            if(!empty($request->input('ja_source_wealth'))) {
                $requestData['ja_source_wealth'] = implode(", ",$request->input('ja_source_wealth'));
            }

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
            // $requestData['service_charge']=Setting::get('service_charge');
            // $requestData['bank_charge']=Setting::get('bank_charge');

            $commence_date2 = $request->get('commence_date');
            if(!empty($commence_date2)){
                $commence_date = strtotime($commence_date2);

                $maturity_date = strtotime('+2 year', $commence_date);
                $maturity_date = strtotime('-1 day', $maturity_date);
                $requestData['maturity_date'] = date('Y-m-d', $maturity_date);
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
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Admin Investment Updated.";
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

            if(!empty($subscription_id)){

                $subscription = Subscription::find($subscription_id);
                $subscription->update($requestData);
                //$updated = $subscription->SsAttachments()->update($requestData);

                return \Redirect::to('/subscription/pending')->with('success', 'The Subscriptions updated successfully.');
            }else{

                $subscription = Subscription::create($requestData);
                $this->update_draft_refreance_no($subscription->id);

                return \Redirect::to('/subscription/pending')->with('success', 'The Subscriptions save successfully.');  
            }

            return \Redirect::back()->with('error', 'The subscription could not be saved. Please, try again.');
        }

        return \Redirect::back()->with('error', 'The subscription could not be saved. Please, try again.');
    }

    public function companySubscriptionEdit(Request $request)
    {
        $user_id = $request->get('userId');
        $subscription_id = $request->get('subId');

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

        if($subscription->is_first == 1){
            return view('admin.subscription.company.subscriptionInitialEdit', $userData);
        }else{
            return view('admin.subscription.company.additionalEdit', $userData);
        }
    }

    public function companySubscriptionEditDraft(Request $request)
    {
        $userId = $request->get('user_id');
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
            // $requestData['service_charge']=Setting::get('service_charge');
            // $requestData['bank_charge']=Setting::get('bank_charge');

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

    public function companySubscriptionUpdate(Request $request)
    {
        $subscription_id = $request->get('subId'); 
        $userId = $request->get('userId');

        $subscription = Subscription::with('SsAttachments','McilFund')
                ->where('id', $subscription_id)
                ->where('user_id', $userId)
                ->first();

        $user = User::with('countryAs','stateAs','mobilePrefix','individual.IndiNationality', 'company.CompanyCountryCorporate')
                    ->where('id', $userId)
                    ->first();

        $requestData = $request->all();

        if($subscription->status == 0){
            $requestData['draft'] = 0;
        }

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
        // $requestData['service_charge']=Setting::get('service_charge');
        // $requestData['bank_charge']=Setting::get('bank_charge');

        $commence_date2 = $request->get('commence_date');
        if(!empty($commence_date2)){
            $commence_date = strtotime($commence_date2);

            $maturity_date = strtotime('+2 year', $commence_date);
            $maturity_date = strtotime('-1 day', $maturity_date);
            $requestData['maturity_date'] = date('Y-m-d', $maturity_date);
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
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Admin Investment Updated.";
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

        if(!empty($subscription_id)){

            $subscription = Subscription::find($subscription_id);
            $subscription->update($requestData);

            return \Redirect::to('/subscription/pending')->with('success', 'The Subscription updated successfully.');
        }else{

            $subscription = Subscription::create($requestData);
            $this->update_draft_refreance_no($subscription->id);

            return \Redirect::to('/subscription/pending')->with('success', 'The Subscription save successfully.');  
        }

        return \Redirect::back()->with('error', 'The subscription could not be saved. Please, try again.');
    }

    public function ajaxCiGet(Request $request)
    {
        $id = $request->get('id');

        $subscription = Subscription::with('User', 'McilFund')->findOrFail($id);
        $investmentData['username'] = $subscription->User->first_name . $subscription->User->last_name;
        $investmentData['fund_name'] = $subscription->McilFund->name;
        $investmentData['fund_type'] = $subscription->fund_type;
        $investmentData['is_joint_applicant'] = $subscription->is_joint_applicant;
        $investmentData['commence_date'] = $subscription->commence_date;
        $investmentData['subscription'] = $subscription;

        $investmentId = getInvestmentId($investmentData);

        // return $investmentId;

        $contact_information['subscription'] = $subscription;
        $contact_information['referenceId'] = !empty($subscription->reference_no) ? $subscription->reference_no : $investmentId;

        if($contact_information){
            return response()->json(['data' => $contact_information, 'error' => true, 'msg' => "The Subscriptions data retrieve successfully"], 200);
        }

        return response()->json(['data' => 'null', 'error' => false,'msg' => "The Subscriptions data could not be retrieve. Please, try again."], 200);
    }

    public function ajaxCiEditSave(Request $request)
    {
        $id = $request->get('id');
        $contact_information = Subscription::findOrFail($id);

        $commence_date2 = $request->get('commence_date');
        $pfia_date = $request->get('pfia_date');
        $bi_date = $request->get('bi_date');

        $commence_date = strtotime($commence_date2);

        $maturity_date = strtotime('+2 year', $commence_date);
        $maturity_date = strtotime('-1 day', $maturity_date);

        $requestData = $request->all();
        $requestData['maturity_date'] = date('Y-m-d', $maturity_date);

        if ($contact_information->update($requestData)) {
            return response()->json(['data' => $maturity_date, 'error' => true,'msg' => "The Subscriptions has been saved."], 200); 
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Subscriptions could not be saved. Please, try again."], 200);
    }

    public function sendBankSlipConfirm(Request $request)
    {
        $user_id = $request->get('userId');
        $subscription_id = $request->get('subId');

        $user = User::findOrFail($user_id);

        //Send Email
        sendBankSlipConfirm($user);

        $subscriptionData = Subscription::findOrFail($subscription_id);
        $subscriptionData->notification_doc = 0;
        $subscriptionData->save();

        if($subscriptionData->fund_type == 1){
            $msg_fund_type = "MCIL1";
        }else if($subscriptionData->fund_type == 2){
            $msg_fund_type = "MCIL2";
        }else if($subscriptionData->fund_type == 3){
            $msg_fund_type = "MCIL3";
        }else{
            $msg_fund_type = "";
        }
        
        if(($subscriptionData->status == 3) || ($subscriptionData->status == 6)){
            $investment_no = $subscriptionData['reference_no'].$subscriptionData['refreance_id'];
        }else{
            $investment_no = $subscriptionData['draft_refrence_id']."-".$subscriptionData['reference_no'].$subscriptionData['refreance_id'];
        }

        if($user->id){
              
            if($user->role_id == 2){
                $link_base = "/individual/view/subscription/";
            }else{
                $link_base = "/company/view/subscription/";
            }

            $noti_sender_user_id = 1;
            $noti_receiver_user_id = $user->id;
            $noti_link = $link_base.$subscriptionData->id;
            $noti_message = $user->first_name.$user->last_name." - ".$investment_no." Bank in slip accepted";
            
            $notification = new User;
            $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        }

        //user action logs
        $auth_user = Auth::user();
        $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = $subscriptionData->id;
        $actionLog['user_id'] = $user->id;
        $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = $subscriptionData->fund_type;
        $actionLog['is_doc_enable'] = 0; 
        $actionLog['model'] = "Subscriptions"; 
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Admin Bank Slip has Confirmed and Sent Mail.";
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        return \Redirect::back()->with('success', 'The bank slip confirmation mail sent.');

    }

    public function reGenerateSignedPdf($subscription_id)
    {
        $generate_signed_pdf = $this->signedApplicationSave($subscription_id);
        if(!empty($generate_signed_pdf)){
            $subscriptionPdf = Subscription::findOrFail($subscription_id);

            $subscriptionPdf->enable_signeddoc = 0;
            $subscriptionPdf->signeddoc_file = "";
            $subscriptionPdf->signed_pdf = $generate_signed_pdf;
            $subscriptionPdf->save();
        }

        return \Redirect::back()->with('success', 'Oh Great! Signed application generated successfully ...');
    }

    public function signedApplication($subscription_id)
    {
        $subscription = Subscription::with(['SsAttachments', 'Individual', 'User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'McilFund', 'Payments', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionJaCountry', 'SubscriptionJaState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionJaNationality' ,'SubscriptionJaMobilePrefix', 'SubscriptionB1PhonePrefix', 'SubscriptionB1Country', 'SubscriptionB1State', 'SubscriptionB1Nationality', 'SubscriptionB2Country', 'SubscriptionB2State', 'SubscriptionB2PhonePrefix', 'SubscriptionB2Nationality', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country', 'SubscriptionJaTrCountry', 'SubscriptionJaTrState', 'SubscriptionJaTd1Country', 'SubscriptionJaTd2Country', 'SubscriptionJaTd3Country'])->where('id',$subscription_id)->first();

        $user_id = $subscription->user_id;
        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);
        $userDataArr = array('subscription' => $subscription, 'user' => $user);

        //Stream View Signed PDF

        if($user->role_id == 2){
            if($subscription->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.signedApplication', $userDataArr);
                return $pdf->stream('signedApplication.pdf');
            }else if($subscription->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.signedApplication', $userDataArr);
                return $pdf->stream('signedApplication.pdf');
            } else {
                $pdf = \PDF::loadView('pdf.signedApplication', $userDataArr);
                return $pdf->stream('signedApplication.pdf');
            }
            
        }else{ 
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
    }

    public function bankInstruction($subscription_id)
    {
        $subscription = Subscription::with('User', 'SubscriptionState', 'SubscriptionCountry')->findOrFail($subscription_id);
        $user_id = $subscription->user_id;
        $user = User::findOrFail($user_id);
        $old_address = $subscription->old_address;

        $userDataArr = array('subscription' => $subscription, 'user' => $user, 'old_address' => $old_address);

        //Stream View PDF
        if ($user->role_id == 2) {
            if($subscription->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.bankInstruction', $userDataArr);
                return $pdf->stream('bankInstruction.pdf');
            }else if($subscription->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.bankInstruction', $userDataArr);
                return $pdf->stream('bankInstruction.pdf');
            } else {
                $pdf = \PDF::loadView('pdf.bankInstruction', $userDataArr);
                return $pdf->stream('bankInstruction.pdf');
            }
        } else {
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
    }

    public function pfia($subscription_id)
    {
        $subscriptionMail = Subscription::with('User', 'SubscriptionState', 'SubscriptionCountry', 'McilFund')->findOrFail($subscription_id);
        $user_id = $subscriptionMail->user_id;
        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        $currency_word = $this->convert_number_to_words($subscriptionMail->initial_investment);

        $quarters = $this->get_quarters2(Carbon::parse($subscriptionMail->commence_date)->format('Y-m-d'), Carbon::parse($subscriptionMail->maturity_date)->format('Y-m-d'));

        $emailUserData = array('subscription' => $subscriptionMail, 'user' => $user, 'old_address' => $subscriptionMail->old_address, 'currency_word' => $currency_word, 'quarters' => $quarters);

        //Stream View PDF
        if($user->role_id == 2){
            if($subscriptionMail->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.activePfia', $emailUserData);
                return $pdf->stream('activePfia.pdf');
            }else if($subscriptionMail->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.activePfia', $emailUserData);
                return $pdf->stream('activePfia.pdf');
            } else {
                $pdf = \PDF::loadView('pdf.activePfia', $emailUserData);
                return $pdf->stream('activePfia.pdf');
            }
        }else{ 
            if($subscriptionMail->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.company.activePfia', $emailUserData);
                return $pdf->stream('activePfia.pdf');
            }else if($subscriptionMail->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.company.activePfia', $emailUserData);
                return $pdf->stream('activePfia.pdf');
            } else {
                $pdf = \PDF::loadView('pdf.company.activePfia', $emailUserData);
                return $pdf->stream('activePfia.pdf');
            }
        }
    }

    private function signedApplicationSave($subscription_id){

        $subscription = Subscription::with(['SsAttachments', 'Individual', 'User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'McilFund', 'Payments', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionJaCountry', 'SubscriptionJaState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionJaNationality' ,'SubscriptionJaMobilePrefix', 'SubscriptionB1PhonePrefix', 'SubscriptionB1Country', 'SubscriptionB1State', 'SubscriptionB1Nationality', 'SubscriptionB2Country', 'SubscriptionB2State', 'SubscriptionB2PhonePrefix', 'SubscriptionB2Nationality', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country', 'SubscriptionJaTrCountry', 'SubscriptionJaTrState', 'SubscriptionJaTd1Country', 'SubscriptionJaTd2Country', 'SubscriptionJaTd3Country'])->where('id',$subscription_id)->first();

        $user_id = $subscription->user_id;
        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        $userDataArr = array('subscription' => $subscription, 'user' => $user);

        if(!empty($subscription['draft_refrence_id'])){

            if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                $pdf_name = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $pdf_name = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }
        }else{
            $pdf_name = $subscription['reference_no'].$subscription['refreance_id'];
        }

        //Make Signed PDF

        if($user->role_id == 2){
            if($subscription->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.signedApplication', $userDataArr);
            }else if($subscription->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.signedApplication', $userDataArr);
            } else {
                $pdf = \PDF::loadView('pdf.signedApplication', $userDataArr);
            }
            
        }else{ 
            if($subscription->fund_type == 2){
                $pdf = \PDF::loadView('pdf.mcil2.company.signedApplication', $userDataArr);
            }else if($subscription->fund_type == 3){
                $pdf = \PDF::loadView('pdf.mcil3.company.signedApplication', $userDataArr);
            } else {
                $pdf = \PDF::loadView('pdf.company.signedApplication', $userDataArr);
            }
            
        }

        $path = public_path('pdf/docs/signedInstruction');
        $fileName =  $pdf_name.'.'. 'pdf' ;

        if (File::exists(public_path('pdf/docs/signedInstruction/'.$fileName))) {
            File::delete(public_path('pdf/docs/signedInstruction/'.$fileName));
        }

        $pdf->save($path . '/' . $fileName);

        if(!empty($fileName)){
           return $fileName;
        }
    }

    public function redemptionUpdate(Request $request)
    {
        $subscription_id = $request->get('sub_id');
        $subscription = Subscription::findOrFail($subscription_id);

        $subscription->redemption_status = $request->get('redemption_status');
        $subscription->redemption_msg = $request->get('redemption_msg');

        $actionLog = [];
        
        if ($subscription->save()) {

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

            $user_id = $subscription->user_id;
            $user = User::findOrFail($user_id);
            $redemption_msg = $subscription['redemption_msg'];
            
            $noti_sender_user_id = 1;
            $noti_receiver_user_id = $user['id'];

            if($user->role_id == 2){
                $link_base = "/individual/view/subscription/";
            }else{
                $link_base = "/company/view/subscription/";
            }

            $noti_link = $link_base.$subscription->id;

            if($subscription->redemption_status == 1){
                    
                $noti_message = $user->first_name.$user->last_name." - ".$investment_no." Your Redemption Request Accept";

                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
                
                //send mail
                sendRedemptionNoticeAcceptForInvestor($user, $subscription);

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Redemption Request Accept.";
                
            }else if($subscription->redemption_status == 2){
                
                $noti_message = $user->first_name.$user->last_name." - ".$investment_no." Your Redemption Request Reject";

                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);

                //send mail
                sendRedemptionNoticeRejectForInvestor($user, $subscription, $redemption_msg);

                $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Redemption Request Reject.";
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $subscription->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $subscription->fund_type;
            $actionLog['is_doc_enable'] = 0; 
            $actionLog['model'] = "Redemption"; 
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['data' => "done", 'error' => true, 'msg' => "The Redemption Form has been saved"], 200);
        }

        return response()->json(['data' => "sss", 'error' => false, 'msg' => "The Redemption Form could not be saved. Please, try again."], 200);
    }

    public function autoGenerateInvestment(Request $request)
    {
        $id = $request->get('sub_id');
        $reference_no = $request->get('investment_id');

        $original = Subscription::findOrFail($id);
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
        $copy->reinvestment_parant_id = $id;
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
            
            $this->copyDocument($id, $copy->id);

            $get_serial_no = new Subscription();
            $get_serial_no->serial_sc();
            $get_serial_no->serial_draft_no(); 

            $updateOld = Subscription::findOrFail($id);
            $updateOld->reinvestment_request = 0;
            $updateOld->reinvestment_status = 1;
            //$updateOld->status = 6;
            $updateOld->reinvestment_child_id = $copy->id;
            $updateOld->save();

            $user_id = $copy->user_id;
            $user = User::findOrFail($user_id);

            $old_investment_no = $original['reference_no'].$original['refreance_id'];
            $new_investment_no = $copy['reference_no'].$copy['refreance_id'];

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
                $noti_link = $link_base.$id;
                $noti_message = $new_investment_no." - Your Re-Investment Request Acceptted & Created Successfully";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
            }

            //user action logs
            $auth_user = Auth::user();
            $role = $auth_user->roles->pluck('name')->implode(',');

            $actionLog = [];
            $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
            $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
            $actionLog['subscription_id'] = $original->id;
            $actionLog['user_id'] = $user->id;
            $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
            $actionLog['fund_type'] = $original->fund_type;
            $actionLog['is_doc_enable'] = 0; 
            $actionLog['model'] = "Subscriptions"; 
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - Old Investment No ".$old_investment_no." - New investment No " . $new_investment_no . " Re-Investment Request Acceptted & Created Successfully.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['data' => "", 'error' => true, 'msg' => "The auto generate investment created successfully"], 200);
        } else {

            return response()->json(['data' => "null", 'error' => false, 'msg' => "The auto generate investment could not be saved. Please, try again."], 200);
        }
    }

    public function ajaxPaymentSave(Request $request)
    {
        $requestData = $request->all();
        $payout_type = $request->get('payout_type');

        if(($payout_type == "Bonus") || ($payout_type == "Dividend & Bonus")){ 
            $requestData['payout_date'] = $request->get('payout_date1');
        }

        $requestData['subscription_id'] = $request->get('subscription_id');

        $attachment= $request->file('file');

        if(!empty($attachment)){
            $fileName = time().'_'.$attachment->getClientOriginalName();
            $filePath = $attachment->storeAs('payment', $fileName, 'public');
            $requestData['file'] = $filePath; 
        }
        
        $payment = Payment::create($requestData);

        if ($payment) {
            return response()->json(['data' => $payment, 'error' => true, 'msg' => "The Payments has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Payments could not be saved. Please, try again."], 200);

    }

    public function ajaxPaymentGet(Request $request)
    {
        $id = $request->get('id');
        $payment = Payment::findOrFail($id);

        if ($payment) {
            $data = array();
            $data["id"]= $payment->id;
            $data["subscription_id"]= $payment->subscription_id;
            $data["payout_type"]= $payment->payout_type;
            $data['payout_date'] = $payment->payout_date ? date('Y-m-d', strtotime($payment->payout_date)) : '';
            
            //$data['divident_date'] = $payment->divident_date ? $payment->divident_date->format('Y-m-d') :'';
            $data['amount'] = $payment->amount;
            $data['percentage'] = $payment->percentage;
            $data['reference'] = $payment->reference;

            return response()->json(['data' => $data, 'error' => true, 'msg' => "The Payments data retrieve successfully"], 200);
        }

        return response()->json(['data' => 'null', 'error' => false,'msg' => "The Payments data could not be retrieve. Please, try again."], 200);
    }

    public function ajaxPaymentEditSave(Request $request)
    {
        $id = $request->get('id');
        $requestData = $request->all();
        $payment = Payment::findOrFail($id);

        $attachment= $request->file('file');

        if(!empty($attachment)){
            $fileName = time().'_'.$attachment->getClientOriginalName();
            $filePath = $attachment->storeAs('payment', $fileName, 'public');
            $requestData['file'] = $filePath; 
        }

        $payment = $payment->update($requestData);

        if ($payment) {
            return response()->json(['data' => $payment, 'error' => true, 'msg' => "The Payments has been saved"], 200);
        }
        
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The Payments could not be saved. Please, try again."], 200);
    }

    public function ajaxInvestmentGet(Request $request)
    {
        $id = $request->get('id');
        $investment = Subscription::findOrFail($id);

        if($investment){
            return response()->json(['data' => $investment, 'error' => true, 'msg' => "The investment data retrieve successfully"], 200);
        }

        return response()->json(['data' => 'null', 'error' => false,'msg' => "The investment data could not be retrieve. Please, try again."], 200);
    }

    public function ajaxInvestmentEditSave(Request $request)
    {
        $id = $request->get('id');
        $requestData = $request->all();
        $investment = Subscription::findOrFail($id);

        $service_charge = $request->service_charge;

        $updated = $investment->update($requestData);

        if(($investment->status == 3) || ($investment->status == 6)){
            $investment_no = $investment['reference_no'].$investment['refreance_id'];
        }else{
            $investment_no = $investment['draft_refrence_id']."-".$investment['reference_no'].$investment['refreance_id'];
        }

        if($investment->fund_type == 1){
            $msg_fund_type = "MCIL1";
        }else if($investment->fund_type == 2){
            $msg_fund_type = "MCIL2";
        }else if($investment->fund_type == 3){
            $msg_fund_type = "MCIL3";
        }else{
            $msg_fund_type = "";
        }

        //user action logs
        $auth_user = Auth::user();
        $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = $investment->id;
        $actionLog['user_id'] = $auth_user->id;
        $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = $investment->fund_type;
        $actionLog['is_doc_enable'] = 0; 
        $actionLog['model'] = "Subscriptions"; 
        $actionLog['action'] = $msg_fund_type."-".$auth_user->first_name.$auth_user->last_name." - ".$investment_no." - ". "Subscription fee updated value as ". $service_charge;
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        if ($updated) {
            return response()->json(['data' => $investment, 'error' => true, 'msg' => "The investment has been saved"], 200);
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The investment could not be saved. Please, try again."], 200);
    }

    public function uploadSignedapp(Request $request)
    {
        $sub_id = $request->get('id');

        $subscription = Subscription::findOrFail($sub_id);

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
        // $requestData['service_charge']=Setting::get('service_charge');
        // $requestData['bank_charge']=Setting::get('bank_charge');

        $updated = $subscription->update($requestData);

        if ($updated) {
            return response()->json(['data' => "", 'error' => true, 'msg' => "The signed application has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The signed application could not be saved. Please, try again."], 200);
    }

    public function formuploadShareCertification(Request $request)
    {
        $sub_id = $request->get('id');
        $subscription = Subscription::findOrFail($sub_id);

        $originalImage= $request->file('sharecertificate_file');
        if(!empty($originalImage)){
            
            $fileName = time().'_'.$request->sharecertificate_file->getClientOriginalName();
            $filePath = $originalImage->storeAs('pdf/uploadedDocs', $fileName, 'public');

            $image_name = $filePath;
            $status = 1;
        }else{
            $image_name = "";
            $status = 0;
        }

        $requestData['sharecertificate_file'] = $image_name;
        $requestData['enable_sharecertificate'] = $status;

        $updated = $subscription->update($requestData);

        if ($updated) {
            return response()->json(['data' => "", 'error' => true, 'msg' => "The share certification has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The share certification could not be saved. Please, try again."], 200);

    }

    public function formuploadBankSlip(Request $request)
    {
        $sub_id = $request->get('id');
        $subscription = Subscription::findOrFail($sub_id);
        $subscription->notification_doc_hidden = 1;
        $subscription->save();

        if($bankslip_file=$request->file('bankslip_file')){
            foreach ($bankslip_file as $ss) {
                
                $ssAttachment = new SsAttachment;

                $fileName = time().'_'.$ss->getClientOriginalName();
                $filePath = $ss->storeAs('ssattachment', $fileName, 'public');
                $ssAttachment->attachment = $filePath;
                $ssAttachment->attachment_type = 15;
                $ssAttachment->notification = 1;
                $ssAttachment->subscription_id = $sub_id;
                $ssAttachment->remarks = "Bank Slip";

                $ssAttachment->save();
            }
        }

        if(!empty($subscription['draft_refrence_id'])){

            if(($subscription->status == 3) || ($subscription->status == 6)){
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }else{
                $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
            }

        }else{
            $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
        }

        $user = User::findOrFail($subscription->user_id);

        //Make Email
        // sendBankSlip($user, $investment_no);

        if($subscription->fund_type == 1){
            $msg_fund_type = "MCIL1";
        }else if($subscription->fund_type == 2){
            $msg_fund_type = "MCIL2";
        }else if($subscription->fund_type == 3){
            $msg_fund_type = "MCIL3";
        }else{
            $msg_fund_type = "";
        }

        // if($user->id){
        //     $noti_sender_user_id = 1;
        //     $noti_receiver_user_id = $user->id;
        //     $noti_link = "/subscription/view/".$subscription->id;
        //     $noti_message = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Bank Slip Uploaded";
            
        //     // Save Notification
        //     $notification = new User;
        //     $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
        // }

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
        $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Bank Slip Uploaded.";
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        // log attachments
        $attachmentData = SsAttachment::where('subscription_id',$sub_id)
                                ->where('attachment_type', 15)
                                ->get();

        foreach ($attachmentData as $key => $data) {
            
            $logAttachment = [];
            $logAttachment['auditlog_id'] = $auditlog->id;
            $logAttachment['attachment'] = $data->attachment;

           $updated = LogAttachment::create($logAttachment);
        } 

        if ($updated) {
            return response()->json(['data' => "", 'error' => true, 'msg' => "The bank slip has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The bank slip could not be saved. Please, try again."], 200);

    }
    
    public function documentUpload(Request $request)
    {
        $id = $request->get('ss_att_id');

        $attachment= $request->file('attachment');
        $ssAttachment = SsAttachment::findOrFail($id);

        $fileName = time().'_'.$attachment->getClientOriginalName();
        $filePath = $attachment->storeAs('ssattachment', $fileName, 'public');
        $ssAttachment->attachment = $filePath;

        $attachment = $ssAttachment->save();

        if ($attachment) {
            return response()->json(['data' => $attachment, 'error' => true, 'msg' => "The document has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => false, 'msg' => "The document could not be saved. Please, try again."], 200);
    }

    public function ajaxIBankEditSave(Request $request)
    {
        $id = $request->get('id');
        $requestData = $request->all();
        $subscription = Subscription::find($id);

        $updated = $subscription->update($requestData);

        if ($updated) {

            $subscriptionEntity = Subscription::findOrFail($subscription->id);

            $subscriptionEntity->bankac_status = 1;
            $subscriptionEntity->bankac_mail_status = 1;
            $subscriptionEntity->bankac_updated_date = date('Y-m-d H:i:s');
            $subscriptionEntity->bankac_updated_by = Auth::user()->id;

            $subscriptionEntity->save();

            $userId = $subscriptionEntity->user_id;
            $user = User::findOrFail($userId);

            //sendMail
            sendBankDetailsUpdateMail($user, $subscriptionEntity);

            if($user->role_id == 2){
                $link_base = "/individual/view/subscription/";
            }else{
                $link_base = "/company/view/subscription/";
            }

            if($user->id){
                $noti_sender_user_id = 1;
                $noti_receiver_user_id = $user->id;
                $noti_link = $link_base.$subscription->id;
                $noti_message = "Your Bank Account Details Updated Successfully";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
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
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Requested Bank Account Details Updated.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['data' => $subscriptionEntity, 'error' => true, 'msg' => "The bank details has been updated"], 200);
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The bank details could not be updated. Please, try again."], 200);
    }

    public function ajaxBeneficiaryEditSave(Request $request)
    {
        $id = $request->get('id');
        $requestData = $request->all();
        
        $beneficiary_status = $request->get('beneficiary_status');

        $subscription = Subscription::findOrFail($id);

        $updated = $subscription->update($requestData);

        if ($updated) {
            
            $subscriptionEntity = Subscription::findOrFail($subscription->id);
            $subscriptionEntity->beneficiary_status = 1;

            if ($beneficiary_status == 1) {
                $subscriptionEntity->b1_status = 0;
                $subscriptionEntity->b1_updated_date = date('Y-m-d H:i:s');
                $subscriptionEntity->b1_updated_by = Auth::user()->id;
            } else {
                $subscriptionEntity->b2_status = 0;
                $subscriptionEntity->b2_updated_date = date('Y-m-d H:i:s');
                $subscriptionEntity->b2_updated_by = Auth::user()->id;
            }

            // $subscriptionEntity->bankac_mail_status = 1;
            $subscriptionEntity->save();

            $userId = $subscriptionEntity->user_id;
            $user = User::findOrFail($userId);

            //send Mail
            sendBeneficiaryDetailsUpdateMail($user, $subscriptionEntity);

            if($user->role_id == 2){
                $link_base = "/individual/view/subscription/";
            }else{
                $link_base = "/company/view/subscription/";
            }

            if($user->id){
                $noti_sender_user_id = 1;
                $noti_receiver_user_id = $user->id;
                $noti_link = $link_base.$subscription->id;
                $noti_message = "Your Beneficiary Details Updated Successfully";
                
                $notification = new User;
                $notification->notificationSave($noti_sender_user_id, $noti_receiver_user_id, $noti_link, $noti_message);
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
            $actionLog['action'] = $msg_fund_type."-".$user->first_name.$user->last_name." - ".$investment_no." Requested Beneficiary Details Updated.";
            $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

            $auditlog = Auditlog::create($actionLog);

            return response()->json(['data' => $subscriptionEntity, 'error' => true, 'msg' => "The beneficiary details has been updated"], 200);  
        }

        return response()->json(['data' => "null", 'error' => false, 'msg' => "The beneficiary details could not be updated. Please, try again."], 200);

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

                $ssAttachmentData = SsAttachment::where(['subscription_id' => $subscription_id, 'attachment_type' => $attachment_type])->first();

                if(!empty($ssAttachmentData)){

                    $ssAttachment = SsAttachment::find($ssAttachmentData->id);
                    $ssAttachment->update($requestData);
                }else{

                    $ssAttachment = SsAttachment::create($requestData);
                }

                return response()->json(['error' => 0, 'msg' => "The document has been save."], 200);   
            }

            return response()->json(['error' => 1, 'msg' => "The document has not save."], 200);  
        }
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

    public function signedPdfDownload(Request $request){
        $subscription_id = $request->input('id');
        $user_id = $request->input('userId');

        $user = User::with('countryAs', 'stateAs', 'mobilePrefix' ,'individual.IndiResidence', 'individual.IndiNationality', 'company.CompanyCountryCorporate')->findOrFail($user_id);

        if(!empty($subscription_id)){

            $subscription = Subscription::with(['SsAttachments', 'Individual', 'User.stateAs', 'User.countryAs', 'User.mobilePrefix', 'SubscriptionCountry', 'SubscriptionState', 'SubscriptionJaCountry', 'SubscriptionJaState', 'SubscriptionTrState', 'SubscriptionTrCountry', 'SubscriptionJaNationality' ,'SubscriptionJaMobilePrefix', 'SubscriptionB1PhonePrefix', 'SubscriptionB1Country', 'SubscriptionB1State', 'SubscriptionB1Nationality', 'SubscriptionB2Country', 'SubscriptionB2State', 'SubscriptionB2PhonePrefix', 'SubscriptionB2Nationality', 'SubscriptionTd1Country', 'SubscriptionTd2Country', 'SubscriptionTd3Country', 'SubscriptionJaTrCountry', 'SubscriptionJaTrState', 'SubscriptionJaTd1Country', 'SubscriptionJaTd2Country', 'SubscriptionJaTd3Country'])->where('user_id', $user_id)->where('id',$subscription_id)->first();

            if(empty($subscription)){
                return "";
            }
    
            // $currency_word = $this->convert_number_to_words($subscription->initial_investment);
            
            // $pdf = \PDF::loadView('pdf.singedPdf', compact('subscription', 'currency_word'));
            // $pdf->setOption('enable-javascript', true);
            // $pdf->setOption('javascript-delay', 100);
            // $pdf->setOption('enable-smart-shrinking', true);
            // $pdf->setOption('no-stop-slow-scripts', true);

            //return $pdf->stream('chart.pdf');
            //$pdf = PDF::loadView('pdf.singedPdf', compact('subscription', 'currency_word'));

            $userDataArr = array('subscription' => $subscription, 'user' => $user);

            //Make Signed PDF
            if($user->role_id == 2){
                if($subscription->fund_type == 2){
                    $pdf = \PDF::loadView('pdf.mcil2.signedApplication', $userDataArr);
                }else if($subscription->fund_type == 3){
                    $pdf = \PDF::loadView('pdf.mcil3.signedApplication', $userDataArr);
                } else {
                    $pdf = \PDF::loadView('pdf.signedApplication', $userDataArr);
                }
                
            }else{ 
                if($subscription->fund_type == 2){
                    $pdf = \PDF::loadView('pdf.mcil2.company.signedApplication', $userDataArr);
                }else if($subscription->fund_type == 3){
                    $pdf = \PDF::loadView('pdf.mcil3.company.signedApplication', $userDataArr);
                } else {
                    $pdf = \PDF::loadView('pdf.company.signedApplication', $userDataArr);
                }
            }

            // $path = public_path('pdf/signedPdf');
            // $fileName =  time().'.'. 'pdf' ;
            // $pdf->save($path . '/' . $fileName);

            // $pdf = public_path('pdf/signedPdf'.$fileName);

            $path = public_path('pdf/signedPdf');
            $fileName =  $subscription_id.'_'.time().'.'. 'pdf' ;

            if (File::exists(public_path('pdf/signedPdf/'.$fileName))) {
                File::delete(public_path('pdf/signedPdf/'.$fileName));
            }

            $pdf->save($path . '/' . $fileName);

            if(!empty($fileName)){
               $signedPdf = $fileName;
            }

            return response()->json(['data' => "success", 'filename' => $signedPdf, 'subscription_id' => $subscription_id], 201);  

        }else{
            return "";
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

    public function SubscriptionPayoutIndex(Request $request)
    {
        $q =  $request->input('q');
        if($q!=""){
            $subscriptions = Subscription::whereHas('User', function($query) use($q) {
                $query->where('first_name', 'like', '%'.$q.'%');
                $query->orWhere('last_name', 'like', '%'.$q.'%');
                $query->distinct(['email']);
            })
            ->where('status', 3)
            ->where('reinvestment_status', 0)
            ->where('draft', 0)
            ->where('draft_delete', 0)
            ->orWhere('reference_no','LIKE','%'.$q.'%')
            ->orWhere('refreance_id', 'LIKE','%'.$q.'%')
            ->orderBy('id', 'ASC')
            ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {
            $subscriptions = Subscription::whereHas('User', function($query) use($q) {
                $query->distinct(['email']);
            })
            ->where('status', 3)
            ->where('reinvestment_status', 0)
            ->where('draft', 0)
            ->where('draft_delete', 0)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        }

        return view('admin.payout.subscriptionIndex', compact('subscriptions'));
    }

    public function payoutIndex(Request $request, $id)
    {
        $active_investments = Subscription::with('User', 'Payments', 'McilFund')
            ->where('status', 3)
            ->where('reinvestment_status', 0)
            // ->where('user_id', $id)
            ->where('id', $id)
            ->where('draft', 0)
            ->where('draft_delete', 0)
            ->orderBy('id', 'ASC')
            ->get();

        // dividend payouts
        $commencement_year = [];

        if(!empty($active_investments)) {

            foreach ($active_investments as $key => $active_investment) {
                
                if(!empty($active_investment->commence_date)){
                    if(!empty($active_investment->maturity_date)){
                        $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($active_investment->commence_date)), date('Y-m-d', strtotime($active_investment->maturity_date)));

                        $i = 0;
                        $per_count = 0;
                        $len = count($quartersCR);
                        foreach ($quartersCR as $value) {
                            $dis_month = $value->start_month;
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
                                    
                                    $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                    $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                    $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                    $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                    $commencement_year[$key][$i]['year'] = $dis_year;
                                    $commencement_year[$key][$i]['month'] = $dis_month;
                                    $commencement_year[$key][$i]['percentage'] = 3;
                                    $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*3)/100;
                                    $per_count += 3;

                                }else if($month_count == 2){

                                    $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                    $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                    $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                    $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                    $commencement_year[$key][$i]['year'] = $dis_year;
                                    $commencement_year[$key][$i]['month'] = $dis_month;
                                    $commencement_year[$key][$i]['percentage'] = 2;
                                     $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*2)/100;
                                    $per_count += 2;

                                }else{

                                    $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                    $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                    $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                    $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                    $commencement_year[$key][$i]['year'] = $dis_year;
                                    $commencement_year[$key][$i]['month'] = $dis_month;
                                    $commencement_year[$key][$i]['percentage'] = 1;
                                     $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*1)/100;
                                    $per_count += 1;
                                }
                                
                            } else if ($i == $len - 1) {

                                $per_count += 3;
                                $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                $commencement_year[$key][$i]['year'] = $dis_year;
                                $commencement_year[$key][$i]['month'] = $dis_month;
                                $commencement_year[$key][$i]['percentage'] = 3;
                                $commencement_year[$key][$i]['amount'] = ($active_investment->initial_investment*3)/100;

                            }else if(($i !=0)){

                                $per_count += 3;
                                $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                                $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                                $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                                $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                $commencement_year[$key][$i]['year'] = $dis_year;
                                $commencement_year[$key][$i]['month'] = $dis_month;
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

                            $commencement_year[$key][$i]['investment_id'] = $active_investment->reference_no . $active_investment->refreance_id;
                            $commencement_year[$key][$i]['investor_name'] = $active_investment->User['first_name'] . $active_investment->User['last_name'];
                            $commencement_year[$key][$i]['investment_amount'] = $active_investment->initial_investment;
                            $commencement_year[$key][$i]['full'] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                            $commencement_year[$key][$i]['quarter'] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                            $commencement_year[$key][$i]['year'] = date('Y', $maturity_dateee);
                            $commencement_year[$key][$i]['month'] = date('F', $maturity_dateee);
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

        return view('admin.payout.index', compact('final'));
    }

    public function dividentPayoutIndex(Request $request)
    {
        $q =  $request->input('q');
        if($q!=""){
            $subscriptions = Subscription::whereHas('User', function($query) use($q) {
                $query->where('first_name', 'LIKE', '%'.$q.'%');
                $query->orWhere('last_name', 'LIKE', '%'.$q.'%');
            })
            ->whereIn('status', [3, 6])
            ->whereIn('reinvestment_status', [0, 1])
            ->where('draft', 0)
            ->where('draft_delete', 0)
            ->orderBy('id', 'ASC')
            ->paginate(10);

            $subscriptions->appends(['q' => $q]);

        } else {
            // $subscriptions = Subscription::with(['User', 'Payments'], function($query) {
            //     $query->distinct(['email']);
            // })

            $subscriptions = Subscription::with('User', 'Payments')
            ->whereIn('status', [3, 6])
            ->whereIn('reinvestment_status', [0, 1])
            ->where('draft', 0)
            ->where('draft_delete', 0)
            ->orderBy('id', 'ASC')
            ->paginate(10);
        }

        return view('admin.dividentPayout.index', compact('subscriptions'));
    }

    public function dividentPayoutView($id)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {
            // $cond['status'] = 1;
        } else {
            $cond['fund_type'] = $getGlobalFund;
        }

        $userId = $id;
        $users = User::with(['subscriptions' => function($q) use($cond) {
            $q->whereIn('status', [3, 6]);
            $q->whereIn('reinvestment_status', [0, 1]);
            $q->where('draft', '=', 0);
            $q->where('draft_delete', '=', 0);
            $q->where($cond);
        }])
        ->where('id', '=', $userId)
        ->get();

        // return $users;

        $three_percentage_count = 0;

        $commencement_year = [];
        $subscriptionData = [];

        $user = User::findOrFail($userId);

        if(!empty($users)) {
            foreach ($users as $key => $user){
                foreach ($user->subscriptions as $key => $subscription){

                    if ($subscription->status == 6) {
                        
                        if ($subscription->Payments->count() <= 8 ) {

                            if (($subscription->Payments->sum('percentage') < 24) && ($subscription->Payments->count() == 8 ))  {

                                $subscription = Subscription::findOrFail($subscription->id);

                                $subscriptionData['subscriptions'][$key] = $subscription;

                                if(!empty($subscription->commence_date)){
                                    if(!empty($subscription->maturity_date)){
                                        $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                        
                                        $i = 0;
                                        $per_count = 0;
                                        $len = count($quartersCR);

                                        foreach ($quartersCR as $value) {
                                            $dis_month = $value->start_month;
                                            $dis_month_num = $value->start_month_num;
                                            $dis_year = $value->year;

                                            if ($i == 1) {

                                                $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                $ts2 = strtotime($value->period_start);
                                                $dyear1 = date('Y', strtotime($ts1));
                                                $dyear2 = date('Y', $ts2);
                                                $dmonth1 = date('m', strtotime($ts1));
                                                $dmonth2 = date('m', $ts2);
                                                
                                                $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                if($month_count == 3){
                                                    
                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;

                                                    $per_count += 3;

                                                }else if($month_count == 2){

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 2;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;

                                                    $per_count += 2;

                                                }else{

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key]= 1;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;

                                                    $per_count += 1;
                                                }
                                                
                                            } else if ($i == $len - 1) {
                                                $per_count += 3;

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                $s_month = date('m',strtotime($dis_month));
                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;

                                            }else if(($i !=0)){
                                                $per_count += 3;

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                $s_month = date('m',strtotime($dis_month));
                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                            }
                                            $i++;
                                        }
                                        $len = count($quartersCR)-1;
                                        $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                        $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                        if($per_count != 24){
                                            $last_val = 24 - $per_count;

                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                            $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                            $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                            $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                            $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                            $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                            $e_month = date('F', $maturity_dateee);
                                            $e_month = date('m',strtotime($e_month));
                                            $e_year = date('Y', $maturity_dateee);

                                            $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                            $commencement_year[$i]['percentage'][$key] = $last_val;
                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                
                                        }
                                    }
                                }
                            }

                            if (!empty($subscription->Payments[$key]['percentage'])) {
                                
                                if ($subscription->Payments[$key]['percentage'] != 3 ) {

                                    $subscription = Subscription::findOrFail($subscription->id);

                                    $subscriptionData['subscriptions'][$key] = $subscription;

                                    if(!empty($subscription->commence_date)){
                                        if(!empty($subscription->maturity_date)){
                                            $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                            
                                            $i = 0;
                                            $per_count = 0;
                                            $len = count($quartersCR);

                                            foreach ($quartersCR as $value) {
                                                $dis_month = $value->start_month;
                                                $dis_month_num = $value->start_month_num;
                                                $dis_year = $value->year;

                                                if ($i == 1) {

                                                    $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                    $ts2 = strtotime($value->period_start);
                                                    $dyear1 = date('Y', strtotime($ts1));
                                                    $dyear2 = date('Y', $ts2);
                                                    $dmonth1 = date('m', strtotime($ts1));
                                                    $dmonth2 = date('m', $ts2);
                                                    
                                                    $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                    if($month_count == 3){
                                                        
                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 3;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                                        $per_count += 3;

                                                    }else if($month_count == 2){

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 2;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                                        $per_count += 2;

                                                    }else{

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key]= 1;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                                        $per_count += 1;
                                                    }
                                                    
                                                } else if ($i == $len - 1) {
                                                    $per_count += 3;

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;

                                                }else if(($i !=0)){
                                                    $per_count += 3;

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                }
                                                $i++;
                                            }
                                            $len = count($quartersCR)-1;
                                            $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                            $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                            if($per_count != 24){
                                                $last_val = 24 - $per_count;

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                $e_month = date('F', $maturity_dateee);
                                                $e_month = date('m',strtotime($e_month));
                                                $e_year = date('Y', $maturity_dateee);

                                                $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = $last_val;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    
                                            }
                                        }
                                    }

                                    
                                } else {

                                    $subscription = Subscription::findOrFail($subscription->id);

                                    $subscriptionData['subscriptions'][$key] = $subscription;

                                    if(!empty($subscription->commence_date)){
                                        if(!empty($subscription->maturity_date)){
                                            $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                            
                                            $i = 0;
                                            $per_count = 0;
                                            $len = count($quartersCR);

                                            foreach ($quartersCR as $value) {
                                                $dis_month = $value->start_month;
                                                $dis_month_num = $value->start_month_num;
                                                $dis_year = $value->year;

                                                if ($i == 1) {

                                                    $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                    $ts2 = strtotime($value->period_start);
                                                    $dyear1 = date('Y', strtotime($ts1));
                                                    $dyear2 = date('Y', $ts2);
                                                    $dmonth1 = date('m', strtotime($ts1));
                                                    $dmonth2 = date('m', $ts2);
                                                    
                                                    $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                    if($month_count == 3){
                                                        
                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 3;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                                        $per_count += 3;

                                                    }else if($month_count == 2){

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 2;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                                        $per_count += 2;

                                                    }else{

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key]= 1;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                                        $per_count += 1;
                                                    }
                                                    
                                                } else if ($i == $len - 1) {
                                                    $per_count += 3;

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;

                                                }else if(($i !=0)){
                                                    $per_count += 3;

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                }
                                                $i++;
                                            }
                                            $len = count($quartersCR)-1;
                                            $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                            $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                            if($per_count != 24){
                                                $last_val = 24 - $per_count;

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                $e_month = date('F', $maturity_dateee);
                                                $e_month = date('m',strtotime($e_month));
                                                $e_year = date('Y', $maturity_dateee);

                                                $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = $last_val;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    
                                            }
                                        }
                                    }

                                }

                                
                            } else {


                            }

                        } else {

                            $subscription = Subscription::findOrFail($subscription->id);
                            // $user = User::findOrFail($subscription->user_id);

                            $subscriptionData['subscriptions'][$key] = $subscription;

                            if(!empty($subscription->commence_date)){
                                if(!empty($subscription->maturity_date)){
                                    $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                    
                                    $i = 0;
                                    $per_count = 0;
                                    $len = count($quartersCR);

                                    foreach ($quartersCR as $value) {
                                        $dis_month = $value->start_month;
                                        $dis_month_num = $value->start_month_num;
                                        $dis_year = $value->year;

                                        if ($i == 1) {

                                            $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                            $ts2 = strtotime($value->period_start);
                                            $dyear1 = date('Y', strtotime($ts1));
                                            $dyear2 = date('Y', $ts2);
                                            $dmonth1 = date('m', strtotime($ts1));
                                            $dmonth2 = date('m', $ts2);
                                            
                                            $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                            if($month_count == 3){
                                                
                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                $s_month = date('m',strtotime($dis_month));
                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;

                                                $per_count += 3;

                                            }else if($month_count == 2){

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                $s_month = date('m',strtotime($dis_month));
                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = 2;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;

                                                $per_count += 2;

                                            }else{

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                $s_month = date('m',strtotime($dis_month));
                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key]= 1;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;

                                                $per_count += 1;
                                            }
                                            
                                        } else if ($i == $len - 1) {
                                            $per_count += 3;

                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                            $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                            $s_month = date('m',strtotime($dis_month));
                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                            $commencement_year[$i]['percentage'][$key] = 3;
                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                            $commencement_year[$i]['quarterYear'][$key] = $i;

                                        }else if(($i !=0)){
                                            $per_count += 3;

                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                            $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                            $s_month = date('m',strtotime($dis_month));
                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                            $commencement_year[$i]['percentage'][$key] = 3;
                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                        }
                                        $i++;
                                    }
                                    $len = count($quartersCR)-1;
                                    $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                    $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                    if($per_count != 24){
                                        $last_val = 24 - $per_count;

                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                        $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                        $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                        $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                        $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                        $e_month = date('F', $maturity_dateee);
                                        $e_month = date('m',strtotime($e_month));
                                        $e_year = date('Y', $maturity_dateee);

                                        $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                        $commencement_year[$i]['percentage'][$key] = $last_val;
                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                            
                                    }
                                }
                            }

                        }

                    } else {

                        $subscription = Subscription::findOrFail($subscription->id);
                        // $user = User::findOrFail($subscription->user_id);

                        $subscriptionData['subscriptions'][$key] = $subscription;

                        if(!empty($subscription->commence_date)){
                            if(!empty($subscription->maturity_date)){
                                $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                
                                $i = 0;
                                $per_count = 0;
                                $len = count($quartersCR);

                                foreach ($quartersCR as $value) {
                                    $dis_month = $value->start_month;
                                    $dis_month_num = $value->start_month_num;
                                    $dis_year = $value->year;

                                    if ($i == 1) {

                                        $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                        $ts2 = strtotime($value->period_start);
                                        $dyear1 = date('Y', strtotime($ts1));
                                        $dyear2 = date('Y', $ts2);
                                        $dmonth1 = date('m', strtotime($ts1));
                                        $dmonth2 = date('m', $ts2);
                                        
                                        $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                        if($month_count == 3){
                                            
                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                            $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                            $s_month = date('m',strtotime($dis_month));
                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                            $commencement_year[$i]['percentage'][$key] = 3;
                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                            $commencement_year[$i]['quarterYear'][$key] = $i;

                                            $per_count += 3;

                                        }else if($month_count == 2){

                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                            $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                            $s_month = date('m',strtotime($dis_month));
                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                            $commencement_year[$i]['percentage'][$key] = 2;
                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                            $commencement_year[$i]['quarterYear'][$key] = $i;

                                            $per_count += 2;

                                        }else{

                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                            $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                            $s_month = date('m',strtotime($dis_month));
                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                            $commencement_year[$i]['percentage'][$key]= 1;
                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                            $commencement_year[$i]['quarterYear'][$key] = $i;

                                            $per_count += 1;
                                        }
                                        
                                    } else if ($i == $len - 1) {
                                        $per_count += 3;

                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                        $s_month = date('m',strtotime($dis_month));
                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                        $commencement_year[$i]['percentage'][$key] = 3;
                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                        $commencement_year[$i]['quarterYear'][$key] = $i;

                                    }else if(($i !=0)){
                                        $per_count += 3;

                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                        $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                        $s_month = date('m',strtotime($dis_month));
                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                        $commencement_year[$i]['percentage'][$key] = 3;
                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                    }
                                    $i++;
                                }
                                $len = count($quartersCR)-1;
                                $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                if($per_count != 24){
                                    $last_val = 24 - $per_count;

                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                    $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                    $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                    $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                    $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                    $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                    $e_month = date('F', $maturity_dateee);
                                    $e_month = date('m',strtotime($e_month));
                                    $e_year = date('Y', $maturity_dateee);

                                    $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                    $commencement_year[$i]['percentage'][$key] = $last_val;
                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                        
                                }
                            }
                        }
                    }
                }
            }
        }
        
        // $dividendDate = [];
        // foreach ($commencement_year as $key => $commence_year){
        //     $dividendDate[] = $commence_year['quarter'];
        // }

        // $dividendAttrYear = [];
        // $dividendFinalDate = [];
        // foreach ($dividendDate as $i => $finalDate){
        //     foreach ($finalDate as $j => $fDate) {

        //         if(!in_array($fDate, $dividendFinalDate)){
        //             $dividendFinalDate[] = $fDate;
        //             $dividendAttrYear[]= substr($fDate, strpos($fDate, " ") + 1);
        //         }
        //     }
        // }

        // array_multisort($dividendAttrYear, SORT_ASC, $dividendFinalDate);


        //---------------------------------------------------------------------//

        $dividendDate = [];
        foreach ($commencement_year as $key => $commence_year){
            $dividendDate[] = $commence_year['date'];
        }

        $dividendFinalDate = [];
        foreach ($dividendDate as $i => $finalDate){
            foreach ($finalDate as $j => $fDate) {

                if(!in_array($fDate, $dividendFinalDate)){
                    $dividendFinalDate[] = $fDate;
                }
            }
        }

        sort($dividendFinalDate);

        $dividendDate = [];
        foreach ($dividendFinalDate as $i => $finalDate){

            $dividendDate[$i]['date'] = $finalDate;
            $dividendDate[$i]['quarter'] = date('F Y', strtotime($finalDate));
            $dividendDate[$i]['full'] =  "Before 15 " . date('F Y', strtotime($finalDate));

        }

        $data['commencement_year'] = $commencement_year;
        $data['dividend_final_date'] = $dividendFinalDate;
        $data['dividend_date'] = $dividendDate;
        $data['user'] = $user;

        return view('admin.dividentPayout.dividentPayout', compact('data'));
    }

    public function selectDividentContract(Request $request) {

        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {
        } else {
            $cond['fund_type'] = $getGlobalFund;
        }

        $userId = $request->userId;
        $users = User::with(['subscriptions' => function($q) use($cond) {
            $q->whereIn('status', [3, 6]);
            $q->whereIn('reinvestment_status', [0, 1]);
            $q->where('draft', '=', 0);
            $q->where('draft_delete', '=', 0);
            $q->where($cond);
        }])
        ->where('id', '=', $userId)
        ->get();

        $commencement_year = [];
        $subscriptionData = [];

        $userData = User::findOrFail($userId);

        $requestPayoutType = $request->payout_type;
        $requestdividendDate = $request->divident_date;

        if ($requestPayoutType == "Dividend") {
            $requestPayoutDate = $request->payout_date;
        } else {
           $requestPayoutDate = $request->payout_date1; 
        }
        
        if ($requestdividendDate != null) {

            if(!empty($users)) {
                foreach ($users as $key => $user){
                    foreach ($user->subscriptions as $key => $subscription){

                        if ($subscription->status == 6) {

                            if ($subscription->Payments->count() <= 8 ) {

                                if (($subscription->Payments->sum('percentage') < 24) && ($subscription->Payments->count() == 8 ))  {

                                    $d = new \DateTime($requestdividendDate);
                                    $formatted_date = $d->format('Y-m-d');

                                    $year = date('Y', strtotime($formatted_date));
                                    $month = date('m', strtotime($formatted_date));

                                    $subscriptionId = $subscription->id;
                                    $get_divident_date = Subscription::with(['Payments'])
                                    ->whereHas('Payments', function($q) use($subscriptionId, $month, $year) {
                                        $q->where('subscription_id', $subscriptionId);
                                        // $q->where('payout_type', '=', 'Dividend');
                                        $q->whereYear('payout_date', '=', $year);
                                        $q->whereMonth('payout_date', '=', $month);
                                    })->get();

                                    $subscription = Subscription::findOrFail($subscription->id);
                                    $subscriptionData['subscriptions'][$key] = $subscription;

                                    // $subscriptionDividentDate = date("F Y",strtotime($subscription->Payments[$key]['divident_date']));

                                    if(!empty($subscription->commence_date)){
                                        if(!empty($subscription->maturity_date)){
                                            $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                            
                                            $i = 0;
                                            $per_count = 0;
                                            $len = count($quartersCR);

                                            foreach ($quartersCR as $value) {
                                                $dis_month = $value->start_month;
                                                $dis_month_num = $value->start_month_num;
                                                $dis_year = $value->year;

                                                $divMonth = $dis_month." ". $dis_year;
                                                    
                                                if ($i == 1) {

                                                    $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                    $ts2 = strtotime($value->period_start);
                                                    $dyear1 = date('Y', strtotime($ts1));
                                                    $dyear2 = date('Y', $ts2);
                                                    $dmonth1 = date('m', strtotime($ts1));
                                                    $dmonth2 = date('m', $ts2);
                                                    
                                                    $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                    if($month_count == 3){
                                                        
                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }
                                                        
                                                        $per_count += 3;

                                                    }else if($month_count == 2){

                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 2;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }   
                                                        
                                                        $per_count += 2;

                                                    }else{
                                                        
                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key]= 1;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        } 
                                                        
                                                        $per_count += 1;
                                                    }
                                                    
                                                } else if ($i == $len - 1) {
                                                    $per_count += 3;

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = 3;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    }

                                                }else if(($i !=0)){
                                                    $per_count += 3;

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = 3;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    }
                                                }

                                                $i++;
                                            }

                                            $len = count($quartersCR)-1;
                                            $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                            $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                            if($per_count != 24){
                                                $last_val = 24 - $per_count;

                                                $divMonth = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);

                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                        $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                        $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                        $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                        $e_month = date('F', $maturity_dateee);
                                                        $e_month = date('m',strtotime($e_month));
                                                        $e_year = date('Y', $maturity_dateee);

                                                        $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = $last_val;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                } 
                                            }
                                        }
                                    }

                                } else {

                                    $d = new \DateTime($requestdividendDate);
                                    $formatted_date = $d->format('Y-m-d');

                                    $year = date('Y', strtotime($formatted_date));
                                    $month = date('m', strtotime($formatted_date));

                                    $subscriptionId = $subscription->id;
                                    $get_divident_date = Subscription::with(['Payments'])
                                    ->whereHas('Payments', function($q) use($subscriptionId, $month, $year) {
                                        $q->where('subscription_id', $subscriptionId);
                                        // $q->where('payout_type', '=', 'Dividend');
                                        $q->whereYear('payout_date', '=', $year);
                                        $q->whereMonth('payout_date', '=', $month);
                                    })->get();

                                    $subscription = Subscription::findOrFail($subscription->id);
                                    $subscriptionData['subscriptions'][$key] = $subscription;

                                    // $subscriptionDividentDate = date("F Y",strtotime($subscription->Payments[$key]['divident_date']));

                                    if(!empty($subscription->commence_date)){
                                        if(!empty($subscription->maturity_date)){
                                            $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                            
                                            $i = 0;
                                            $per_count = 0;
                                            $len = count($quartersCR);

                                            foreach ($quartersCR as $value) {
                                                $dis_month = $value->start_month;
                                                $dis_month_num = $value->start_month_num;
                                                $dis_year = $value->year;

                                                $divMonth = $dis_month." ". $dis_year;
                                                    
                                                if ($i == 1) {

                                                    $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                    $ts2 = strtotime($value->period_start);
                                                    $dyear1 = date('Y', strtotime($ts1));
                                                    $dyear2 = date('Y', $ts2);
                                                    $dmonth1 = date('m', strtotime($ts1));
                                                    $dmonth2 = date('m', $ts2);
                                                    
                                                    $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                    if($month_count == 3){
                                                        
                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }
                                                        
                                                        $per_count += 3;

                                                    }else if($month_count == 2){

                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 2;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }   
                                                        
                                                        $per_count += 2;

                                                    }else{
                                                        
                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key]= 1;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        } 
                                                        
                                                        $per_count += 1;
                                                    }
                                                    
                                                } else if ($i == $len - 1) {
                                                    $per_count += 3;

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = 3;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    }

                                                }else if(($i !=0)){
                                                    $per_count += 3;

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = 3;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    }
                                                }

                                                $i++;
                                            }

                                            $len = count($quartersCR)-1;
                                            $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                            $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                            if($per_count != 24){
                                                $last_val = 24 - $per_count;

                                                $divMonth = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);

                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                        $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                        $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                        $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                        $e_month = date('F', $maturity_dateee);
                                                        $e_month = date('m',strtotime($e_month));
                                                        $e_year = date('Y', $maturity_dateee);

                                                        $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = $last_val;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                } 
                                            }
                                        }
                                    }
                                }


                                if (!empty($subscription->Payments[$key]['percentage'])) {
                                    
                                    if ($subscription->Payments[$key]['percentage'] != 3 ) {

                                        $d = new \DateTime($requestdividendDate);
                                        $formatted_date = $d->format('Y-m-d');

                                        $year = date('Y', strtotime($formatted_date));
                                        $month = date('m', strtotime($formatted_date));

                                        $subscriptionId = $subscription->id;
                                        $get_divident_date = Subscription::with(['Payments'])
                                        ->whereHas('Payments', function($q) use($subscriptionId, $month, $year) {
                                            $q->where('subscription_id', $subscriptionId);
                                            // $q->where('payout_type', '=', 'Dividend');
                                            $q->whereYear('payout_date', '=', $year);
                                            $q->whereMonth('payout_date', '=', $month);
                                        })->get();

                                        $subscription = Subscription::findOrFail($subscription->id);
                                        $subscriptionData['subscriptions'][$key] = $subscription;

                                        $subscriptionDividentDate = date("F Y",strtotime($subscription->Payments[$key]['divident_date']));

                                        if(!empty($subscription->commence_date)){
                                            if(!empty($subscription->maturity_date)){
                                                $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                                
                                                $i = 0;
                                                $per_count = 0;
                                                $len = count($quartersCR);

                                                foreach ($quartersCR as $value) {
                                                    $dis_month = $value->start_month;
                                                    $dis_month_num = $value->start_month_num;
                                                    $dis_year = $value->year;

                                                    $divMonth = $dis_month." ". $dis_year;
                                                        
                                                    if ($i == 1) {

                                                        $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                        $ts2 = strtotime($value->period_start);
                                                        $dyear1 = date('Y', strtotime($ts1));
                                                        $dyear2 = date('Y', $ts2);
                                                        $dmonth1 = date('m', strtotime($ts1));
                                                        $dmonth2 = date('m', $ts2);
                                                        
                                                        $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                        if($month_count == 3){
                                                            
                                                            if ($divMonth == $requestdividendDate) {

                                                                if (!count($get_divident_date) > 0) {

                                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                                    $s_month = date('m',strtotime($dis_month));
                                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                                }
                                                            }
                                                            
                                                            $per_count += 3;

                                                        }else if($month_count == 2){

                                                            if ($divMonth == $requestdividendDate) {

                                                                if (!count($get_divident_date) > 0) {

                                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                                    $s_month = date('m',strtotime($dis_month));
                                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                    $commencement_year[$i]['percentage'][$key] = 2;
                                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                                }
                                                            }   
                                                            
                                                            $per_count += 2;

                                                        }else{
                                                            
                                                            if ($divMonth == $requestdividendDate) {

                                                                if (!count($get_divident_date) > 0) {

                                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                                    $s_month = date('m',strtotime($dis_month));
                                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                    $commencement_year[$i]['percentage'][$key]= 1;
                                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                                }
                                                            } 
                                                            
                                                            $per_count += 1;
                                                        }
                                                        
                                                    } else if ($i == $len - 1) {
                                                        $per_count += 3;

                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }

                                                    }else if(($i !=0)){
                                                        $per_count += 3;

                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];
                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }
                                                    }

                                                    $i++;
                                                }

                                                $len = count($quartersCR)-1;
                                                $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                                $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                                if($per_count != 24){
                                                    $last_val = 24 - $per_count;

                                                    $divMonth = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                            $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                            $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                            $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                            $e_month = date('F', $maturity_dateee);
                                                            $e_month = date('m',strtotime($e_month));
                                                            $e_year = date('Y', $maturity_dateee);

                                                            $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = $last_val;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    } 
                                                }
                                            }
                                        }

                                    } else {

                                        $d = new \DateTime($requestdividendDate);
                                        $formatted_date = $d->format('Y-m-d');

                                        $year = date('Y', strtotime($formatted_date));
                                        $month = date('m', strtotime($formatted_date));

                                        $subscriptionId = $subscription->id;
                                        $get_divident_date = Subscription::with(['Payments'])
                                        ->whereHas('Payments', function($q) use($subscriptionId, $month, $year) {
                                            $q->where('subscription_id', $subscriptionId);
                                            // $q->where('payout_type', '=', 'Dividend');
                                            $q->whereYear('payout_date', '=', $year);
                                            $q->whereMonth('payout_date', '=', $month);
                                        })->get();

                                        $subscription = Subscription::findOrFail($subscription->id);
                                        $subscriptionData['subscriptions'][$key] = $subscription;

                                        $subscriptionDividentDate = date("F Y",strtotime($subscription->Payments[$key]['divident_date']));

                                        if(!empty($subscription->commence_date)){
                                            if(!empty($subscription->maturity_date)){
                                                $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                                
                                                $i = 0;
                                                $per_count = 0;
                                                $len = count($quartersCR);

                                                foreach ($quartersCR as $value) {
                                                    $dis_month = $value->start_month;
                                                    $dis_month_num = $value->start_month_num;
                                                    $dis_year = $value->year;

                                                    $divMonth = $dis_month." ". $dis_year;
                                                        
                                                    if ($i == 1) {

                                                        $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                        $ts2 = strtotime($value->period_start);
                                                        $dyear1 = date('Y', strtotime($ts1));
                                                        $dyear2 = date('Y', $ts2);
                                                        $dmonth1 = date('m', strtotime($ts1));
                                                        $dmonth2 = date('m', $ts2);
                                                        
                                                        $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                        if($month_count == 3){
                                                            
                                                            if ($divMonth == $requestdividendDate) {

                                                                if (!count($get_divident_date) > 0) {

                                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                                    $s_month = date('m',strtotime($dis_month));
                                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                                }
                                                            }
                                                            
                                                            $per_count += 3;

                                                        }else if($month_count == 2){

                                                            if ($divMonth == $requestdividendDate) {

                                                                if (!count($get_divident_date) > 0) {

                                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                                    $s_month = date('m',strtotime($dis_month));
                                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                    $commencement_year[$i]['percentage'][$key] = 2;
                                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                                }
                                                            }   
                                                            
                                                            $per_count += 2;

                                                        }else{
                                                            
                                                            if ($divMonth == $requestdividendDate) {

                                                                if (!count($get_divident_date) > 0) {

                                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                                    $s_month = date('m',strtotime($dis_month));
                                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                    $commencement_year[$i]['percentage'][$key]= 1;
                                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                                }
                                                            } 
                                                            
                                                            $per_count += 1;
                                                        }
                                                        
                                                    } else if ($i == $len - 1) {
                                                        $per_count += 3;

                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }

                                                    }else if(($i !=0)){
                                                        $per_count += 3;

                                                        if ($divMonth == $requestdividendDate) {

                                                            if (!count($get_divident_date) > 0) {

                                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                                $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                                $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                                $commencement_year[$i]['year'][$key] = $dis_year;
                                                                $commencement_year[$i]['month'][$key] = $dis_month;
                                                                $s_month = date('m',strtotime($dis_month));
                                                                $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                                $commencement_year[$i]['percentage'][$key] = 3;
                                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                                            }
                                                        }
                                                    }

                                                    $i++;
                                                }

                                                $len = count($quartersCR)-1;
                                                $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                                $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                                if($per_count != 24){
                                                    $last_val = 24 - $per_count;

                                                    $divMonth = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                            $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                            $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                            $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                            $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                            $e_month = date('F', $maturity_dateee);
                                                            $e_month = date('m',strtotime($e_month));
                                                            $e_year = date('Y', $maturity_dateee);

                                                            $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = $last_val;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    } 
                                                }
                                            }
                                        }
                                    }

                                    
                                } else {


                                }

                            } else {

                                $d = new \DateTime($requestdividendDate);
                                $formatted_date = $d->format('Y-m-d');

                                $year = date('Y', strtotime($formatted_date));
                                $month = date('m', strtotime($formatted_date));

                                $subscriptionId = $subscription->id;
                                $get_divident_date = Subscription::with(['Payments'])
                                ->whereHas('Payments', function($q) use($subscriptionId, $month, $year) {
                                    $q->where('subscription_id', $subscriptionId);
                                    // $q->where('payout_type', '=', 'Dividend');
                                    $q->whereYear('payout_date', '=', $year);
                                    $q->whereMonth('payout_date', '=', $month);
                                })->get();

                                $subscription = Subscription::findOrFail($subscription->id);
                                $subscriptionData['subscriptions'][$key] = $subscription;

                                if(!empty($subscription->commence_date)){
                                    if(!empty($subscription->maturity_date)){
                                        $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                        
                                        $i = 0;
                                        $per_count = 0;
                                        $len = count($quartersCR);

                                        foreach ($quartersCR as $value) {
                                            $dis_month = $value->start_month;
                                            $dis_month_num = $value->start_month_num;
                                            $dis_year = $value->year;

                                            $divMonth = $dis_month." ". $dis_year;
                                                
                                            if ($i == 1) {

                                                $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                                $ts2 = strtotime($value->period_start);
                                                $dyear1 = date('Y', strtotime($ts1));
                                                $dyear2 = date('Y', $ts2);
                                                $dmonth1 = date('m', strtotime($ts1));
                                                $dmonth2 = date('m', $ts2);
                                                
                                                $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                                if($month_count == 3){
                                                    
                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                            $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = 3;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    }
                                                    
                                                    $per_count += 3;

                                                }else if($month_count == 2){

                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                            $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key] = 2;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    }   
                                                    
                                                    $per_count += 2;

                                                }else{
                                                    
                                                    if ($divMonth == $requestdividendDate) {

                                                        if (!count($get_divident_date) > 0) {

                                                            $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                            $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                            $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                            $commencement_year[$i]['status'][$key] = $subscription->status;
                                                            $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                            // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                            $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                            $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                            $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                            $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                            $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                            $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                            $commencement_year[$i]['year'][$key] = $dis_year;
                                                            $commencement_year[$i]['month'][$key] = $dis_month;
                                                            $s_month = date('m',strtotime($dis_month));
                                                            $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                            $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                            $commencement_year[$i]['percentage'][$key]= 1;
                                                            $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                            $commencement_year[$i]['quarterYear'][$key] = $i;
                                                        }
                                                    } 
                                                    
                                                    $per_count += 1;
                                                }
                                                
                                            } else if ($i == $len - 1) {
                                                $per_count += 3;

                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                        $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 3;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                }

                                            }else if(($i !=0)){
                                                $per_count += 3;

                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                        $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 3;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                }
                                            }

                                            $i++;
                                        }

                                        $len = count($quartersCR)-1;
                                        $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                        $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                        if($per_count != 24){
                                            $last_val = 24 - $per_count;

                                            $divMonth = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);

                                            if ($divMonth == $requestdividendDate) {

                                                if (!count($get_divident_date) > 0) {

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                    $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                    $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                    $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                    $e_month = date('F', $maturity_dateee);
                                                    $e_month = date('m',strtotime($e_month));
                                                    $e_year = date('Y', $maturity_dateee);

                                                    $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = $last_val;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                }
                                            } 
                                        }
                                    }
                                }
                            }

                        } else {
                            
                            $d = new \DateTime($requestdividendDate);
                            $formatted_date = $d->format('Y-m-d');

                            $year = date('Y', strtotime($formatted_date));
                            $month = date('m', strtotime($formatted_date));

                            $subscriptionId = $subscription->id;
                            $get_divident_date = Subscription::with(['Payments'])
                            ->whereHas('Payments', function($q) use($subscriptionId, $month, $year) {
                                $q->where('subscription_id', $subscriptionId);
                                // $q->where('payout_type', '=', 'Dividend');
                                $q->whereYear('payout_date', '=', $year);
                                $q->whereMonth('payout_date', '=', $month);
                            })->get();

                            $subscription = Subscription::findOrFail($subscription->id);
                            $subscriptionData['subscriptions'][$key] = $subscription;

                            if(!empty($subscription->commence_date)){
                                if(!empty($subscription->maturity_date)){
                                    $quartersCR = $this->get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                                    
                                    $i = 0;
                                    $per_count = 0;
                                    $len = count($quartersCR);

                                    foreach ($quartersCR as $value) {
                                        $dis_month = $value->start_month;
                                        $dis_month_num = $value->start_month_num;
                                        $dis_year = $value->year;

                                        $divMonth = $dis_month." ". $dis_year;
                                            
                                        if ($i == 1) {

                                            $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                            $ts2 = strtotime($value->period_start);
                                            $dyear1 = date('Y', strtotime($ts1));
                                            $dyear2 = date('Y', $ts2);
                                            $dmonth1 = date('m', strtotime($ts1));
                                            $dmonth2 = date('m', $ts2);
                                            
                                            $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                            if($month_count == 3){
                                                
                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                        $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 3;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                }
                                                
                                                $per_count += 3;

                                            }else if($month_count == 2){

                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                        $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key] = 2;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*2)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                }   
                                                
                                                $per_count += 2;

                                            }else{
                                                
                                                if ($divMonth == $requestdividendDate) {

                                                    if (!count($get_divident_date) > 0) {

                                                        $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                        $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                        $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                        $commencement_year[$i]['status'][$key] = $subscription->status;
                                                        $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                        // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                        $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                        $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                        $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                        $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                        $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                                        $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                        $commencement_year[$i]['year'][$key] = $dis_year;
                                                        $commencement_year[$i]['month'][$key] = $dis_month;
                                                        $s_month = date('m',strtotime($dis_month));
                                                        $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                        $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                        $commencement_year[$i]['percentage'][$key]= 1;
                                                        $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*1)/100;
                                                        $commencement_year[$i]['quarterYear'][$key] = $i;
                                                    }
                                                } 
                                                
                                                $per_count += 1;
                                            }
                                            
                                        } else if ($i == $len - 1) {
                                            $per_count += 3;

                                            if ($divMonth == $requestdividendDate) {

                                                if (!count($get_divident_date) > 0) {

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                }
                                            }

                                        }else if(($i !=0)){
                                            $per_count += 3;

                                            if ($divMonth == $requestdividendDate) {

                                                if (!count($get_divident_date) > 0) {

                                                    $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                    $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                    $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                    $commencement_year[$i]['status'][$key] = $subscription->status;
                                                    $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                    // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                    $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                    $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                    $commencement_year[$i]['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                                    $commencement_year[$i]['quarter'][$key] = $dis_month." ". $dis_year;
                                                    $commencement_year[$i]['year'][$key] = $dis_year;
                                                    $commencement_year[$i]['month'][$key] = $dis_month;
                                                    $s_month = date('m',strtotime($dis_month));
                                                    $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                                    $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                    $commencement_year[$i]['percentage'][$key] = 3;
                                                    $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*3)/100;
                                                    $commencement_year[$i]['quarterYear'][$key] = $i;
                                                }
                                            }
                                        }

                                        $i++;
                                    }

                                    $len = count($quartersCR)-1;
                                    $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                    $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                    if($per_count != 24){
                                        $last_val = 24 - $per_count;

                                        $divMonth = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);

                                        if ($divMonth == $requestdividendDate) {

                                            if (!count($get_divident_date) > 0) {

                                                $commencement_year[$i]['subscription_id'][$key] = $subscription->id;
                                                $commencement_year[$i]['user_id'][$key] = $subscription->user_id;
                                                $commencement_year[$i]['fund_type'][$key] = $subscription->fund_type;
                                                $commencement_year[$i]['status'][$key] = $subscription->status;
                                                $commencement_year[$i]['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                                // $commencement_year[$i]['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                                $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                                $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                                $commencement_year[$i]['investor_name'][$key] = $userName . $userJointAccountName;

                                                $commencement_year[$i]['investment_amount'][$key] = $subscription->initial_investment;
                                                $commencement_year[$i]['full'][$key] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                                $commencement_year[$i]['quarter'][$key] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                                $commencement_year[$i]['year'][$key] = date('Y', $maturity_dateee);
                                                $commencement_year[$i]['month'][$key] = date('F', $maturity_dateee);
                                                $e_month = date('F', $maturity_dateee);
                                                $e_month = date('m',strtotime($e_month));
                                                $e_year = date('Y', $maturity_dateee);

                                                $dividendDate = $e_year.'-'.$e_month.'-'."15";
                                                $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                                $commencement_year[$i]['percentage'][$key] = $last_val;
                                                $commencement_year[$i]['amount'][$key] = ($subscription->initial_investment*$last_val)/100;
                                                $commencement_year[$i]['quarterYear'][$key] = $i;
                                            }
                                        } 
                                    }
                                }
                            }

                        }
            
                    }
                }
            }

        } else {

            if(!empty($users)) {
                foreach ($users as $key => $user){
                    foreach ($user->subscriptions as $key => $subscription){

                        if ($subscription->Payments->count() <= 8 ) {

                            $subscription = Subscription::findOrFail($subscription->id);
                            $subscriptionData['subscriptions'][$key] = $subscription;

                            if(!empty($subscription->commence_date)){
                                if(!empty($subscription->maturity_date)){

                                    $commencement_year['subscription_id'][$key] = $subscription->id;
                                    $commencement_year['user_id'][$key] = $subscription->user_id;
                                    $commencement_year['fund_type'][$key] = $subscription->fund_type;
                                    $commencement_year['status'][$key] = $subscription->status;
                                    $commencement_year['investment_id'][$key] = $subscription->reference_no . $subscription->refreance_id;
                                    // $commencement_year['investor_name'][$key] = $subscription->User['first_name'] . $subscription->User['last_name'];

                                    $userName = $subscription->User['salutation'] . $subscription->User['first_name'] . $subscription->User['last_name'];  
                                    $userJointAccountName = $subscription->is_joint_applicant == 1 ? " & ". $subscription->ja_salutation."  ".$subscription->ja_name : '';
                                    $commencement_year['investor_name'][$key] = $userName . $userJointAccountName;

                                    $commencement_year['investment_amount'][$key] = $subscription->initial_investment;

                                    $dis_month = date('F',strtotime($requestPayoutDate));
                                    $dis_year = date('Y',strtotime($requestPayoutDate));

                                    $commencement_year['quarter'][$key] = $dis_month." ". $dis_year;
                                    $commencement_year['year'][$key] = $dis_year;
                                    $commencement_year['month'][$key] = $dis_month;
                                    $commencement_year['quarterYear'][$key] = $key+1;

                                    // $yrdata= strtotime('2013-08-14');
                                    // echo date('M-Y', $yrdata);

                                    // $commencement_year['full'][$key] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                    // $s_month = date('m',strtotime($dis_month));
                                    // $dividendDate = $dis_year.'-'.$s_month.'-'."15";
                                    // $commencement_year[$i]['date'][$key] = date('Y-m-d', strtotime($dividendDate));
                                }
                            }
                        }
                    }
                }
            }

        }

        $data['commencement_year'] = $commencement_year;
        $data['user'] = $userData;

        return response()->json(['data' => $data, 'error' => 0], 200);
    }

    public function reviewDividentPayout(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $user = User::findOrFail($request->get('userId'));
        $fundId = $request->get('fund_id');
        $fundName = $request->get('fund_name');

        $requestData = $request->all();

        // Quater Date's convertion

        $divident_date = $requestData['divident_date'];
        $divident_date = strtotime($divident_date);
        $month_firstdate = strtotime(date("Y-m-d", $divident_date )); //first date

        $monthFirstDate = date('jS F `y', strtotime("-3 months", $month_firstdate));
        $month_firstdate2 = strtotime("-3 months", $month_firstdate);

        //add two months
        $add_two_months = strtotime("+2 months", $month_firstdate2);
        $month_firstdate3 = strtotime(date("Y-m-t", $add_two_months ));
        $addTwoMonths = date('jS F `y', $month_firstdate3);

        $dividendQuaterDates = $monthFirstDate . ' - ' .$addTwoMonths;

        // Quater Date's convertion

        $dividendData = array();
        $dividendData['global_payout_type'] = $request->get('payout_type');
        $dividendData['investor_name'] = $requestData['investor_name'];
        $dividendData['fund_type'] = $getGlobalFund;
        $dividendData['fundId'] = $fundId;
        $dividendData['fund_name'] = $fundName;

        if (count($request->get('subscription_id')) > 0 ) {
            for ($i=0; $i < count($request->get('subscription_id')); $i++) { 
                
                if ($requestData['fund_type'][$i] == $fundId) {

                    $subscriptionStatus = $requestData['status'][$i];

                    if($subscriptionStatus  ==0){
                        $dividendData['status'][] = 'Draft';
                    }else if($subscriptionStatus == 1){
                        $dividendData['status'][] = 'Pending Funding';
                    }else if($subscriptionStatus == 2){
                        $dividendData['status'][] = 'Incomplete';
                    }else if($subscriptionStatus == 3){
                        $dividendData['status'][] = 'Active';
                    }else if($subscriptionStatus == 4){
                        $dividendData['status'][] = 'De-Active';
                    }else if($subscriptionStatus == 5){
                        $dividendData['status'][] = 'Rejected';
                    }else if($subscriptionStatus == 6){
                        $dividendData['status'][] = 'Matured';
                    }else if($subscriptionStatus == 7){
                        $dividendData['status'][] = 'Premature Redemption';
                    }else{
                        $dividendData['status'][] = 'In-active';
                    }

                    $dividendData['subscription'][] = Subscription::findOrFail($requestData['subscription_id'][$i]);
                    $payout_type = $requestData['payout_type'];
                    
                    if ($payout_type == "Dividend") {
                        $divident_date = $requestData['divident_date'];
                        $payout_date = $requestData['payout_date'];
                        $dividendData['payout_date'][] = $payout_date;

                    } else {
                        $divident_date = $requestData['payout_date1'];
                        $dividendData['payout_date'][] = $divident_date;
                    }

                    $reference = $requestData['reference'];
                    $dividendData['reference'][] = $reference;
                    $dividendData['payout_type'][] = $payout_type;


                    $dividendData['distribution_date'][] = $divident_date;
                    $dividendData['investment_id'][] = $requestData['investment_no'][$i];
                    $dividendData['principal_amount'][] = $requestData['subscription_amount'][$i];

                    if ($payout_type == "Dividend") {
                        $dividendData['dividend_percentage'][] = $requestData['percentage'][$i];
                    } else {
                        $dividendData['dividend_percentage'][] = '';
                    }
                    
                    $dividendData['dividend_earned_amount'][] = $requestData['amount'][$i];

                    $dateTime=strtotime($divident_date);
                    $month=date("F",$dateTime);
                    $year=date("Y",$dateTime);

                    $dividendData['dividend_quarter_date'][] = "$month $year";
                    $dividendData['dividend_month'][] = $month;
                    $dividendData['dividend_year'][] = $year;

                    $dividendData['dividend_quater_dates'] = $dividendQuaterDates;

                } else {
                    return response()->json(['data' => "empty", 'error' => 1, 'msg' => "No records were found for the selected fund!"], 200);
                }
            }

        } else {
            return response()->json(['data' => "null", 'error' => 1, 'msg' => "Something Went Wrong. Please, try again."], 200);
        }

        $emailUserData = array('user' => $user, 'dividend' => $dividendData);
        if($user->role_id == 2){
            $pdf = \PDF::loadView('pdf.dividentPayment', $emailUserData);
        }else{ 
            $pdf = \PDF::loadView('pdf.company.dividentPayment', $emailUserData);
        }

        $path = public_path('pdf/docs/dividentPayment');
        $fileName =  'dividentPayment'.$user->id.'.'. 'pdf';

        if (File::exists(public_path('pdf/docs/dividentPayment/'.$fileName))) {
            File::delete(public_path('pdf/docs/dividentPayment/'.$fileName));
        }

        $pdf->save($path . '/' . $fileName);

        if(!empty($fileName)){
            return response()->json(['data' => "success", 'filename' => $fileName, 'user_id' => $user->id], 201);  
        }
    }

    public function ajaxDividentSave(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $user = User::findOrFail($request->get('userId'));
        $requestData = $request->all();

        $subscriptionUser = Subscription::where('user_id', $user->id)->first();

        $payout_type = $requestData['payout_type'];
        $subscriptionData['payout_type'] = $payout_type;

        if ($payout_type == "Dividend") {

            // Quater Date's convertion

            $divident_date = $requestData['divident_date'];
            $divident_date = strtotime($divident_date);
            $month_firstdate = strtotime(date("Y-m-d", $divident_date )); //first date

            $monthFirstDate = date('jS F `y', strtotime("-3 months", $month_firstdate));
            $month_firstdate2 = strtotime("-3 months", $month_firstdate);

            //add two months
            $add_two_months = strtotime("+2 months", $month_firstdate2);
            $month_firstdate3 = strtotime(date("Y-m-t", $add_two_months ));
            $addTwoMonths = date('jS F `y', $month_firstdate3);

            $dividendQuaterDates = $monthFirstDate . ' - ' .$addTwoMonths;
            
            // Quater Date's convertion


            $divident_date = $requestData['divident_date'];
            $divident_date = strtotime($divident_date);

            $month_firstdate = strtotime(date("Y-m-d", $divident_date )); //first date
            $subscriptionData['month_firstdate'] = date('jS F Y', strtotime("-3 months", $month_firstdate));

            $month_firstdate2 = strtotime("-3 months", $month_firstdate);

            //add two months
            $add_two_months = strtotime("+2 months", $month_firstdate2);
            $month_firstdate3 = strtotime(date("Y-m-t", $add_two_months ));
            $subscriptionData['add_two_months'] = date('jS F Y', $month_firstdate3);

            $month_lastdate = strtotime(date("Y-m-t", $month_firstdate2 )); //last date
            $subscriptionData['month_lastdate'] = date('jS F Y', $month_lastdate);

            $payment_date = $requestData['payout_date'];
            $subscriptionData['dividend_payout_date'] = $payment_date;
            $payment_date = strtotime($payment_date);
            $subscriptionData['payment_date'] = date('D\, jS  F Y', $payment_date);

        } else {

            $subscriptionData['month_firstdate'] = '';
            $subscriptionData['add_two_months'] = '';
            $subscriptionData['month_lastdate'] = '';
            $payment_date = $requestData['payout_date1'];
            $payment_date = strtotime($payment_date);
            $subscriptionData['payment_date'] = date('D\, jS  F Y', $payment_date);
            $dividendQuaterDates = '';
        }

        $dividendData = array();
        $dividendData['global_payout_type'] = $request->get('payout_type');
        $dividendData['investor_name'] = $requestData['investor_name'];
        $dividendData['fund_type'] = $getGlobalFund;
        $dividendData['fundId'] = $subscriptionUser->fund_type;

        if (count($request->get('subscription_id')) > 0 ) {
            for ($i=0; $i < count($request->get('subscription_id')); $i++) { 
                
                if ($requestData['fund_type'][$i] == $getGlobalFund) {

                    $subscriptionStatus = $requestData['status'][$i];
                    if($subscriptionStatus  ==0){
                        $dividendData['status'][] = 'Draft';
                    }else if($subscriptionStatus == 1){
                        $dividendData['status'][] = 'Pending Funding';
                    }else if($subscriptionStatus == 2){
                        $dividendData['status'][] = 'Incomplete';
                    }else if($subscriptionStatus == 3){
                        $dividendData['status'][] = 'Active';
                    }else if($subscriptionStatus == 4){
                        $dividendData['status'][] = 'De-Active';
                    }else if($subscriptionStatus == 5){
                        $dividendData['status'][] = 'Rejected';
                    }else if($subscriptionStatus == 6){
                        $dividendData['status'][] = 'Matured';
                    }else if($subscriptionStatus == 7){
                        $dividendData['status'][] = 'Premature Redemption';
                    }else{
                        $dividendData['status'][] = 'In-active';
                    }

                    $dividendData['subscription'][] = Subscription::findOrFail($requestData['subscription_id'][$i]);
                    $payout_type = $requestData['payout_type'];
                    
                    if ($payout_type == "Dividend") {
                        $divident_date = $requestData['divident_date'];
                        $payout_date = $requestData['payout_date'];
                        $dividendData['payout_date'][] = $payout_date;

                    } else {
                        $divident_date = $requestData['payout_date1'];
                        $dividendData['payout_date'][] = $divident_date;
                    }

                    $reference = $requestData['reference'];
                    $dividendData['reference'][] = $reference;
                    $dividendData['payout_type'][] = $payout_type;


                    $dividendData['distribution_date'][] = $divident_date;
                    $dividendData['investment_id'][] = $requestData['investment_no'][$i];
                    $dividendData['principal_amount'][] = $requestData['subscription_amount'][$i];

                    if ($payout_type == "Dividend") {
                        $dividendData['dividend_percentage'][] = $requestData['percentage'][$i];
                    } else {
                        $dividendData['dividend_percentage'][] = '';
                    }

                    $dividendData['dividend_earned_amount'][] = $requestData['amount'][$i];

                    $dateTime=strtotime($divident_date);
                    $month=date("F",$dateTime);
                    $year=date("Y",$dateTime);

                    $dividendData['dividend_quarter_date'][] = "$month $year";
                    $dividendData['dividend_month'][] = $month;
                    $dividendData['dividend_year'][] = $year;

                    $dividendData['dividend_quater_dates'] = $dividendQuaterDates;

                } else {

                    $subscriptionStatus = $requestData['status'][$i];
                    if($subscriptionStatus  ==0){
                        $dividendData['status'][] = 'Draft';
                    }else if($subscriptionStatus == 1){
                        $dividendData['status'][] = 'Pending Funding';
                    }else if($subscriptionStatus == 2){
                        $dividendData['status'][] = 'Incomplete';
                    }else if($subscriptionStatus == 3){
                        $dividendData['status'][] = 'Active';
                    }else if($subscriptionStatus == 4){
                        $dividendData['status'][] = 'De-Active';
                    }else if($subscriptionStatus == 5){
                        $dividendData['status'][] = 'Rejected';
                    }else if($subscriptionStatus == 6){
                        $dividendData['status'][] = 'Matured';
                    }else if($subscriptionStatus == 7){
                        $dividendData['status'][] = 'Premature Redemption';
                    }else{
                        $dividendData['status'][] = 'In-active';
                    }

                    $dividendData['subscription'][] = Subscription::findOrFail($requestData['subscription_id'][$i]);
                    $payout_type = $requestData['payout_type'];
                    
                    if ($payout_type == "Dividend") {
                        $divident_date = $requestData['divident_date'];
                        $payout_date = $requestData['payout_date'];
                        $dividendData['payout_date'][] = $payout_date;

                    } else {
                        $divident_date = $requestData['payout_date1'];
                        $dividendData['payout_date'][] = $divident_date;
                    }

                    $reference = $requestData['reference'];
                    $dividendData['reference'][] = $reference;
                    $dividendData['payout_type'][] = $payout_type;


                    $dividendData['distribution_date'][] = $divident_date;
                    $dividendData['investment_id'][] = $requestData['investment_no'][$i];
                    $dividendData['principal_amount'][] = $requestData['subscription_amount'][$i];

                    if ($payout_type == "Dividend") {
                        $dividendData['dividend_percentage'][] = $requestData['percentage'][$i];
                    } else {
                        $dividendData['dividend_percentage'][] = '';
                    }

                    $dividendData['dividend_earned_amount'][] = $requestData['amount'][$i];

                    $dateTime=strtotime($divident_date);
                    $month=date("F",$dateTime);
                    $year=date("Y",$dateTime);

                    $dividendData['dividend_quarter_date'][] = "$month $year";
                    $dividendData['dividend_month'][] = $month;
                    $dividendData['dividend_year'][] = $year;

                    $dividendData['dividend_quater_dates'] = $dividendQuaterDates;
                }
            }

        } else {

            return response()->json(['data' => "null", 'error' => 1, 'msg' => "The Dividend Payments could not be saved. Please, try again."], 200);
        }

        $emailUserData = array('user' => $user, 'dividend' => $dividendData);

        //Make PDF
        if($user->role_id == 2){
            $pdf = \PDF::loadView('pdf.dividentPayment', $emailUserData);
        }else{ 
            $pdf = \PDF::loadView('pdf.company.dividentPayment', $emailUserData);
        }

        $path = public_path('pdf/docs/dividentPayment');
        $fileName =  'dividentPayment'.$user->id.'.'. 'pdf';

        if (File::exists(public_path('pdf/docs/dividentPayment/'.$fileName))) {
            File::delete(public_path('pdf/docs/dividentPayment/'.$fileName));
        }

        $pdf->save($path . '/' . $fileName);
        $attach = public_path('pdf/docs/dividentPayment/'.$fileName);

        if(!empty($attach)){
            $attachment = $attach;
        }else{
            $attachment = "";
        }

        //Send Mail
        if ($request->get('divident_mail_status') == "1") {
            if(!empty($fileName)){

                // /Email for User
                sendDividentPaymentMail($user, $attachment, $subscriptionData);
            }
        }
        

        $requestInputData = $request->all();
        if (count($request->get('subscription_id')) > 0 ) {
            for ($i=0; $i < count($request->get('subscription_id')); $i++) {

                $requestSaveData['subscription_id'] = $requestInputData['subscription_id'][$i];
                $divident_date = $requestInputData['divident_date'];
                if (!empty($divident_date)) {
                    $divident_date = date("Y-m-d",strtotime($divident_date));
                } else {
                    $divident_date = null;
                }

                $payout_type = $requestInputData['payout_type'];
                if($payout_type == "Bonus"){ 
                    $requestSaveData['payout_date'] = $requestInputData['payout_date1'];
                } else {
                    $requestSaveData['payout_date'] = $requestInputData['payout_date'];
                }

                $requestSaveData['payout_type'] = $payout_type;
                $requestSaveData['divident_date'] = $divident_date;
                $requestSaveData['amount'] = $requestInputData['amount'][$i];

                if($payout_type == "Bonus"){ 
                    $requestSaveData['percentage'] = null;
                } else {
                    $requestSaveData['percentage'] = $requestInputData['percentage'][$i];
                }

                $requestSaveData['reference'] = $requestInputData['reference'];

                $attachment= $requestInputData['file'];
                if($attachment == "undefined"){
                    $requestSaveData['file'] = null;
                } else{
                    $fileName = time().'_'.$attachment->getClientOriginalName();
                    $filePath = $attachment->storeAs('payment', $fileName, 'public');
                    $requestSaveData['file'] = $filePath; 
                }

                $payment = Payment::create($requestSaveData);
            }

        } else {
            return response()->json(['data' => "null", 'error' => 1, 'msg' => "The Dividend Payments could not be saved. Please, try again."], 200);
        }

        if ($payment) {
            return response()->json(['data' => $payment, 'error' => 0, 'msg' => "The Dividend Payments has been saved"], 200);
        }
        return response()->json(['data' => "null", 'error' => 1, 'msg' => "The Dividend Payments could not be saved. Please, try again."], 200);
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

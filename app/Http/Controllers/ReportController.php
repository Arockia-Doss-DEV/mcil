<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subscription;
use App\Models\User;
use Setting;
use Carbon\Carbon;
use Auth;
use File;
use DB;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();
        $cond = [];

        $status = $request->get('status');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $q = $request->get('query');

        if($getGlobalFund == "All"){

            if(!empty($status) or $status != ""){

                $cond = [
                    ['draft', '=', 0],
                    ['draft_delete', '=', 0],
                ];

            } else {

                $cond = [
                    ['draft', '=', 0],
                    ['draft_delete', '=', 0],
                ];
            }

        }else{

            if(!empty($status) or $status != ""){

                $cond = [
                    ['draft', '=', 0],
                    ['draft_delete', '=', 0],
                    ['fund_type', '=', $getGlobalFund],
                ];

            } else {

                $cond = [
                    ['draft', '=', 0],
                    ['draft_delete', '=', 0],
                    ['fund_type', '=', $getGlobalFund],
                ];
            }
        }

        // return $cond;
        // return $status;

        if(request()->isMethod('get')){

            if($q!=""){

                $subscriptions = Subscription::whereHas('User', function($query) use($q) {
                    $query->where('first_name', 'like', '%'.$q.'%');
                })
                ->where($cond)
                ->orWhere('reference_no','LIKE','%'.$q.'%')
                ->orWhere('refreance_id', 'LIKE','%'.$q.'%')
                ->orWhere('remittance_bank', 'LIKE','%'.$q.'%')
                ->orWhere('payee_name', 'LIKE','%'.$q.'%')
                ->orWhere('account_number', 'LIKE','%'.$q.'%')
                ->orderBy('id', 'DESC')
                ->paginate(10);

                // $subscriptions->appends(['query' => $q]);

            } else {

                $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState', 'Payments');
                $subscriptions = $subscriptions->where($cond);
                if (!empty($status) or $status != "") {

                    $obj = new \stdClass;
                    foreach($status as $key => $value){
                        $obj->{$key} = $value;
                    }
                    $status = (array) $obj;
                    // return $status;
                    $subscriptions = $subscriptions->whereIn('status', $status);
                }

                if (!empty($start_date)) {

                    $start_date = Carbon::parse($start_date)->format('Y-m-d');
                    $end_date = Carbon::parse($end_date)->format('Y-m-d'); 

                    $subscriptions = $subscriptions->whereBetween('created_at',[$start_date,$end_date]);
                }

                $subscriptions = $subscriptions->paginate(10);
            }

            // return $subscriptions;

            if ($request->ajax()) {
                return view('report.child', ['subscriptions' => $subscriptions])->render();
            } else {

                $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState', 'Payments')->where($cond)->paginate(10);

                return view('report.index', compact('subscriptions'));
            }
        } 

        return view('report.index', compact('subscriptions'));
    }

    public function reinvestmentReport(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        $cond = [];

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        if($getGlobalFund == "All"){

            $cond = [
                ['status', '=', 3],
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
                ['is_reinvestment', '=', 1],
            ];

        }else{

            $cond = [
                ['status', '=', 3],
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
                ['is_reinvestment', '=', 1],
                ['fund_type', '=', $getGlobalFund],
            ];
        }

        // return $cond;

        $q =  $request->get('query');
        if($q!=""){

            $subscriptions = Subscription::whereHas('User', function($query) use($q) {
                $query->where('first_name', 'like', '%'.$q.'%');
            })
            ->where($cond)
            ->orWhere('reference_no','LIKE','%'.$q.'%')
            ->orWhere('refreance_id', 'LIKE','%'.$q.'%')
            ->orWhere('remittance_bank', 'LIKE','%'.$q.'%')
            ->orWhere('payee_name', 'LIKE','%'.$q.'%')
            ->orWhere('account_number', 'LIKE','%'.$q.'%')
            ->orderBy('id', 'DESC')
            ->paginate(10);

            // $subscriptions->appends(['query' => $q]);

        } else {

            $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState');
            $subscriptions = $subscriptions->where($cond);
            if (!empty($start_date)) {

                $start_date = Carbon::parse($start_date)->format('Y-m-d');
                $end_date = Carbon::parse($end_date)->format('Y-m-d');

                $subscriptions = $subscriptions->whereBetween('created_at',[$start_date,$end_date]);
            }
            $subscriptions = $subscriptions->paginate(10);
        }

        if ($request->ajax()) {
            return view('report.reinvestment.child', ['subscriptions' => $subscriptions])->render();
        } else {

            $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState')
                            ->where($cond)
                            ->paginate(10);

            return view('report.reinvestment.index', compact('subscriptions'));
        }
    }

    public function contractSummeryExcel(Request $request)
    {
        ob_start();
        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        $cond = [];

        if($getGlobalFund == "All"){

        }else{
            $fundCond['fund_type'] = $getGlobalFund;
        }

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        $status = $request->get('status');

        $status = explode(',', $status);

        if(!empty($status) or $status != ""){

            $cond = [
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
            ];
            $cond = array_merge($cond, $fundCond);

        } else {

            $cond = [
                ['draft', '=', 0],
                ['draft_delete', '=', 0],
            ];
            $cond = array_merge($cond, $fundCond);
        }

        $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState', 'Payments');
        $subscriptions = $subscriptions->where($cond);
        if (!empty($status) or $status != "") { 

            $subscriptions = $subscriptions->whereIn('status', $status);
        }
        if (!empty($start_date)) {

            $start_date = Carbon::parse($start_date)->format('Y-m-d');
            $end_date = Carbon::parse($end_date)->format('Y-m-d');

            $subscriptions = $subscriptions->whereBetween('created_at',[$start_date,$end_date]);
        }
        $subscriptions = $subscriptions->get();

        // return $subscriptions;

        // return $subscriptions;

        // $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState', 'Payments')
        //                     ->where($cond)
        //                     ->whereBetween('created_at',[$start_date,$end_date])
        //                     ->get();

        // return $subscriptions;

        $spreadsheet = new Spreadsheet(); 
        $sheet = $spreadsheet->getActiveSheet(); 
                                
        //Headings
        $output_table_thead = array();
        $output_table_thead['no']="NO";
        $output_table_thead['salution']="SALUTATION";
        $output_table_thead['name']="NAME (PLUS) JOINT APPLICANT";
        $output_table_thead['investment_type']="INVESTMENT TYPE";
        $output_table_thead['amount']="PRINCIPAL INVESTMENT (USD)";
        $output_table_thead['investment_id']="INVESTMENT ID";
        $output_table_thead['comm_date']="COMMENCEMENT DATE";

        // $output_table_thead['divident_perc']="DIVIDEND %";
        // $output_table_thead['divident_amount']="DIVIDEND (USD)";

        $output_table_thead['bank']="BANK";
        $output_table_thead['account_name']="ACCOUNT NAME";
        $output_table_thead['bank_account']="BANK ACCOUNT";
        $output_table_thead['swift_code']="SWIFT CODE";
        $output_table_thead['total_divident']="TOTAL DIVIDEND (USD)";
        $output_table_thead['orginal_investment_id']="ORIGINAL INVESTMENT ID";

        $col1 = 1;
        $row1 = 1;  
        foreach ($output_table_thead as $thead){
            $sheet->setCellValueByColumnAndRow($col1, $row1, $thead);
            $col1++;     
        }

        $col2 = 1;
        $row2 = 2;
        $i =1;
        $invest_total = 0;
        foreach ($subscriptions as $subscription){

            $user_id = $subscription->user_id;
            if(!empty($user_id)){

                $user = User::with('countryAs','stateAs','mobilePrefix','individual','company')->findOrFail($user_id);

                if(!empty($user)){
                    if($user->role_id == 3){
                        $salutation = str_replace(".", "", $user->company->salutation);
                        $gender = ''; 
                    }else if($user->role_id == 2){
                        $salutation = str_replace(".", "", $user->individual->salutation);
                        $gender = $user->has('individual') ? $user->individual->gender : '';
                    }

                    if($subscription->is_first == 1){
                        $investment_type = "";
                    }else if($subscription->is_reinvestment == 1){
                        $investment_type = "RE INVESTMENT";
                    } else {
                        $investment_type = "TOP UP";
                    }

                    if ($subscription->is_joint_applicant) {
                        $joint_applicant_name = " + " . $subscription->ja_name;
                    } else {
                        $joint_applicant_name = "";
                    }

                    $name = $user->first_name.$user->last_name.$joint_applicant_name;
                    $home_address =  $user->address_line1." ".$user->address_line2." ".$user->city." ".$user->post_code." ".$user->stateAs->name." ".$user->countryAs->name;

                }else{
                    $salutation = "";
                    $name = "";
                    $gender = '';
                    $home_address = "";
                }

            } else{
                $salutation = "";
                $name = "";
                $gender = '';
                $home_address = "";
            }

            if(!empty($subscription->commence_date)){
                $commence_date = date('Y-M-d', strtotime($subscription->commence_date));
            }else{
                $commence_date = "-";
            }

            if ($subscription->Payments->count() > 0) {
                $divident_percentage = 0;
                $divident_amount = 0;
                $total_divident_amount = 0;

                foreach ($subscription->Payments as $key => $payment) {
                   
                   $total_divident_amount += $payment['amount'];
                }

            } else {
                $divident_percentage = 0;
                $divident_amount = 0;
                $total_divident_amount = 0;
            }

            if(!empty($subscription->remittance_bank)){
                $bank_name = $subscription->remittance_bank;
            } else {
                $bank_name = "";
            }

            if(!empty($subscription->payee_name)){
                $account_name = $subscription->payee_name;
            } else {
                $account_name = "";
            }

            if(!empty($subscription->account_number)){
                $account_number = $subscription->account_number;
            } else {
                $account_number = "";
            }

            if(!empty($subscription->swift_code)){
                $swift_code = $subscription->swift_code;
            } else {
                $swift_code = "";
            }

            if(!empty($subscription->reinvestment_parant_id)){
                $reinvestment_parant_id = $subscription->reinvestment_parant_id;
                $old_subscription = Subscription::findOrFail($reinvestment_parant_id);

                if(!empty($old_subscription['draft_refrence_id'])){
                    if(($old_subscription['status'] == 3) || ($old_subscription['status'] == 6)){
                        $original_investment_no = $old_subscription['reference_no'].$old_subscription['refreance_id'];
                    }else{
                        $original_investment_no = $old_subscription['draft_refrence_id']."-".$old_subscription['reference_no'].$old_subscription['refreance_id'];
                    }
                }else{
                    $original_investment_no = $old_subscription['reference_no'].$old_subscription['refreance_id'];
                }

            } else {
                $original_investment_no = "";
            }

            if(!empty($subscription['draft_refrence_id'])){
                if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                    $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                }else{
                    $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                }
            }else{
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }

            $banking_address = $subscription->address_line_1." ".$subscription->address_line_2." ".$subscription->city." ".$subscription->postcode." ".$subscription->SubscriptionState->name." ".$subscription->SubscriptionCountry->name;

            $sheet->setCellValueByColumnAndRow($col2, $row2, $i);
            $sheet->setCellValueByColumnAndRow($col2+1, $row2, $salutation);
            $sheet->setCellValueByColumnAndRow($col2+2, $row2, $name);
            $sheet->setCellValueByColumnAndRow($col2+3, $row2, $investment_type);
            $sheet->setCellValueByColumnAndRow($col2+4, $row2, $subscription['initial_investment']);
            $sheet->setCellValueByColumnAndRow($col2+5, $row2, $investment_no);
            $sheet->setCellValueByColumnAndRow($col2+6, $row2, $commence_date);
            
            // $sheet->setCellValueByColumnAndRow($col2+7, $row2, $divident_percentage);
            // $sheet->setCellValueByColumnAndRow($col2+8, $row2, $divident_amount);

            $sheet->setCellValueByColumnAndRow($col2+7, $row2, $bank_name);
            $sheet->setCellValueByColumnAndRow($col2+8, $row2, $account_name);
            $sheet->setCellValueByColumnAndRow($col2+9, $row2, $account_number);
            $sheet->setCellValueByColumnAndRow($col2+10, $row2, $swift_code);
            $sheet->setCellValueByColumnAndRow($col2+11, $row2, $total_divident_amount);
            $sheet->setCellValueByColumnAndRow($col2+12, $row2, $original_investment_no);
                
            $row2++;
            $i++;
        }

        $writer = new Xlsx($spreadsheet); 
        $rand = rand();
        $path = public_path('img/reports');
        $fileName =  time().'_'.'contract-summary'.'.'. 'xlsx';

        if (File::exists(public_path('img/reports/'.$fileName))) {
            File::delete(public_path('img/reports/'.$fileName));
        }

        $writer->save($path . '/' . $fileName);

        if(!empty($fileName)){
           $file = $fileName;
        }

        return response()->json(['data' => "success", 'filename' => $file], 201);
    }

    public function reinvestmentExcel(Request $request)
    {
        ob_start();
        $getGlobalFund = getDefaultGlobalFund();

        $fundCond = [];
        $cond = [];

        if($getGlobalFund == "All"){

        }else{
            $fundCond['fund_type'] = $getGlobalFund;
        }

        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

        $cond = [
            ['status', '=', 3],
            ['draft', '=', 0],
            ['draft_delete', '=', 0],
            ['is_reinvestment', '=', 1],
        ];

        $cond = array_merge($cond, $fundCond);

        $subscriptions = Subscription::with('User', 'SubscriptionCountry', 'SubscriptionState')
                            ->where($cond)
                            ->whereBetween('created_at',[$start_date,$end_date])
                            ->get();

        $spreadsheet = new Spreadsheet(); 
        $sheet = $spreadsheet->getActiveSheet(); 
    
        $output_table_thead = array();
        $output_table_thead['no']="NO";
        $output_table_thead['salution']="SALUTATION";
        $output_table_thead['name']="NAME";
        $output_table_thead['amount']="PRINCIPAL INVESTMENT (USD)";
        $output_table_thead['investment_id']="INVESTMENT ID";
        $output_table_thead['comm_date']="COMMENCEMENT DATE";
        $output_table_thead['hedge']="HEDGE (USD)";
        $output_table_thead['home_address']="HOME ADDRESS";
        $output_table_thead['banking_address']="BANKING ADDRESS";
        $output_table_thead['gender']="GENDER";
        $output_table_thead['remarks']="REMARKS";
            

        $col1 = 1;
        $row1 = 1;  
        foreach ($output_table_thead as $thead){
            $sheet->setCellValueByColumnAndRow($col1, $row1, $thead);
            $col1++;     
        }                    

        $col2 = 1;
        $row2 = 2;
        $i =1;
        $invest_total = 0;

        foreach ($subscriptions as $subscription){

            $user_id = $subscription->user_id;
            if(!empty($user_id)){
                $user = User::with('countryAs','stateAs','mobilePrefix','individual','company')->findOrFail($user_id);
        
                if(!empty($user)){
                    if($user->role_id == 3){
                        $salutation = str_replace(".", "", $user->company->salutation);
                        $gender = ''; 
                    }else if($user->role_id == 2){
                        $salutation = str_replace(".", "", $user->individual->salutation);
                        $gender = $user->has('individual') ? $user->individual->gender : '';
                    }
                    
                    if($subscription->is_first == 1){
                        $investment = "";
                    }else{
                        $investment = " - RE INVESTMENT";
                    }

                    $name = $user->first_name.$user->last_name.$investment;
                    $home_address =  $user->address_line1." ".$user->address_line2." ".$user->city." ".$user->post_code." ".$user->stateAs->name." ".$user->countryAs->name;

                }else{
                    $salutation = "";
                    $name = "";
                    $gender = '';
                    $home_address = "";
                }
            }else{
                $salutation = "";
                $name = "";
                $gender = '';
                $home_address = "";
            }
            
            if(!empty($subscription->commence_date)){
                                
                $commence_date = date('Y-M-d', strtotime($subscription->commence_date));
            }else{
                $commence_date = "-";
            }
            
            if(!empty($subscription['draft_refrence_id'])){
                if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                    $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                }else{
                    $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                }
            }else{
                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
            }

            $banking_address = $subscription->address_line_1." ".$subscription->address_line_2." ".$subscription->city." ".$subscription->postcode." ".$subscription->SubscriptionState->name." ".$subscription->SubscriptionCountry->name;

            $sheet->setCellValueByColumnAndRow($col2, $row2, $i);
            $sheet->setCellValueByColumnAndRow($col2+1, $row2, $salutation);
            $sheet->setCellValueByColumnAndRow($col2+2, $row2, $name);
            $sheet->setCellValueByColumnAndRow($col2+3, $row2, $subscription['initial_investment']);
            $sheet->setCellValueByColumnAndRow($col2+4, $row2, $investment_no);
            $sheet->setCellValueByColumnAndRow($col2+5, $row2, $commence_date);
            $sheet->setCellValueByColumnAndRow($col2+6, $row2, "");

            $sheet->setCellValueByColumnAndRow($col2+7, $row2, $home_address);
            $sheet->setCellValueByColumnAndRow($col2+8, $row2, $banking_address);
            $sheet->setCellValueByColumnAndRow($col2+9, $row2, $gender);

            $sheet->setCellValueByColumnAndRow($col2+10, $row2, "");
            
            $invest_total += $subscription['initial_investment'];
            
            $row2++;
            $i++;
        }
        
        $sheet->setCellValueByColumnAndRow($col2+2, $row2+1, "Total");
        $sheet->setCellValueByColumnAndRow($col2+3, $row2+1, $invest_total);

        $writer = new Xlsx($spreadsheet); 
        $rand = rand();
        $path = public_path('img/reports');
        $fileName =  time().'_'.'contract-summary'.'.'. 'xlsx';

        if (File::exists(public_path('img/reports/'.$fileName))) {
            File::delete(public_path('img/reports/'.$fileName));
        }

        $writer->save($path . '/' . $fileName);

        if(!empty($fileName)){
           $file = $fileName;
        }

        return response()->json(['data' => "success", 'filename' => $file], 201);
    }
}

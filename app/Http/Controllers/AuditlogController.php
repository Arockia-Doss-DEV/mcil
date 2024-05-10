<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditlog;
use Auth;
use PDF;
use Setting;

class AuditlogController extends Controller
{
    public function index(Request $request)
    {
        $getGlobalFund = getDefaultGlobalFund();

        $cond = [];
        if ($getGlobalFund == "All") {
        } else {
            $cond['fund_type'] = $getGlobalFund;
        }

        $q =  $request->input('q');
        if($q!=""){

            $auditLogs = Auditlog::with('user', 'subscriptions', 'LogAttachs')
                        ->where($cond)
                        ->where('user_type', 'like', '%' . $q . '%')
                        ->orWhere('action', 'like', '%' . $q . '%')
                        ->orWhere('created_at', '%Y-%m-%d','like', '%'.$q.'%')
                        ->orWhereHas('user', function($query) use($q) {
                            $query->where('first_name', 'like', '%' . $q . '%');
                            $query->orWhere('last_name', 'like', '%' . $q . '%');
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);

            $auditLogs->appends(['q' => $q]);           

        }else{

            $auditLogs = Auditlog::with('user', 'subscriptions', 'LogAttachs')
                        ->where($cond)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        }

        return view('auditlog.index', compact('auditLogs'));
    }

    public function userLogs(Request $request)
    {
        $user= Auth::user();

        $q =  $request->input('q');
        if($q!=""){

            $auditLogs = Auditlog::with('user', 'subscriptions', 'LogAttachs')
                            ->where('user_id', '=', $user->id)
                            ->where('user_type', '!=', 'Admin')
                            ->where('action', 'like', '%' . $q . '%')
                            ->orWhere('created_at', '%Y-%m-%d','like', '%'.$q.'%')
                            ->orWhereHas('user', function($query) use($q) {
                                $query->where('first_name', 'like', '%' . $q . '%');
                                $query->orWhere('last_name', 'like', '%' . $q . '%');
                            })
                            ->orderBy('created_at', 'DESC')
                            ->paginate(10);

            $auditLogs->appends(['q' => $q]); 

        }else{

            $auditLogs = Auditlog::with('user', 'subscriptions', 'LogAttachs')
                        ->where('user_id', '=', $user->id)
                        ->where('user_type', '!=', 'Admin')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);
        }

        if ($user->role_id == 2) {
           return view('individual.auditLogs', compact('auditLogs'));
        } else if($user->role_id == 3) {
            return view('company.auditLogs', compact('auditLogs'));
        } else {
            return \Redirect::back()->with('error', 'Something Went Wrong.');
        }            
    }

    public function getBrowser($user_agent)
    {
        $t = strtolower($user_agent);
        $t = " " . $t;
        if(strpos($t, 'opera') || strpos($t, 'opr/')) 
            return 'Opera';   
        elseif (strpos($t, 'edg')) 
            return 'Edge';   
        elseif (strpos($t, 'chrome'))
            return 'Chrome';   
        elseif (strpos($t, 'safari'))
            return 'Safari';   
        elseif (strpos($t, 'firefox'))
            return 'Firefox';
        elseif (strpos($t, 'safari'))
            return 'Safari';    
        elseif (strpos($t, 'msie') || strpos($t, 'trident/7'))
            return 'Internet Explorer';
        return 'Unkown';
    }

    public function saveAuditLog($action = null, $model = null, $user_type = null, $user_id = 0, $fund_type = 0, $subscription_id = 0, $is_doc_enable = 0, $path_url = null, $attachment_paths = null, $attachments = null){

        //user action logs
        $auditLog = new Auditlog;
        $auditLog->user_browser = $this->getBrowser($_SERVER['HTTP_USER_AGENT']);
        $auditLog->user_ip = $_SERVER['REMOTE_ADDR'];
        $auditLog->subscription_id = $subscription_id;
        $auditLog->user_id = $user_id;
        $auditLog->user_type = $user_type;
        $auditLog->fund_type = $fund_type;
        $auditLog->is_doc_enable = $is_doc_enable;
        $auditLog->path_url = $path_url;
        $auditLog->attachment_path = $attachment_paths;
        $auditLog->attachment = $attachments;
        $auditLog->action = $action;
        $auditLog->model = $model;
        $auditLog->clicked_from = $_SERVER['HTTP_REFERER'];
        $auditLog->created_at = date('Y-m-d H:i:s');
        $auditLog->save();
    }
}

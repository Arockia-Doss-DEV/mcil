<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;
use App\Models\Notification;
use App\Models\Auditlog;
use Auth;


class SettingController extends Controller
{
    public function index(Request $request)
    {
        return view('setting.index');
    }

    public function updateSettings(Request $request)
    {
        Setting::set('site_name', $request->site_name);
        Setting::set('site_name_short', $request->site_name_short);
        Setting::set('email_from_name', $request->email_from_name);
        Setting::set('email_from_address', $request->email_from_address);
        Setting::set('initial_amount', $request->initial_amount);
        Setting::set('additional_amount', $request->additional_amount);
        Setting::set('service_charge', $request->service_charge);
        Setting::set('bank_charge', $request->bank_charge);
        Setting::set('send_mail_conf', $request->send_mail_conf);
        Setting::set('send_sms_conf', $request->send_sms_conf);
        Setting::set('android_authenticator_link', $request->android_authenticator_link);        
        Setting::set('apple_authenticator_link', $request->apple_authenticator_link);

        // Setting::set('manual_request', $request->manual_request == 'on' ? 1 : 0 );
        Setting::save();

        //user action logs
        $auth_user = Auth::user();
        $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = 0;
        $actionLog['user_id'] = $auth_user->id;
        $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = "";
        $actionLog['is_doc_enable'] = 0; 
        $actionLog['model'] = "Settings"; 
        $actionLog['action'] = $auth_user->first_name.$auth_user->last_name." - ". "Updated Settings service charge value as ". $request->service_charge . " and bank charge value as " . $request->bank_charge;
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];
        $auditlog = Auditlog::create($actionLog);
        
        return back()->with('success','Master Settings Updated Successfully');
    }

    public function clearCache()
    {
        \Artisan::call('cache:clear');
        return back()->with('success','App Cache is Cleared');
    }

    public function clearOtp()
    {   
        \Artisan::call('otp:clean');
        return back()->with('success','Expired Tokens are Deleted');
    }

    public function clearNotifications()
    {
        $notificationGlobal = Notification::where('mark_as_seen', 0)->update(['mark_as_seen' => 1]);

        if ($notificationGlobal) {
            return back()->with('success','Cleared All Notifications');
        }
        return back()->with('error','No Notifications');
    }

    

}

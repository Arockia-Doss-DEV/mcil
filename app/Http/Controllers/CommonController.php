<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\Subscription;
use App\Models\Notification;
use Otp;
use Session;
use Illuminate\Support\Facades\Http;

class CommonController extends Controller
{
    public function verify(Request $request){
        
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if($user->email_verified == 1){

            if($user->hasRole(['Individual'])){
                return redirect('/individual/dashboard');
            } else if($user->hasRole(['Company'])){
                return redirect('/company/dashboard');
            } else {
                return redirect('/denied');
            }

        }else{
            return view("auth.verify");
        }
    }

    public function denied(Request $request){
     
        return view("auth.denied");
    }

    public function landing(Request $request){

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $subscription = Subscription::where('user_id', $user_id)
                            ->where('is_first', 1)
                            ->where('draft', 0)
                            ->orderBy('created_at', 'ASC')
                            ->first();
                            
        if(!empty($subscription)){
            if($subscription['status'] == 0){

                return view("auth.landing");

            }else if( ($subscription['status'] == 1) || ($subscription['status'] == 2) || ($subscription['status'] == 3) || ($subscription['status'] == 4) || ($subscription['status'] == 5)){

                if($user->hasRole(['Individual'])){
                    return redirect('/individual/dashboard');
                } else if($user->hasRole(['Company'])){
                    return redirect('/company/dashboard');
                } else {
                    return redirect('/denied');
                }
            }
        }

        return view("auth.landing");
    }

    public function checkLoginCredentials(Request $request){


        

        if($request->get('is_admin')) {
            $user = User::where('email',$request->get('email'))
                    ->where('role_id', $request->get('is_admin'))
                    ->first();
        } else {
            $user = User::where('email',$request->get('email'))
                    ->where('role_id', '!=', 1)
                    ->first();
        }

        $mobile_no = $user['mobile_no'];
        $country_id = $user['country'];
        $mobile_prefix = $user['mobile_prefix'];

        $callingCode = Country::where('id', $mobile_prefix)->pluck('calling_code')->first();

        if(!empty($user) && Hash::check($request->get('password'), $user->password)) {

            if($user['active']) {
                if($user['email_verified']) {

                    if($user['2fa_status'] == 1) {
                        $gauth = true;

                        return response()->json(['data' => "2faenable", "error" => 0, "msg" => "Please enter 2FA Authentication OTP"], 200);
                    }else{
                        $otp = new Otp();
                        $otp = $otp->generate($user->email, 6, 15);

                        $to = $callingCode.$mobile_no;
                        $msg = __('mcil.sms_msg', ['otp' => $otp->token]);

                        $userModel = new User();
                        $userModel->sendOtp($to, $msg);

                        $gauth = false;

                        return response()->json(['data' => "", "error" => 0, "msg" => "OTP send to your mobile no, Please enter"], 200);
                    }

                } else {
                    $msg = "Your email has not been confirmed. Please verify your email";
                    return response()->json(['data' => "", "error" => 1, "msg" => $msg], 200);
                } 

            } else {
                $msg = "Sorry your account is not active. Please contact MCIL admin";
                return response()->json(['data' => "", "error" => 1, "msg" => $msg], 200);
            }   

        }else{
            return response()->json(['data' => "null", "error" => 1, "msg" => "Incorrect email/ password"], 200);
        }
    }

    public function resendOtp(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        $mobile_no = $user['mobile_no'];
        $country_id = $user['country'];
        $mobile_prefix = $user['mobile_prefix'];

        $callingCode = Country::where('id', $mobile_prefix)->pluck('calling_code')->first();

        if(!empty($user)){
            if (!(Hash::check($request->get('password'), $user->password))) {
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }else{

                $otp = new Otp();
                $otp = $otp->generate($user->email, 6, 15);

                $to = $callingCode.$mobile_no;
                $msg = __('mcil.sms_msg', ['otp' => $otp->token]);

                $userModel = new User();
                $userModel->sendOtp($to, $msg);

                return response()->json(['data' => "success", "error" => 0], 201);
            }    
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

    public function otpCheck(Request $request){

        $user = User::where('email',$request->get('email'))->first();

        if(!empty($user)){

            $otp = new Otp();
            $otp = $otp->validate($user->email, $request->get('otp'));

            if($otp->status){
                return response()->json(['data' => "success", "error" => 0], 201);
            }else{
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

    public function gaotpCheck(Request $request){
        
        $user = User::where('email',$request->get('email'))->first();

        if(!empty($user)){
            $google2fa = app('pragmarx.google2fa');
            $valid = $google2fa->verifyKey($user['2fa_key'], $request->get('otp'), 2);
            if ($valid) {
                return response()->json(['data' => "success", "error" => 0], 201);
            }else{
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

    public function checkAgentEmailExist(Request $request)
    {
        $email = $request->get('email');
        $userData = User::where('email',$email)
                ->where('active', 1)
                ->where('status', 1)
                ->where('is_agent', 1)
                ->first();

        if(!empty($userData)){
            return response()->json(['valid' => true, "error" => 0], 201);
        }else{
            return response()->json(['valid' => false, "error" => 1], 201);
        }
    }

    public function checkAgentEmail(Request $request)
    {
        try{

            $response = Http::post('http://178.128.52.63/calcrm/api/get/agent', [
                "email" => $request->email
            ]);

            $userData = $response->json();

            if($userData['valid']){
                return response()->json(['valid' => true, "error" => 0, "data" => $userData], 201);
            }else{
                return response()->json(['valid' => false, "error" => 1], 201);
            }

        } catch (Exception $e) {    
            return response()->json(['error' => $e], 500);  
        }
    }

    public function checkEmailExist(Request $request)
    {
        $email = $request->get('email');
        $userData = User::where('email',$email)->first();

        if(empty($userData)){
            return response()->json(['valid' => true, "error" => 0], 201);
        }else{
            return response()->json(['valid' => false, "error" => 1], 201);
        }
    }

    public function selectBoxStateList(Request $request){
		$country_id =$request->input('country_id');
        $states = State::where('country_id',$country_id)->pluck('name', 'id')->toArray();

        return response()->json([
            'data' => $states
        ], 201);        
    }

    public function gaotpCheckSignUp(Request $request)
    {
        $email = $request->get('email');
        $google2fa_otp = $request->get('otp');
        $google2fa_secret = $request->get('secretcode');

        if(!empty($google2fa_otp)){
            $google2fa = app('pragmarx.google2fa');
            $valid = $google2fa->verifyKey($google2fa_secret, $google2fa_otp, 2);
            if ($valid) {
                return response()->json(['data' => "success", "error" => 0], 201);
            }else{
                return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
            }
        }else{
            return response()->json(['data' => "Wrong Credentials", "error" => 1], 201);
        }
    }

    public function sendRegisterOtp(Request $request)
    {
        $mobile = $request->get('mobile');
        $country_id = $request->get('country_id');
        $email = $request->get('email');

        $user = User::where('email',$email)->first();
        $mobile_prefix = $user['mobile_prefix'];

        $callingCode = Country::where('id', $mobile_prefix)->pluck('calling_code')->first();

        if(!empty($callingCode)){

            $otp = new Otp();
            $otp = $otp->generate($email, 6, 15);

            $to = $callingCode.$mobile;
            $msg = __('mcil.sms_msg', ['otp' => $otp->token]);

            $userModel = new User();
            $userModel->sendOtp($to, $msg);

            return response()->json(['data' => $to, 'error' => 0, 'msg' => "OTP send to your mobile no, Please enter"], 201);
        } else {
            return response()->json(['data' => "null", 'error' => 1, 'msg' => "User not found"], 201);
        }
    }

    public function notification(Request $request)
    {
        $user = \Auth::user(); 
        $notificationGlobal = getNotifications();

        if ($user['role_id'] == 1) {
            return view('notification.adNotification', compact('notificationGlobal'));
        } elseif($user['role_id'] == 2) {
            return view('notification.inNotification', compact('notificationGlobal'));
        } elseif($user['role_id'] == 3) {
            return view('notification.coNotification', compact('notificationGlobal'));
        } else {
            return view('notification');
        }
    }

    public function sessionCheckingLogin(Request $request)
    {
        if (\Auth::user()){

            $userId = Auth::user()->id;
            $session_date = Session::get('datetime');

            if(!empty($session_date)){
                $datetime1 = date('Y-m-d H:i:s', strtotime($session_date));
                $datetime2 = date('Y-m-d H:i:s');

                $seconds = strtotime($datetime2) - strtotime($datetime1);

                $days    = floor($seconds / 86400);
                $hours   = floor(($seconds - ($days * 86400)) / 3600);
                $minutes = floor(($seconds - ($days * 86400) - ($hours * 3600))/60);

                $min = $days * 24 * 60;
                $min += $hours * 60;
                $min += $minutes;

                if($min < 30){

                    return response()->json(['data' => "true"], 201);
                } else {
                    return response()->json(['data' => "false"], 201);
                }
            }

        } else {
            return response()->json(['data' => "true"], 201);
        }
    }

    public function sessionRelogin(Request $request)
    {
        if (\Auth::user()){
            $request->session()->regenerate(true);

            return redirect()->back()->with("success","Re-login Successfully!!!");
        } else {
            return redirect()->back()->with("error","Your login token was expired, can`t re-login!!!");
        }
    }

    public function sessionLogout(Request $request)
    {
        if (auth()->user()){

            @Auth::logout();
            $request->session()->flush();
            return response()->json(['status' => 1], 201);  
        }else{
            return response()->json(['status' => 0], 201);  
        }
    }
}

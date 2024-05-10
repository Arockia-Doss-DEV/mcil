<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Carbon\Carbon;
use App\Models\Auditlog;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectAfterLogout = 'auth/login';
    // protected $redirectTo;

    // protected function redirectTo()
    // {
    //     return '/path';
    // }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function adminLogin()
    {
        return view("auth.adminLogin");
    }

    protected function authenticated($request, $user){

        //user action logs
        $auth_user = Auth::user();
        $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = 0;
        $actionLog['user_id'] = $auth_user->id;
        $actionLog['user_type'] = $role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = 0;
        $actionLog['is_doc_enable'] = 0; 
        $actionLog['model'] = "Login"; 
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        if (!empty($request->is_admin)) {

            session(['datetime' => Carbon::now(), 'userId' => Auth::user()->id, 'roleId' => Auth::user()->role_id]);

            //Audit log
            $actionLog['action'] = $auth_user['first_name'].$auth_user['last_name']." logged in successfully.";
            $auditlog = Auditlog::create($actionLog);

            return redirect('/dashboard');

        } else {

            if($user->hasRole(['Individual'])){

                session(['datetime' => Carbon::now(), 'userId' => Auth::user()->id, 'roleId' => Auth::user()->role_id]);

                //Audit log
                $actionLog['action'] = $auth_user['first_name'].$auth_user['last_name']." logged in successfully.";
                $auditlog = Auditlog::create($actionLog);

                return redirect('/individual/dashboard');

            } else if($user->hasRole(['Company'])){

                session(['datetime' => Carbon::now(), 'userId' => Auth::user()->id, 'roleId' => Auth::user()->role_id]);

                //Audit log
                $actionLog['action'] = $auth_user['first_name'].$auth_user['last_name']." logged in successfully.";
                $auditlog = Auditlog::create($actionLog);

                return redirect('/company/dashboard');

            } else {
                return redirect('login')->with('message', 'Invalid Auth', Auth::logout());
            }
        }
    }
    
   
    public function logout(Request $request) {

        // \Cache::forget('user-is-online-' . Auth::user()->id, true);
        
        //user action logs
        $auth_user = Auth::user();
        // $role = $auth_user->roles->pluck('name')->implode(',');

        $actionLog = [];
        $actionLog['user_browser'] = getBrowser($_SERVER['HTTP_USER_AGENT']);
        $actionLog['user_ip'] = $_SERVER['REMOTE_ADDR'];
        $actionLog['subscription_id'] = 0;
        $actionLog['user_id'] = $auth_user->id;
        $actionLog['user_type'] = "User";  //$role == "Individual" ? "Investor" : $role;
        $actionLog['fund_type'] = 0;
        $actionLog['is_doc_enable'] = 0; 
        $actionLog['model'] = "Login"; 
        $actionLog['action'] = $auth_user['first_name'].$auth_user['last_name']." logged out successfully.";
        $actionLog['clicked_from'] = $_SERVER['HTTP_REFERER'];

        $auditlog = Auditlog::create($actionLog);

        Auth::logout();
        return redirect('/login')->with('success', 'You are successfully signed off!');
    }
}

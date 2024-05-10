<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $redirectTo = '/login';
    // protected $redirectTo = RouteServiceProvider::HOME;


    // protected $redirectTo;

    // protected function redirectTo()
    // {
    //     if(\Auth::user()->hasRole(['Individual', 'Company', 'Admin'])){

    //         \Auth::logout();
    //         return '/login';

    //         // \Session::flash('message', 'Password changed successfully!'); 
    //         // return redirect('/login')->with('success', 'Password changed successfully');
    //     }
    // }

    protected function resetPassword($user, $password)
    {
        $user->password = \Hash::make($password);
        $user->setRememberToken(\Str::random(60));
        $user->save();

        event(new PasswordReset($user));

        return redirect()->route('login')->with('success', 'Your password has been reset successfully.');
    }
}

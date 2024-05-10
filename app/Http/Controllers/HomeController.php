<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if($user->email_verified == 1){

            if($user->hasRole(['Individual'])){
                return redirect('/individual/dashboard');
            } else if($user->hasRole(['Company'])){
                return redirect('/company/dashboard');
            } else if($user->hasRole(['Admin'])){
                return redirect('/dashboard');
            } else {
                return redirect('/denied');
            }

        }else{
            return view("auth.verify");
        }
        // return view('home');
    }
}

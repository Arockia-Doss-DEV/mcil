<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!\Auth::user()) {
            return redirect('/login');
        }

        $user_id = \Auth::user()->id;
        $role = \Auth::user()->role; 
        $user = User::findOrFail($user_id);
        
        if($user->hasRole('Admin')){

            return $next($request);
        }
        
        return redirect('login')->with('message', 'Invalid Auth', Auth::logout());
    }
}

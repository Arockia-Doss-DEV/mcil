<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use Closure;
use App\Models\User;
use App\Models\Subscription;
  
class SubcriptionCheck extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (!Auth::user()) {
            return redirect('/login');
        }

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        
        if($user->hasRole(['Individual', 'Company'])){
            
            if($user['email_verified'] == 0){
                return redirect('/verify');
            }

            $subscription = Subscription::where('user_id', $user_id)
                            ->where('is_first', 1)
                            ->orderBy('created_at', 'ASC')
                            ->first();

            if(!empty($subscription)){

                if($subscription['draft'] == 1){

                    if($user->hasRole(['Individual'])){
                        return redirect('/individual/initialCreate');
                    } else if($user->hasRole(['Company'])){
                        return redirect('/company/initialCreate');
                    } else {
                        return redirect('/denied');
                    }

                }else if($subscription['status'] == 0){

                    return redirect('/landing');
                }else{ 

                    return $next($request);
                }

            }else{

                if($user->hasRole(['Individual'])){
                    return redirect('/individual/initialCreate');
                } else if($user->hasRole(['Company'])) {
                    return redirect('/company/initialCreate');
                } else {
                    return redirect('/denied'); 
                } 
            }
        }

        return redirect('/denied');
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

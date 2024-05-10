<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserActivity;
use Auth;
use Cache;
use Carbon\Carbon;
use Session;

class SetViewVariables
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    protected $redirectTo = '/home';

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $activity = UserActivity::where('user_id', $userId)->first();

            $new_sessid   = \Session::getId(); //get new session_id after user sign in

            if($activity->useragent != '') {
                $last_session = \Session::getHandler()->read($activity->useragent); 

                if ($last_session) {
                    if (\Session::getHandler()->destroy($activity->useragent)) {
                        
                    }
                }
            }

            UserActivity::where('user_id', $userId)->update([
                'useragent' => $new_sessid,
            ]);

            $user = auth()->guard('web')->user();
            return redirect($this->redirectTo);

        } else {
            return redirect('login')->with('message', 'Invalid Authentication', Auth::logout());
        }

        return $next($request);
    }
}

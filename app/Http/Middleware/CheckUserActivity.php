<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserActivity;
use Auth;
use Cache;
use Carbon\Carbon;

class CheckUserActivity
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
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(1); // keep online for 1 min
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);

            // last seen
            // User::where('id', Auth::user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);

            $userId = Auth::user()->id;
            $activity = UserActivity::where('user_id', $userId)->first();

            if(!empty($activity)){
               
               UserActivity::where('user_id', Auth::user()->id)->update([
                            'useragent' => \Session::getId(),
                            'last_seen' => (new \DateTime())->format("Y-m-d H:i:s"),
                            'user_browser' => $_SERVER['HTTP_USER_AGENT'],
                            'ip_address' => $_SERVER['REMOTE_ADDR']
                        ]);
            } else {

                $userActivity = new UserActivity();

                $userActivity->useragent = \Session::getId();
                $userActivity->user_id = $userId;
                $userActivity->last_seen = (new \DateTime())->format("Y-m-d H:i:s");
                $userActivity->user_browser = $_SERVER['HTTP_USER_AGENT'];
                $userActivity->ip_address = $_SERVER['REMOTE_ADDR'];

                $userActivity->save();
            }
        }
        
        return $next($request);
    }
}

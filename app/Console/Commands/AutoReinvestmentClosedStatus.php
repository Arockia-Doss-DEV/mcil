<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Log;

class AutoReinvestmentClosedStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reinvestment:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close Reinvestment Status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*OLD Subscription*/
        $start_date = Carbon::yesterday();
        $subscriptions = Subscription::where('status', 3)
                            ->where('reinvestment_status', 1)
                            ->whereDate('maturity_date', $start_date)
                            ->get();

        Log::info('AutoReinvestmentClosedStatus Date and Time: ' . date('m/d/Y h:i:s a', time()));

        foreach($subscriptions as $subscription){
            
            $user_id = $subscription->user_id;
            $userEntity = User::findOrFail($user_id);

            $subscriptionEntity = Subscription::findOrFail($subscription->id);
            $subscriptionEntity->status = 6;

            $subscriptionEntity->save();
        }

        /* End OLD Subscription*/

        /*NEW Subscription*/
        
        // $newDateTime = Carbon::now()->addDay();

        $newDateTime = Carbon::now();
        $subscriptions = Subscription::where('status', 0)
                            ->where('is_reinvestment', 1)
                            ->whereDate('commence_date', $newDateTime)
                            ->get();

        foreach($subscriptions as $subscription){
            
            $user_id = $subscription->user_id;
            $userEntity = User::findOrFail($user_id);

            $subscriptionEntity = Subscription::findOrFail($subscription->id);
            $subscriptionEntity->status = 3;
            $subscriptionEntity->save();
        }

        /*End NEW Subscription*/
    }
}

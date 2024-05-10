<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Log;

class AutoInvestmentClosedStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investment:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close Investment Status';

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
        // Carbon::today()
        $now = Carbon::now();
        $subscriptions = Subscription::where('status', 3)
                            // ->where('redemption_request', 0)
                            ->whereDate('maturity_date', $now)
                            ->get();

        Log::info('AutoInvestmentClosedStatus Date and Time: ' . date('m/d/Y h:i:s a', time()));

        foreach($subscriptions as $subscription){
            
            $user_id = $subscription->user_id;
            $userEntity = User::findOrFail($user_id);

            $subscriptionEntity = Subscription::findOrFail($subscription->id);
            
            // $subscriptionEntity->redemption_request = 0;
            // $subscriptionEntity->redemption_status =0;

            // new line
            // $subscriptionEntity->reinvestment_request =1;
            // end new line
            
            $subscriptionEntity->status = 6;

            $subscriptionEntity->save();
            
            // sendAutoClosedNotice($userEntity, $subscriptionEntity);
        }
    }
}

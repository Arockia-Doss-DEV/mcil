<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\User;
use Log;

class RedemptionSendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redemption:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Redemption Mail';

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
        // return Command::SUCCESS;
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d', strtotime('+2 months'));

        $subscriptions = Subscription::where('status', 3)
                            ->where('redemption_mail_status', 0)
                            ->where('redemption_status', 0)
                            ->whereBetween('maturity_date', [$start_date, $end_date])
                            ->get();

        Log::info('RedemptionSendMail Date and Time: ' . date('m/d/Y h:i:s a', time()));

        foreach($subscriptions as $subscription){

            $user_id = $subscription->user_id;  
            $userEntity = User::findOrFail($user_id);

            $subscriptionEntity = Subscription::findOrFail($subscription->id);
            $subscriptionEntity->redemption_mail_status = 1;
            $subscriptionEntity->save();

            if($subscription->is_reinvestment == 1) {
                sendRedemptionNoticeToInvestor($userEntity, $subscriptionEntity);
            }

            sendRedemptionNotice($userEntity, $subscriptionEntity);
        }
    }
}

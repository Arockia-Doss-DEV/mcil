<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Notification;
use Setting;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'model_type', 'salutation', 'username', 'first_name', 'last_name', 'email', 'peremail', 'password', 'email_verified_at', 'email_verified', 'gender', 'photo', 'bday', 'mobile_prefix', 'mobile_no', 'agent_email', 'avatar', 'dark_mode', 'address_line1', 'address_line2', 'city', 'country', 'state', 'post_code', 'status', 'active', 'is_agent', 'agent_id', 'last_login', 'ip_address', '2fa_status', '2fa_key', 'is_tester', 'messenger_color', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function countryAs(){
        return $this->belongsTo('App\Models\Country', 'country');
    }

    public function stateAs(){
        return $this->belongsTo('App\Models\State', 'state');
    }

    public function mobilePrefix(){
        return $this->belongsTo('App\Models\Country', 'mobile_prefix');
    }

    public function subscriptions()
    {
        return $this->hasMany('App\Models\Subscription');
    }

    public function individual(){
        return $this->hasOne('App\Models\Individual');
    }

    public function company(){
        return $this->hasOne('App\Models\Company');
    }

    public function userActivity(){
        return $this->belongsTo('App\Models\UserActivity', 'id', 'user_id');
    }

    public function sendOtp($to, $msg){

        $send_sms = Setting::get('send_sms_conf');
        if($send_sms == 1){

            $appi = "http://cloudsms.trio-mobile.com/index.php/api/bulk_mt?api_key=10587ca3947d5c5797447c9d7ede79277cb6d7e523422e99346b2f61ffc5366d&action=send&to={{number}}&msg={{message}}&sender_id=CLOUDSMS&content_type=1&mode=shortcode&campaign=";

            //old
            // $appi = "http://cloudsms.trio-mobile.com/index.php/api/bulk_mt?api_key=NUC130101000062779cae5c28afca2f9a7b8e6e09629b394e&action=send&to={{number}}&msg={{message}}&sender_id=CLOUDSMS&content_type=1&mode=shortcode&campaign=TEST CAMPAIGN";

            $sendtext = urlencode("$msg");

            $appi = str_replace("{{number}}",$to,$appi);
            $appi = str_replace("{{message}}",$sendtext, $appi);
            $result = file_get_contents($appi);
            return;

        }else{

            return;
        }
    }

    public function notificationSave($sender_user_id, $receiver_user_id, $link, $message){
        
        $notiData = [];
        $notiData['sender_user_id'] = $sender_user_id;
        $notiData['receiver_user_id'] = $receiver_user_id;
        $notiData['link'] = $link;
        $notiData['message'] = $message;

        Notification::create($notiData);
    }

    public function scopeGetUserByEmail($query, $email){

        return $query->where('users.email', $email);
    }

    public function scopeGetAllUsersWithUserIds($query, $userIds=null){
        $users = [];

        // if(!empty($userIds)) {
        //     $cond['id IN'] = $userIds;
        // }

        $result = $query->where('users.active', 1)
                    ->whereIn('users.id', $userIds)
                    ->select('users.id', 'users.email', 'users.first_name', 'users.last_name');

        foreach($result as $row) {
            $users[$row['id']] = $row['first_name'].' '.$row['last_name'].' ('.$row['email'].')';
        }
        return $users;
    }
}

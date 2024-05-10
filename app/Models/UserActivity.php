<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    protected $table = 'user_activities';

    protected $fillable = [
        'useragent', 'user_id', 'last_action', 'last_seen', 'last_url', 'user_browser', 'ip_address', 'logout', 'deleted'
    ];

    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}

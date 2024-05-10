<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditlog extends Model
{
    use HasFactory;

    protected $table = 'auditlogs';

    protected $fillable = [
        'activity_id', 'user_browser', 'user_ip', 'subscription_id', 'user_id', 'user_type', 'fund_type', 'is_doc_enable', 'path_url', 'attachment_path', 'attachment', 'model', 'action', 'clicked_from'
    ];

    public function LogAttachs(){
        return $this->hasMany('App\Models\LogAttachment', 'auditlog_id', 'activity_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function subscriptions()
    {
        return $this->belongsTo('App\Models\Subscription', 'subscription_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmail extends Model
{
    use HasFactory;

    protected $table = 'user_emails';

    protected $fillable = [
        'type', 'user_group_id', 'fund_type', 'cc_to', 'from_name', 'from_email', 'subject', 'message', 'attachment', 'sent_by', 'admin_notification', 'sent_msg_flag', 'parent_id', 'ouser_id'
    ];

    public function Users(){
        return $this->belongsTo('App\Models\User', 'sent_by');
    }
}

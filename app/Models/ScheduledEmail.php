<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledEmail extends Model
{
    use HasFactory;

    protected $table = 'scheduled_emails';
    
    protected $fillable = [
        'user_email_id', 'type', 'user_group_id', 'cc_to', 'from_name', 'from_email', 'subject', 'message', 'schedule_date', 'is_sent', 'scheduled_by'
    ];
}

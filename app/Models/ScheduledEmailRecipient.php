<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledEmailRecipient extends Model
{
    use HasFactory;

    protected $table = 'scheduled_email_recipients';
    
    protected $fillable = [
        'scheduled_email_id', 'user_id', 'email_address', 'is_email_sent'
    ];

    public $timestamps = false;
}

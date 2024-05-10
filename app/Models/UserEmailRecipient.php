<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmailRecipient extends Model
{
    use HasFactory;

    protected $table = 'user_email_recipients';

    protected $fillable = [
        'user_email_id', 'user_id', 'email_address', 'is_email_sent', 'notification'
    ];

    public $timestamps = false;

    public function Users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function UserEmails(){
        return $this->belongsTo('App\Models\UserEmail', 'user_email_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SsAttachment extends Model
{
    use HasFactory;

    protected $table = 'ss_attachments';
    
    protected $fillable = [
        'subscription_id', 'attachment_type', 'attachment', 'attachment_path', 'remarks', 'notification'
    ];

    // public $timestamps = false;

    public function SsAttachments(){

        return $this->belongsTo('App\Models\Subscription', 'subscription_id');
    }
}

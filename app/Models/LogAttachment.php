<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAttachment extends Model
{
    use HasFactory;

    protected $table = 'log_attachments';

    protected $fillable = [
        'auditlog_id', 'attachment', 'attachment_path', 'path_url'
    ];
}

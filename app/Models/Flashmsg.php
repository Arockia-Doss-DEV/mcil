<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashmsg extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'file', 'file_path', 'active', 'start_date', 'end_date'
    ];
}

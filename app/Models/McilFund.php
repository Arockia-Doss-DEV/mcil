<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McilFund extends Model
{
    use HasFactory;

    protected $table = 'mcil_funds';
    
    protected $fillable = [
        'name', 'company_name', 'setdefault', 'active', 'total_limit', 'occupied', 'balance', 'supplementary'
    ];

    // public $timestamps = false;
}

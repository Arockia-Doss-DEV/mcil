<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'subscription_id', 'payout_type', 'payout_date', 'divident_date', 'amount', 'percentage', 'reference', 'file', 'file_path', 'bonus_percent', 'bonus_amount', 'bonus_date'
    ];
}

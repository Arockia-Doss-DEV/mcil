<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    protected $table = 'beneficiaries';

    protected $fillable = [
        'subscription_id', 'beneficiary_amount', 'name', 'nric_passport', 'residence_id', 'nationality_id', 'dob', 'occupation', 'address_line_1', 'address_line_2', 'city', 'state_id', 'postcode', 'country_id', 'mobile_prefix', 'mobile_number', 'email', 'relationship'
    ];
}

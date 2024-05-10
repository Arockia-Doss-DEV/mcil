<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'user_id', 'name', 'company_reg_no', 'country_corporate', 'date_corporation', 'business_activity', 'type_company', 'other_type_desc'
    ];

    public function CompanyCountryCorporate(){
        return $this->belongsTo('App\Models\Country', 'country_corporate');
    }

    // public $timestamps = false;

}

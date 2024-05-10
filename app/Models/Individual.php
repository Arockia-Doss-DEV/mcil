<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    protected $table = 'individuals';

    protected $fillable = [
        'user_id', 'salutation', 'name', 'passport', 'gender', 'dob', 'country_residence', 'nationality', 'occupation', 'employer_name', 'annual_income', 'source_wealth', 'source_wealth_other'
    ];

    public function Users(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function IndiResidence(){
        return $this->belongsTo('App\Models\Country', 'country_residence');
    }

    public function IndiNationality(){
        return $this->belongsTo('App\Models\Country', 'nationality');
    }
}

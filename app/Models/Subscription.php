<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Subscription extends Model
{
    use HasFactory;

    protected $table = 'subscriptions';

    protected $fillable = [
        'user_id', 'draft_refrence_id', 'reference_no', 'refreance_id', 'commence_date', 'maturity_date', 'pfia_date', 'bi_date', 'fund_type', 'fund_type_desc', 'initial_investment', 'remittance_bank', 'cheque_no', 'service_charge', 'bank_charge', 'redemption_exchange', 'payee_name', 'bank_name', 'address_line_1', 'address_line_2', 'city', 'postcode', 'state_id', 'country_id', 'account_number', 'account_type', 'swift_code', 'signature1', 'signature2', 'position_name1', 'position_name2', 'position1', 'position2', 'beneficiary_seq', 'is_joint_applicant', 'is_same_address', 'ja_is_same_address', 'certification_1', 'certification_2', 'certification_3', 'certification_4', 'kyc_1', 'kyc_2', 'kyc_3', 'kyc_4', 'kyc_5', 'kyc_6', 'status', 'draft', 'draft_delete', 'notification_doc', 'notification_doc_hidden', 'notification_invest', 'is_first', 'signeddoc_file', 'signeddoc_file_path', 'reinvestment_request', 'reinvestment_status', 'reinvestment_parant_id', 'reinvestment_child_id', 'is_reinvestment', 'redemption_request', 'redemption_status', 'redemption_msg', 'redemption_mail_status', 'redemption_file', 'redemption_file_path', 'bankac_status', 'bankac_mail_status', 'bankac_file', 'bankac_file_path', 'bankac_updated_date', 'enable_signeddoc', 'signed_pdf', 'sharecertificate_file', 'sharecertificate_file_path', 'enable_sharecertificate', 'old_address', 'wodoc', 'beneficiary_status', 'bi_address', 'b1_beneficiary_amount', 'b1_name', 'b1_residence_id', 'b1_nationality_id', 'b1_nric_passport', 'b1_dob', 'b1_occupation', 'b1_address_line_1', 'b1_address_line_2', 'b1_city', 'b1_country_id', 'b1_postcode', 'b1_state_id', 'b1_mobile_prefix', 'b1_mobile_number', 'b1_email', 'b1_relationship', 'b1_updated_date', 'b1_status', 'b2_beneficiary_amount', 'b2_name', 'b2_residence_id', 'b2_nationality_id', 'b2_nric_passport', 'b2_dob', 'b2_occupation', 'b2_address_line_1', 'b2_address_line_2', 'b2_city', 'b2_country_id', 'b2_postcode', 'b2_state_id', 'b2_mobile_prefix', 'b2_mobile_number', 'b2_email', 'b2_relationship', 'b2_updated_date', 'b2_status', 'ja_salutation', 'ja_name', 'ja_country_residence', 'ja_nationality_id', 'ja_nric_passport', 'ja_gender', 'ja_dob', 'ja_addr_line_1', 'ja_addr_line_2', 'ja_city', 'ja_country_id', 'ja_postcode', 'ja_state_id', 'ja_mobileprefix', 'ja_mobile_no', 'ja_email', 'ja_occupation', 'ja_employer_name', 'ja_annual_income', 'ja_source_wealth', 'ja_source_wealth_other', 'ja_instruction_redemption', 'tr_addr_line_1', 'tr_addr_line_2', 'tr_city', 'tr_country_id', 'tr_postcode', 'tr_state_id', 'td1_country_id', 'td1_tax_number', 'td1_tax_reason_type', 'td1_tax_reason', 'td2_country_id', 'td2_tax_number', 'td2_tax_reason_type', 'td2_tax_reason', 'td3_country_id', 'td3_tax_number', 'td3_tax_reason_type', 'td3_tax_reason', 'jatr_addr_line_1', 'jatr_addr_line_2', 'jatr_city', 'jatr_country_id', 'jatr_postcode', 'jatr_state_id', 'jatd1_country_id', 'jatd1_tax_number', 'jatd1_tax_reason_type', 'jatd1_tax_reason', 'jatd2_country_id', 'jatd2_tax_number', 'jatd2_tax_reason_type', 'jatd2_tax_reason', 'jatd3_country_id', 'jatd3_tax_number', 'jatd3_tax_reason_type', 'jatd3_tax_reason', 'fat_is_green_card_holder', 'jafat_is_green_card_holder'
    ];

    // public $timestamps = false;
    
    public function User(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function Individual(){
        return $this->belongsTo('App\Models\Individual', 'user_id', 'user_id');
    }

    public function Company(){
        return $this->belongsTo('App\Models\Company', 'user_id', 'user_id');
    }

    public function SsAttachments(){
        return $this->hasMany('App\Models\SsAttachment', 'subscription_id');
    }

    public function Payments(){
        return $this->hasMany('App\Models\Payment', 'subscription_id');
    }

    public function McilFund(){
        return $this->belongsTo('App\Models\McilFund', 'fund_type');
    }

    public function SubscriptionCountry(){
        return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function SubscriptionState(){
        return $this->belongsTo('App\Models\State', 'state_id');
    }

    public function SubscriptionJaCountry(){
        return $this->belongsTo('App\Models\Country', 'ja_country_id');
    }

    public function SubscriptionJaState(){
        return $this->belongsTo('App\Models\State', 'ja_state_id');
    }

    public function SubscriptionJaNationality(){
        return $this->belongsTo('App\Models\Country', 'ja_nationality_id');
    }

    public function SubscriptionJaMobilePrefix(){
        return $this->belongsTo('App\Models\Country', 'ja_mobileprefix');
    }

    public function SubscriptionJaResidence(){
        return $this->belongsTo('App\Models\Country', 'ja_country_residence');
    }

    public function SubscriptionB1PhonePrefix(){
        return $this->belongsTo('App\Models\Country', 'b1_mobile_prefix');
    }

    public function SubscriptionB1Country(){
        return $this->belongsTo('App\Models\Country', 'b1_country_id');
    }

    public function SubscriptionB1State(){
        return $this->belongsTo('App\Models\State', 'b1_state_id');
    }

    public function SubscriptionB1Nationality(){
        return $this->belongsTo('App\Models\Country', 'b1_nationality_id');
    }

    public function SubscriptionB1Residence(){
        return $this->belongsTo('App\Models\Country', 'b1_residence_id');
    }

    public function SubscriptionB2Country(){
        return $this->belongsTo('App\Models\Country', 'b2_country_id');
    }

    public function SubscriptionB2State(){
        return $this->belongsTo('App\Models\State', 'b2_state_id');
    }

    public function SubscriptionB2PhonePrefix(){
        return $this->belongsTo('App\Models\Country', 'b2_mobile_prefix');
    }

    public function SubscriptionB2Nationality(){
        return $this->belongsTo('App\Models\Country', 'b2_nationality_id');
    }

    public function SubscriptionB2Residence(){
        return $this->belongsTo('App\Models\Country', 'b2_nationality_id');
    }

    public function SubscriptionTrState(){
        return $this->belongsTo('App\Models\State', 'tr_state_id');
    }

    public function SubscriptionTrCountry(){
        return $this->belongsTo('App\Models\Country', 'tr_country_id');
    }

    public function SubscriptionTd1Country(){
        return $this->belongsTo('App\Models\Country', 'td1_country_id');
    }

    public function SubscriptionTd2Country(){
        return $this->belongsTo('App\Models\Country', 'td2_country_id');
    }

    public function SubscriptionTd3Country(){
        return $this->belongsTo('App\Models\Country', 'td3_country_id');
    }

    public function SubscriptionJaTrCountry(){
        return $this->belongsTo('App\Models\State', 'jatr_state_id');
    }

    public function SubscriptionJaTrState(){
        return $this->belongsTo('App\Models\Country', 'jatr_country_id');
    }

    public function SubscriptionJaTd1Country(){
        return $this->belongsTo('App\Models\Country', 'jatd1_country_id');
    }

    public function SubscriptionJaTd2Country(){
        return $this->belongsTo('App\Models\Country', 'jatd2_country_id');
    }

    public function SubscriptionJaTd3Country(){
        return $this->belongsTo('App\Models\Country', 'jatd3_country_id');
    }

    public function SubscriptionBankAcUpdatedBy(){
        return $this->belongsTo('App\Models\User', 'bankac_updated_by')->select(array('id', 'username', 'first_name', 'last_name'));
    }

    public function SubscriptionB1UpdatedBy(){
        return $this->belongsTo('App\Models\User', 'b1_updated_by')->select(array('id', 'username', 'first_name', 'last_name'));
    }

    public function SubscriptionB2UpdatedBy(){
        return $this->belongsTo('App\Models\User', 'b2_updated_by')->select(array('id', 'username', 'first_name', 'last_name'));
    }
    
    public function get_serial_sc(){

        $serial = DB::table('serials')->first();
        return $serial->sc_no;
    }

    public function serial_sc(){

        $serial = DB::table('serials')->first();
        DB::table('serials')->where('id', 1)->update(array('sc_no' => $serial->sc_no + 1));
    }

    public function get_draft_no(){

        $serial = DB::table('serials')->first();
        $invID = str_pad($serial->draft_no, 3, '0', STR_PAD_LEFT);

        return $invID;
    }

    public function serial_draft_no(){

        $serial = DB::table('serials')->first();
        DB::table('serials')->where('id', 1)->update(array('draft_no' => $serial->draft_no + 1));  
    }

    // public function scopeList($query, $search = NULL)
    // {
    //     return $query->with(['User' => function($query) use ($search){
    //             return $query->where('first_name', 'LIKE','%'.$search.'%');
    //         }])
    //         ->orWhere('reference_no','LIKE','%'.$search.'%')
    //         ->orWhere('refreance_id','LIKE','%'.$search.'%')
    //         ->get();
    // }

}

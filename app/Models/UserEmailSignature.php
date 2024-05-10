<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmailSignature extends Model
{
    use HasFactory;

    protected $table = 'user_email_signatures';

    protected $fillable = [
        'user_id', 'signature_name', 'signature'
    ];

    public function scopeGetEmailSignatures($query, $sel=true){

        $signatures = [];
        if($sel) {
            $signatures[''] = __('No Signature');
        }

        $result = $query->select('user_email_signatures.id', 'user_email_signatures.signature_name')
                        ->orderBy('user_email_signatures.signature_name', 'ASC');

        foreach($result as $row) {
            $signatures[$row['id']] = $row['signature_name'];
        }
        return $signatures;
    }

    public function scopeGetEmailSignatureById($query, $emailSignatureId){

        $result = $query->where('user_email_signatures.id', $emailSignatureId)->first();
        return $result;
    }
}

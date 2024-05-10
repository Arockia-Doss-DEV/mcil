<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmailTemplate extends Model
{
    use HasFactory;

    protected $table = 'user_email_templates';

    protected $fillable = [
        'user_id', 'template_name', 'header', 'footer'
    ];

    public function scopeGetEmailTemplates($query, $sel=true){

        $templates = [];
        if($sel) {
            $templates[''] = __('No Template');
        }

        $result = $query->select('user_email_templates.id', 'user_email_templates.template_name')
                        ->orderBy('user_email_templates.template_name', 'ASC');

        foreach($result as $row) {
            $templates[$row['id']] = $row['template_name'];
        }
        return $templates;
    }

    public function scopeGetEmailTemplateById($query, $emailTemplateId){

        $result = $query->where('user_email_templates.id', $emailTemplateId)->first();
        return $result;
    }
}

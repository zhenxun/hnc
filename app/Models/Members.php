<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'member_code', 'ename', 'cname', 'gender', 'age_group',
        'contact_no', 'email', 'email', 'consent', 'recive_adv',
        'remarks'
    ];
}

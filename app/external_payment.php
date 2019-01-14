<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class external_payment extends Model
{
    //
    protected $fillable=[
        'student_name',
        'student_id',
        'payment_type',
        'payment_amount'
    ];
}

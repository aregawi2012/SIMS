<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentType extends Model
{
    //
    protected $fillable=[
        'payment_name',
        'payment_amount'
    ];
}

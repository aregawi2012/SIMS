<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pcst_department extends Model
{
    //
    protected $fillable=[
    	'department_name',
    	'department_code'
    ];

    // relation ship with program
    public function pcst_programs(){

    	return $this->hasMany('App\pcst_program');
    }
}

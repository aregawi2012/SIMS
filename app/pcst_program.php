<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pcst_program extends Model
{
    //
    protected $fillable=[
    	'name',
    	'years',
    	'credit_hours',
    	'pcst_department_id'
    ];

    // relation ship with department
    public function pcst_department(){
    	return $this->belongsTo('App\pcst_department');
    }
}

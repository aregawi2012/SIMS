<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pcst_curriculum extends Model
{
    // fillable fields
    protected $fillable=[
    	'pcst_program_id',
    	'pcst_class_year_id',
    	'pcst_semester_id'
    ];

    // relation to program
    public function pcst_program(){
    	return $this->belongsTo('App\pcst_program');
    }

    // relation to class_year
    public function pcst_class_year(){
    	return $this->belongsTo('App\pcst_class_year');
    }

    // relation to class_year
    public function pcst_semester(){
    	return $this->belongsTo('App\pcst_semester');
    }
}

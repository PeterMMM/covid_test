<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
    	'name','address', 'email', 'mobile_number','age', 'gender','city','test_type','document','test_location','antigen_test_location','antibody_test_location','person_no','pcr_location','cb_pcr_location','cb_antigen_location','cm_pcr_location', 'cm_antigen_location','pk_pcr_location','pk_pcr_no_cer_location','pk_antigen_location','drive_through_pcr_test','drive_through_pcr_test','demand_location','car_detail','home_address','app_date_time','add_info'
    ];
}

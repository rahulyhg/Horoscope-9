<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $fillable = [
        'first_name','last_name','password','gender','age','image','date_of_birth','time_of_birth','place_of_birth','email','zodiac_id','bio','phone_number','date_month_twins','year_twins','month_twins','fb_id','fb_username'
    ];

     public function zodiacs()
	{
	    return $this->belongsTo(Zodiac::class, 'zodiac_id');
	}
}

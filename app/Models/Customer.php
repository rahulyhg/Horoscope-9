<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';
    protected $fillable = [
        'first_name','last_name','gender','age','image','email','zodiac_id','bio','phone_number','fb_id','fb_username','token','date_of_birth','time_of_birth','place_of_birth'
    ];

    public function zodiacs()
	{
	    return $this->belongsTo(Zodiac::class, 'zodiac_id');
	}

	public function threads()
	{
	    return $this->belongsTo(UserThread::class, 'id');
	}

	public function birthInfo()
	{
	    return $this->belongsTo(CustomerBirthUpdate::class, 'id');

	}

	public function deviceInfo()
	{
	    return $this->belongsTo(Device::class, 'customer_id');

	}
	

	
}

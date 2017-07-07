<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerBirthUpdate extends Model
{
     protected $table = 'customer_birth_updates';
    protected $fillable = [
        'customer_id','age','date_of_birth','time_of_birth','place_of_birth','month','year','date_month','status'
    ];

	
	public function zodiacs()
	{
	    return $this->belongsTo(Zodiac::class, 'customer_id');
	}
}

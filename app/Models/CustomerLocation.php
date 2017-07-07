<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    protected $table = 'customer_locations';
    protected $fillable = [
        'customer_id','lat','long','location',
    ];

    public function userLocation()
	{
	    return $this->belongsTo(Customer::class, 'customer_id')->select(['id','token','first_name','last_name','image']);
	}
}

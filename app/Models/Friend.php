<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    //
    protected $table = 'friends';
     protected $fillable = [
        'requested_by','requested_for','status'
    ];

    public function requested_by()
	{
	    return $this->belongsTo(Customer::class, 'requested_by')->select(['id','token','first_name','last_name','image']);
	}
	public function requested_for()
	{
	    return $this->belongsTo(Customer::class, 'requested_for')->select(['id','token','first_name','last_name','image']);
	}
}

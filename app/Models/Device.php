<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    //
     protected $table = 'devices';
    protected $fillable = [
        'customer_id','push_id','device_id','device_type'
    ];

}

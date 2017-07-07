<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageReceivers extends Model
{
   protected $table = 'message_receivers';
     protected $fillable = [
        'customer_name','customer_id','flag','profile_image'
    ];
}

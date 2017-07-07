<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageFlag extends Model
{
    protected $table = 'message_flags';
     protected $fillable = [
        'message_id','customer_id'
    ];
}

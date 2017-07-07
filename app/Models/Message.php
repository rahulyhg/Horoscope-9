<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
	protected $table = 'messaages';
    protected $fillable = [
        'sender_id','thread_id','seen','message',
    ];

    
}

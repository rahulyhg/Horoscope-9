<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserThread extends Model
{
     protected $table = 'user_threads';
     protected $fillable = [
        'customer_id','thread_id'
    ];

    public function threadInfo()
	{
	    return $this->belongsTo(Thread::class, 'thread_id');
	}
}

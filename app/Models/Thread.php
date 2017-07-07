<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';
     protected $fillable = [
        'name'
    ];

    public function user_lists()
	{
	    return $this->belongsTo(UserThread::class, 'thread_id');
	}

}

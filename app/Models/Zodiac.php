<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Zodiac extends Model
{
    protected $table = 'zodiacs';
     protected $fillable = [
        'name', 'zodiac_description','traits','gemstone_name','gemstone_description','lucky_number','lucky_color','color_description','carat'
    ];

    public function gemstones_info()
	{
	    return $this->belongsTo(Gemstone::class, 'gemstone_id');
	}
}

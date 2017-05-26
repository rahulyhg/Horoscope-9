<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horoscope extends Model
{
    //
    protected $table = 'horoscopes';
     protected $fillable = [
        'for_date','mesha', 'brisha','mithuna','karkata','simha','kanya','tula','brishika','dhanu','makara','kumbha','meena','week_number','horoscope_type'
    ];
}

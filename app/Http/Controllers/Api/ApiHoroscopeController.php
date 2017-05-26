<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;

use App\Models\Horoscope;


class ApiHoroscopeController extends ApiController
{
   public function __construct()
    {
        $this->horoscope = new Horoscope();
        $this->customer = new Customer();

    }

    public function dailyIndex()
    {

       	$daily = $this->horoscope->where('horoscope_type','daily')->take(1)->get();
        return $this->success($daily);
    }

    public function weeklyIndex()
    {
        $weekly = $this->horoscope->where('horoscope_type','weekly')->take(1)->get();
        return $this->success($weekly);
    }

    public function monthlyIndex()
    {
        $monthly = $this->horoscope->where('horoscope_type','monthly')->take(1)->get();
       	return $this->success($monthly);
    }

    public function yearlyIndex()
    {
        $yearly = $this->horoscope->where('horoscope_type','yearly')->take(1)->get();
        return $this->success($yearly);
    }

    public function getDailyHoroscope(Request $request)
    {
        $info = $this->customer->find($request->id);
        $horoscope = $this->horoscope->select($info->zodiacs->name)->get();
        return $this->success($horoscope);

    }

    
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use DateTime;

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
        $request = json_decode(file_get_contents("php://input"));
        $requested_date = date('Y-m-d',strtotime($request->today_date));

        $d1 = new DateTime($request->today_date);
        $d2 = new DateTime('now');
        $diff = $d2->diff($d1);
        if (abs($diff->h) <= 12 ) {
            echo "less than 12 hour";
            $horoscope = array();
            $daily = $this->horoscope->where([
                ['horoscope_type','daily'],
                ['for_date',$requested_date]
                ])->first();
        return $this->success($daily);
        }
        else{
            return $this->fail('Invalid Date');
        }
    }

    public function weeklyIndex()
    {
        $request = json_decode(file_get_contents("php://input"));
        $requested_week = date('W',strtotime($request->today_date));
        // $requested_month = date('M',strtotime($request->today_date));
        
        // echo "<pre>";    
        // print_r($requested_month);
        // echo "<br>";    
        // print_r($requested_monthy);
        // die;
           
        $horoscope = array();
        $weekly = $this->horoscope->where([
            ['horoscope_type','weekly'],
            ['week_number',$requested_week]
            ])->first();
        return $this->success($weekly);
        
    }

    public function monthlyIndex()
    {
        $monthly = $this->horoscope->where('horoscope_type','monthly')->orderBy('id','Desc')->first();
       	return $this->success($monthly);
    }

    public function yearlyIndex()
    {
        $yearly = $this->horoscope->where('horoscope_type','yearly')->orderBy('id','Desc')->first();
        return $this->success($yearly);
    }

    public function getDailyHoroscope(Request $request)
    {
        $info = $this->customer->find($request->id);
        $horoscope = $this->horoscope->select($info->zodiacs->name)->get();
        return $this->success($horoscope);

    }

    public function getHoroscope()
    {
      
            $daily = $this->horoscope->where('horoscope_type','daily')->orderBy('id','Desc')->first();

            $weekly = $this->horoscope->where('horoscope_type','weekly')->orderBy('id','Desc')->first();

            $monthly = $this->horoscope->where('horoscope_type','monthly')->orderBy('id','Desc')->first();

            $yearly = $this->horoscope->where('horoscope_type','yearly')->orderBy('id','Desc')->first();

            $horoscope = ['daily' => $daily,'weekly'=>$weekly,'monthly'=>$monthly,'yearly'=>$yearly];
            return $this->success($horoscope);

    }
    
}

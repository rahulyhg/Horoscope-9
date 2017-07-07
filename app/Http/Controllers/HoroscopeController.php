<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horoscope;


class HoroscopeController extends Controller
{
    public function __construct()
    {
        $this->horoscope = new Horoscope();
    }
    public function dailyIndex()
    {
       $daily = $this->horoscope->where('horoscope_type','daily')->get();
       return View('Horoscope.daily.index',compact('daily'));
    }

    public function dailyCreate()
    {
       return View('Horoscope.daily.create');
    }

    public function dailyEdit($id)
    {
        $daily = $this->horoscope->find($id);
        return View('Horoscope.daily.edit',compact('daily'));
    }

    public function dailyStore(Request $request) 
    {
        $week = date('W',strtotime($request->for_date));
        $month = date('F',strtotime($request->for_date));
        $year = date('Y',strtotime($request->for_date));
        $request['week_number'] = $week;
        $request['month'] = $month;
        $request['year'] = $year;
        $this->horoscope->create($request->all());
        return redirect('horoscope/daily');

    }

    public function dailyUpdate(Request $request, $id) 
    {
        $daily = $this->horoscope->find($id);
        $daily->mesha = $request->mesha;
        $daily->brisha = $request->brisha;
        $daily->mithuna = $request->mithuna;
        $daily->karkata = $request->karkata;
        $daily->simha = $request->simha;
        $daily->kanya = $request->kanya;
        $daily->tula = $request->tula;
        $daily->brishika = $request->brishika;
        $daily->dhanu = $request->dhanu;
        $daily->makara = $request->makara;
        $daily->kumbha = $request->kumbha;
        $daily->meena = $request->meena;
        $daily->save();
        return redirect('horoscope/daily');
    }

    public function weeklyIndex()
    {
         $weekly = $this->horoscope->where('horoscope_type','weekly')->get();
        return View('Horoscope.weekly.index',compact('weekly'));
    }

    public function weeklyCreate()
    {
       return View('Horoscope.weekly.create');
    }

      public function weeklyStore(Request $request)
    {
        $week = date('W',strtotime($request->for_date));
        $month = date('F',strtotime($request->for_date));
        $year = date('Y',strtotime($request->for_date));
        $request['month'] = $month;
        $request['year'] = $year;
        $request['week_number'] = $week;
        $this->horoscope->create($request->all());
        return redirect('horoscope/weekly');
    }

    public function weeklyEdit($id)
    {
         $weekly = $this->horoscope->find($id);
        return View('Horoscope.weekly.edit',compact('weekly'));
    }

    public function weeklyUpdate(Request $request, $id) 
    {
       $weekly = $this->horoscope->find($id);

        // $week = date("W", strtotime($request->for_date));
        // $weekly->week_number = $week;
        $weekly->mesha = $request->mesha;
        $weekly->brisha = $request->brisha;
        $weekly->mithuna = $request->mithuna;
        $weekly->karkata = $request->karkata;
        $weekly->simha = $request->simha;
        $weekly->kanya = $request->kanya;
        $weekly->tula = $request->tula;
        $weekly->brishika = $request->brishika;
        $weekly->dhanu = $request->dhanu;
        $weekly->makara = $request->makara;
        $weekly->kumbha = $request->kumbha;
        $weekly->meena = $request->meena;
        $weekly->save();
        return redirect('horoscope/weekly');
    }

    public function monthlyIndex()
    {
        $monthly = $this->horoscope->where('horoscope_type','monthly')->get();
       return View('Horoscope.monthly.index',compact('monthly'));
    }
    public function monthlyCreate()
    {
        return View('Horoscope.monthly.create');
    }

    public function monthlyStore(Request $request) 
    {
        $week = date('W',strtotime($request->for_date));
        $month = date('F',strtotime($request->for_date));
        $year = date('Y',strtotime($request->for_date));
        $request['month'] = $month;
        $request['year'] = $year;
        $request['week_number'] = $week;
        $this->horoscope->create($request->all());
        return redirect('horoscope/monthly');
    }

    public function monthlyEdit()
    {
         $monthly = $this->horoscope->find($id);
        return View('Horoscope.monthly.edit',compact('monthly'));
    }


    public function monthlyUpdate(Request $request, $id) 
    {
        $monthly = $this->horoscope->find($id);
        $monthly->mesha = $request->mesha;
        $monthly->brisha = $request->brisha;
        $monthly->mithuna = $request->mithuna;
        $monthly->karkata = $request->karkata;
        $monthly->simha = $request->simha;
        $monthly->kanya = $request->kanya;
        $monthly->tula = $request->tula;
        $monthly->brishika = $request->brishika;
        $monthly->dhanu = $request->dhanu;
        $monthly->makara = $request->makara;
        $monthly->kumbha = $request->kumbha;
        $monthly->meena = $request->meena;
        $monthly->save();
        return redirect('horoscope/monthly');
    }

    public function yearlyIndex()
    {
        $yearly = $this->horoscope->where('horoscope_type','yearly')->get();
       return View('Horoscope.yearly.index',compact('yearly'));
    }

    public function yearlyCreate()
    {
       return View('Horoscope.yearly.create'); 
    }

    public function yearlyStore(Request $request) 
    {
        $week = date('W',strtotime($request->for_date));
        $month = date('F',strtotime($request->for_date));
        $year = date('Y',strtotime($request->for_date));
        $request['month'] = $month;
        $request['year'] = $year;
        $request['week_number'] = $week;
        $this->horoscope->create($request->all());
        return redirect('horoscope/yearly');
    }

    public function yearlyEdit()
    {   
        $yearly = $this->horoscope->find($id);
        return View('Horoscope.yearly.edit',compact('yearly'));
    }


    public function yearlyUpdate(Request $request, $id) 
    {
        $yearly = $this->horoscope->find($id);
        $yearly->mesha = $request->mesha;
        $yearly->brisha = $request->brisha;
        $yearly->mithuna = $request->mithuna;
        $yearly->karkata = $request->karkata;
        $yearly->simha = $request->simha;
        $yearly->kanya = $request->kanya;
        $yearly->tula = $request->tula;
        $yearly->brishika = $request->brishika;
        $yearly->dhanu = $request->dhanu;
        $yearly->makara = $request->makara;
        $yearly->kumbha = $request->kumbha;
        $yearly->meena = $request->meena;
        $yearly->save();
        return redirect('horoscope/yearly');
    }
}

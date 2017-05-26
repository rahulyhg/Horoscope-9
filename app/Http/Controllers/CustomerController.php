<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Zodiac;
use DateTime;

class CustomerController extends Controller
{
    
    public function __construct()
    {
        $this->customer = new Customer();
        $this->zodiac = new Zodiac();
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer->all();
        // echo "<pre>";
        // print_r($customers->toArray());
        // die;
        return View('Customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zodiacs = $this->zodiac->all();
        return View('Customers.create',compact('zodiacs'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = $this->customer->find($id);

        return View('Customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $customer = $this->customer->find($id);
        $zodiacs = $this->zodiac->all();

        return View('Customers.edit',compact('customer','zodiacs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // echo "<pre>";
        //     print_r($request->toArray());
        //     die;
            if ($request->zodiac_id) {
                $customer = $this->customer->find($id);
                $customer->zodiac_id = $request->zodiac_id;
                $customer->save();

            }
            return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}

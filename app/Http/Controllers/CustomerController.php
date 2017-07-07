<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerBirthUpdate;
use App\Models\Zodiac;
use DateTime;
use App\Http\WRSHelper;

class CustomerController extends Controller
{
    
    public function __construct()
    {
        $this->customer = new Customer();
        $this->customerBirthInfo = new CustomerBirthUpdate();
        $this->zodiac = new Zodiac();
        $this->helperClass = new WRSHelper();
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer->all();
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
        $customer = $this->customer->find($id);
        // $customer = $this->customer->where('token',$id);
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
        $data = $this->helperClass->findAssociatedThreads($id,$request->date_of_birth);
        // echo "<pre>";
        // print_r($data);
        // die;

        $customer = $this->customer->find($id);
        $customer_birth_info = $this->customerBirthInfo->orderBy('id','Desc')->where('id',$id)->first();
        if ($request->zodiac_id) {
            $customer->zodiac_id = $request->zodiac_id;
            $customer->save();

        }
       
        if ($customer_birth_info->count <= 2) {
            $customer_birth_info->status = 'accepted';
        }
        elseif (!isset($request->admin_remarks) || empty($request->admin_remarks)) {
            return Redirect::back()->withErrors("Please Put Admin Remarks");
        }
        else{
        $customer_birth_info->status = $request->status;
            
        }
        $customer_birth_info->admin_remarks = $request->admin_remarks;
        if ($request->status == 'accepted') {
            $customer->date_of_birth = $customer_birth_info->date_of_birth;
            $customer->time_of_birth = $customer_birth_info->time_of_birth;
            $customer->place_of_birth = $customer_birth_info->place_of_birth;
            $customer->age = $customer_birth_info->age;
            $customer->month = $customer_birth_info->month;
            $customer->year= $customer_birth_info->year;
            $customer->year= $customer_birth_info->year;
            $customer->date_month= $customer_birth_info->date_month;
            
        }
        $customer_birth_info->count = $customer_birth_info->count+1;
     
         $customer_birth_info->save();
        if ($request->status == 'pending' || $request->status == 'rejected')
        {
            return redirect('customers');

        }
        $customer->save();
            
        return redirect('customers');

    }

}

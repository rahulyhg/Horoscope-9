<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;
use App\Models\Zodiac;
use DateTime;
use Illuminate\Auth\AuthManager;

class ApiCustomerController extends ApiController
{

    /**
     * @var AuthManager
     */
    private $auth;

    /**
     * @var array
     */
    private $rulesCreate = [];

    public function __construct(AuthManager $auth)
    {
        $this->customer = new Customer();
        $this->zodiac = new Zodiac();
        $this->auth      = $auth;

        $this->rulesCreate = [
            'first_name' => 'bail|required|string',
            'last_name' => 'bail|required|string',
            'email' => 'bail|required|email',
        ];
        $this->rulesUpdate = [
            'first_name' => 'bail|required|string',
            'last_name' => 'bail|required|string',
            'email' => 'bail|required|email',
            'email'=>'bail|required|email|unique:customers,email,'.$id
        ];

    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $customers = $this->customer->paginate(3);
        return $this->success($customers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $this->validate($request, $this->rulesCreate);

        if ($request->date_of_birth) {
            $time_of_birth =  date("h:i:a", strtotime($request->date_of_birth));
            $date_of_birth =  date("Y-m-d", strtotime($request->date_of_birth));
            $month_of_birth =  date("m", strtotime($request->date_of_birth));
            $month_day_of_birth =  date("m-d", strtotime($request->date_of_birth));
            $year_of_birth =  date("Y", strtotime($request->date_of_birth));
            $d1 = new DateTime($request->date_of_birth);
            $d2 = new DateTime('now');

            $diff = $d2->diff($d1);
            $request['time_of_birth'] = $time_of_birth;
            $request['date_of_birth'] = $date_of_birth;
            $request['date_month_twins'] = $month_day_of_birth;
            $request['year_twins'] = $year_of_birth;
            $request['month_twins'] = $month_of_birth;
            $request['age'] = $diff->y;
        }
            $request['password'] = bcrypt($request->password);
            $success = $this->customer->firstorcreate($request->all());
            return $this->success($success);

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
        return $this->success($customer);
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
        $newCustomer = $this->customer->find($id);
        $this->validate($request, $this->rulesUpdate);

        if ($request->date_time_of_birth) {
            $date_of_birth =  date("Y-m-d", strtotime($request->date_time_of_birth));
            $month_of_birth =  date("m", strtotime($request->date_of_birth));
            $month_day_of_birth =  date("m-d", strtotime($request->date_of_birth));
            $year_of_birth =  date("Y", strtotime($request->date_of_birth));
            $d1 = new DateTime($request->date_of_birth);
            $d2 = new DateTime('now');

            $diff = $d2->diff($d1);

            $newCustomer->date_time_of_birth = $request->date_time_of_birth;
            $newCustomer['date_month_twins'] = $month_day_of_birth;
            $newCustomer['year_twins'] = $year_of_birth;
            $newCustomer['month_twins'] = $month_of_birth;
            $newCustomer['age'] = $diff->y;
        }
            $newCustomer->email = $request->email;
            $newCustomer->first_name = $request->first_name;
            $newCustomer->last_name = $request->last_name;
            $newCustomer->gender = $request->gender;
            $newCustomer->place_of_birth = $request->place_of_birth;
            $newCustomer->image = $request->image;
            $newCustomer->save();
            return $this->success('Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getExactTwins($id)
    {
        
        $user = $this->customer->find($id);
        $date_of_birth =  date("Y-m-d", strtotime($user->date_time_of_birth));
        $month_of_birth =  date("m", strtotime($user->date_of_birth));
        $month_day_of_birth =  date("m-d", strtotime($user->date_of_birth));
        $year_of_birth =  date("Y", strtotime($user->date_of_birth));
        $dob = $user->date_of_birth;
        $twinsByDOB = $this->customer->where('date_of_birth',$dob)->get();
        $twinsByMD = $this->customer->where('date_month_twins',$month_day_of_birth)->get();
        $twinsByY = $this->customer->where('year_twins',$year_of_birth)->get();
                if (count($twinsByDOB) > 1) {
                    $twins_by_YMD = $twinsByDOB;
                }
                else{
                    $twins_by_YMD = 'Sorry No Twins Found';
                }
                if (count($twinsByMD) > 1) {
                    $twins_by_MD = $twinsByMD;
                }
                else{
                    $twins_by_MD = 'Sorry No Twins Found';
                }
                if (count($twinsByY) > 1) {
                    $twins_by_Y = $twinsByY;
                }
                else{
                    $twins_by_Y = 'Sorry No Twins Found';
                }
        $twins = array('twins_by_YMD' => $twins_by_YMD, 'twins_by_MD' => $twins_by_MD,'twins_by_Y' => $twins_by_Y);


        
            return $this->success($twins);
        
    }

    public function getMonthDayTwins($id)
    {
        $user = $this->customer->find($id);
        $month_day_of_birth =  date("m-d", strtotime($user->date_of_birth));
        $twinsByDOB = $this->customer->where('date_month_twins',$month_day_of_birth)->get();
        if (count($twinsByDOB) > 1) {
            return $this->success($twinsByDOB);
        }
        else{
            return $this->success("Sorry No Twins Found");
        }
    }

    public function getYearMonthDayTwins($id)
    {
        $user = $this->customer->find($id);
        $month_day_of_birth =  date("Y-m-d", strtotime($user->date_of_birth));
        $twinsByDOB = $this->customer->where('date_of_birth',$month_day_of_birth)->get();
        if (count($twinsByDOB) > 1) {
            return $this->success($twinsByDOB);
        }
        else{
            return $this->success("Sorry No Twins Found");
        }
    }

    public function getYearTwins($id)
    {
        $user = $this->customer->find($id);
        $month_day_of_birth =  date("Y", strtotime($user->date_of_birth));
        $twinsByDOB = $this->customer->where('year_twins',$month_day_of_birth)->get();
        if (count($twinsByDOB) > 1) {
            return $this->success($twinsByDOB);
        }
        else{
            return $this->success("Sorry No Twins Found");
        }
    }



}

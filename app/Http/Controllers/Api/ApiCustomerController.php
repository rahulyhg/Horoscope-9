<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;
use App\Models\Zodiac;
use App\Models\CustomerLocation;
use DateTime;
use Illuminate\Auth\AuthManager;
use App\Models\Thread;
use App\Models\UserThread;
use App\Models\CustomerBirthUpdate;
use Illuminate\Support\Facades\DB;


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
        $this->threads = new Thread();
        $this->userthread = new UserThread();
        $this->customerlocation = new CustomerLocation();
        $this->customerbirthupdate = new CustomerBirthUpdate();
        $this->auth      = $auth;

        // $this->rulesCreate = [
        //     'first_name' => 'bail|required|string',
        //     'last_name' => 'bail|required|string',
        //     'email' => 'bail|required|email|unique',
        // ];
        // $this->rulesUpdate = [
        //     'first_name' => 'bail|required|string',
        //     'last_name' => 'bail|required|string',
        //     'email' => 'bail|required|email',
        //     'email'=>'bail|required|email|unique:customers,email,'.$id
        // ];

    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request = json_decode(file_get_contents("php://input"),true);
        // $this->validate($request, $this->rulesCreate);
         if (isset($request['token'])) {
            $token = $request['token'];
         }
         else{
            $token = bin2hex(random_bytes(32));
         }
      
            $request['token'] = $token;

            if (empty($request['date_of_birth'])) {
                return $this->fail('Please Enter Your Date/Time of Birth');
            }
            /*storing customers Birth Info in customer_birth_info variable */
            if (!empty($request['date_of_birth'])) {
            $time_of_birth =  date("h:i a", strtotime($request['date_of_birth']));
            $date_of_birth =  date("Y-m-d", strtotime($request['date_of_birth']));
            $month_of_birth =  date("m", strtotime($request['date_of_birth']));
            $month =  date("F", strtotime($request['date_of_birth']));
            $month_day_of_birth =  date("m-d", strtotime($request['date_of_birth']));
            $year_of_birth =  date("Y", strtotime($request['date_of_birth']));
            $d1 = new DateTime($request['date_of_birth']);
            $d2 = new DateTime('now');

            $diff = $d2->diff($d1);
            $request['date_of_birth'] = $date_of_birth;
            $request['time_of_birth'] = $time_of_birth;
            $request['age'] = $diff->y;
            $request['place_of_birth'] = $request['place_of_birth'];


        }
            /*storing all userinfo in Customer Table */
            
            $success = $this->customer->firstorcreate($request);

            /*updating customer birth info in customer_birth_updates table*/
            if ($success) {
            $customer_birth_info = array();

                $customer_birth_info['date_of_birth'] = $date_of_birth;
                $customer_birth_info['time_of_birth'] = $time_of_birth;
                $customer_birth_info['date_month'] = $month_day_of_birth;
                $customer_birth_info['place_of_birth'] = $request['place_of_birth'];
                $customer_birth_info['year'] = $year_of_birth;
                $customer_birth_info['month'] = $month_of_birth;
                $customer_birth_info['age'] = $diff->y;
                $customer_birth_info['customer_id'] = $success->id;
                $customer_birth_info['status'] = 'accepted';
                $this->customerbirthupdate->create($customer_birth_info);
            }
           
            // chceking if month exists
                
            $check_if_month_existed = $this->threads->where('name',$month)->first();

            // chceking if year exists
                
            
            $check_if_year_existed = $this->threads->where('name',$year_of_birth)->first();
             

            if (!isset($check_if_month_existed)) {
                $checkmonth = array();
                $checkmonth['name'] = $month;
                $check_if_month_existed = $this->threads->create($checkmonth);
            }
            /*
                if exists inserting in that thread table otherwise creating new thread and inserting in that respective thread
            */
                $monthresult = $this->userthread->where([
                ['customer_id',$success->id],
                ['thread_id',$check_if_month_existed->id]
                ])->first();


            /*if user thread exists skip the saving else save the user in that thread*/
            if (empty(trim($monthresult))) {
                $newMonth = array();
                $newMonth['customer_id'] = $success->id;
                $newMonth['thread_id'] = $check_if_month_existed->id;
                $this->userthread->create($newMonth);
                
            }
            

            if (!isset($check_if_year_existed)) {
                $checkyear = array();
                $checkyear['name'] = $year_of_birth;
                $check_if_year_existed = $this->threads->create($checkyear);
            }

            $yearresult = $this->userthread->where([
                ['customer_id',$success->id],
                ['thread_id',$check_if_year_existed->id]
                ])->first();
           
            if (empty(trim($yearresult))) {
                $newYear = array();
                $newYear['customer_id'] = $success->id;
                $newYear['thread_id'] = $check_if_year_existed->id;
                $this->userthread->create($newYear);
                
            }

            $associated_threads = $this->userthread->where('customer_id',$success->id)->with('threadInfo')->get();

            $success['threads'] = $associated_threads->toArray();

            return $this->success($success);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $request = json_decode(file_get_contents("php://input"));
        $customer = $this->customer->with('zodiacs')->select('id','first_name','last_name','age','date_of_birth','time_of_birth','place_of_birth','zodiac_id','token','fb_id','fb_username','bio','image','phone_number')->where('token',$request->token)->first();
        // echo "<pre>";
        // print_r($customer->toArray());
        // die;
        
        $associated_threads = $this->userthread->where('customer_id',$customer->id)->with('threadInfo')->get();
        $customer['threads'] = $associated_threads->toArray();
        return $this->success($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $request = json_decode(file_get_contents("php://input"));
        
        $newCustomer = $this->customer->find($id);

        if (isset($request->date_of_birth)) {

                $time_of_birth =  date("h:i:a", strtotime($request->date_of_birth));
                $date_of_birth =  date("Y-m-d", strtotime($request->date_of_birth));
                $month_of_birth =  date("m", strtotime($request->date_of_birth));
                $month =  date("F", strtotime($request->date_of_birth));
                $month_day_of_birth =  date("m-d", strtotime($request->date_of_birth));
                $year_of_birth =  date("Y", strtotime($request->date_of_birth));
                $d1 = new DateTime($request->date_of_birth);
                $d2 = new DateTime('now');

                $diff = $d2->diff($d1);

                if (isset($request->place_of_birth)) {
                    $place_of_birth = $request->place_of_birth;
                }
                else{
                    $place_of_birth = $newCustomer->place_of_birth;
                }

            $customer_birth_update = $this->customerbirthupdate->where('customer_id',$id)->first();
            if ($customer_birth_update->count > 2 && empty($customer_birth_update->customer_remarks)) 
            {
                return $this->fail('You Have Already Updated Your Birth Info 2 Times Please Specify The Reason For This Update');
            }
            elseif ($customer_birth_update->count <= 2) {
                
                $customer_birth_update['time_of_birth'] = $time_of_birth;
                $customer_birth_update['date_of_birth'] = $date_of_birth;
                $customer_birth_update['date_month'] = $month_day_of_birth;
                $customer_birth_update['year'] = $year_of_birth;
                $customer_birth_update['month'] = $month_of_birth;
                $customer_birth_update['age'] = $diff->y;
                $customer_birth_update['count'] = $customer_birth_update->count + 1;
                $customer_birth_update['place_of_birth'] = $place_of_birth;
                $newCustomerInfo = $this->customerbirthupdate->create($customer_birth_update);





                $newCustomer->time_of_birth = $time_of_birth;
                $newCustomer->date_of_birth = $date_of_birth;
                $newCustomer->age = $diff->y;
            }
            else{
             
                $customer_birth_update->time_of_birth = $time_of_birth;
                $customer_birth_update->date_of_birth = $date_of_birth;
                $customer_birth_update->date_month = $month_day_of_birth;
                $customer_birth_update->year = $year_of_birth;
                $customer_birth_update->month = $month_of_birth;
                $customer_birth_update->age = $diff->y;
                $customer_birth_update->status = 'pending';
                $customer_birth_update->count = $customer_birth_update->count + 1;
                $customer_birth_update->save();

                $newCustomer->time_of_birth = $time_of_birth;
                $newCustomer->date_of_birth = $date_of_birth;
                $newCustomer->age = $diff->y;
                
            }
                if (isset($request->email)) {
                    $newCustomer->email = $request->email;
                }
                if (isset($request->first_name)) {
                    $newCustomer->first_name = $request->first_name;
                }
                if (isset($request->last_name)) {
                    $newCustomer->last_name = $request->last_name;
                }
                if (isset($request->gender)) {
                     $newCustomer->gender = $request->gender;
                }
                if (isset($request->place_of_birth)) {
                    $newCustomer->place_of_birth = $request->place_of_birth;
                }
                if (isset($request->image)) {
                    $newCustomer->image = $request->image;
                }

               
                $newCustomer->save();


               
                return $this->success($newCustomer);
        }

    }

    public function getExactTwins($id)
    {
        $request = json_decode(file_get_contents("php://input"));
        
        $user = $this->customer->find($request->id);
        $date_of_birth =  date("Y-m-d", strtotime($user->date_of_birth));
        $month_of_birth =  date("m", strtotime($user->date_of_birth));
        $month_day_of_birth =  date("m-d", strtotime($user->date_of_birth));
        $year_of_birth =  date("Y", strtotime($user->date_of_birth));
        $dob = $user->date_of_birth;

        /*find Twins*/
        // $this->customerbirthupdate = new CustomerBirthUpdate();

        $twinsByDOB = $this->customerbirthupdate->where('date_of_birth',$dob)->with('zodiacs')->get();


        $twinsByMD = $this->customerbirthupdate->where('date_month',$month_day_of_birth)->with('zodiacs')->get();


        $twinsByY = $this->customerbirthupdate->where('year',$year_of_birth)->with('zodiacs')->get();
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
        $twinsByDOB = $this->customer->where('date_month',$month_day_of_birth)->get();
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
        if ($id) {
            $user = $this->customer->find($id);
            $month_day_of_birth =  date("Y", strtotime($user->date_of_birth));
            $twinsByDOB = $this->customer->where('year',$month_day_of_birth)->get();
            if (count($twinsByDOB) > 1) {
                return $this->success($twinsByDOB);
            }
            else{
                return $this->success("Sorry No Twins Found");
            }
            
        }
        else{
            return $this->fail('Sorry No UserId Sent',400);
        }
    }


    public function getLocation(Request $request)
    {
        $request = json_decode(file_get_contents("php://input"));
        $id = $request->id;
        $gender = $request->gender;
        $age1 = $request->age1;
        $age2 = $request->age2;
        $lat = $request->lat;
        $long = $request->long;
        $user = $this->customerlocation->where('customer_id',$id)->first();
       
        // $lat = $user->lat; // latitude of centre of bounding circle in degrees
        // $long = $user->lon; // longitude of centre of bounding circle in degrees
        $rad = $request->range; // radius of bounding circle in kilometers
        $latInRad = deg2rad($lat);
        $longInRad = deg2rad($long);

        $R = 6371;  // earth's mean radius, km

        // first-cut bounding box (in degrees)
        $maxlat = $lat + rad2deg($rad/$R);
        $minlat = $lat - rad2deg($rad/$R);
        $maxlong = $long + rad2deg(asin($rad/$R) / cos(deg2rad($lat)));
        $minlong = $long - rad2deg(asin($rad/$R) / cos(deg2rad($lat)));

        $sql = "Select locationTable.customer_id,customers.first_name,customers.last_name,customers.age,customers.gender,locationTable.lat,locationTable.lon,locationTable.location From (Select lat,lon,location,customer_id,acos(sin($latInRad)*sin(radians($lat)) + cos($latInRad)*cos(radians($lat))*cos(radians($long)-$longInRad)) * $R As D
                    From ( Select * From customer_locations Where lat Between $minlat And $maxlat 
                    And lon Between $minlong And $maxlong
                    ) As FirstCut Where acos(sin($latInRad)*sin(radians($lat)) + cos($latInRad)*cos(radians($lat))*cos(radians($long)-$longInRad)) * $R < $rad Order by D ) As locationTable Left Join customers on locationTable.customer_id = customers.id " ;
        if ($gender) {
            $sql .= 'Where customers.gender = "'.$gender.'"'; 
        }
        if ($age1 && $age2) {
            $sql .= "And customers.age Between $age1 and $age2";
        }

        $people_nearby = DB::select($sql);

        return $this->success($people_nearby);
    } 

    



}

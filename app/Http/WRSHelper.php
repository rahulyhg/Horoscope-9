<?php 
namespace App\Http;
use DateTime;
use App\Models\Thread;
use App\Models\UserThread;
use App\Models\CustomerBirthUpdate;


class WRSHelper 
{
	
	function __construct()
	{
		// $this->customer = new Customer();
        // $this->zodiac = new Zodiac();
        $this->threads = new Thread();
        $this->userthread = new UserThread();
        // $this->customerlocation = new CustomerLocation();
        $this->customerbirthupdate = new CustomerBirthUpdate();
	}

	public function getDateInfo($dateTime)
	{
		if (empty($dateTime)) {
			return 'Please Enter Valid Date Time';
		}
		$time_of_birth =  date("h:i a", strtotime($dateTime));
        $date_of_birth =  date("Y-m-d", strtotime($dateTime));
        $month_of_birth =  date("m", strtotime($dateTime));
        $month =  date("F", strtotime($dateTime));
        $month_day_of_birth =  date("m-d", strtotime($dateTime));
        $year_of_birth =  date("Y", strtotime($dateTime));
        $d1 = new DateTime($dateTime);
        $d2 = new DateTime('now');

        $diff = $d2->diff($d1);
        $age = $diff->y;
        $finalDateResult = array('date_of_birth'=>$date_of_birth,'time_of_birth'=>$time_of_birth,'month'=>$month,'year'=>$year_of_birth,'date_month'=>$month_day_of_birth,'age'=>$age);
        return $finalDateResult;

	}

    public function RemoveAssociatedCustomers($id)
    {
        $this->userthread->where('customer_id',$id)->delete();
    }

	public function AssignAssociatedThreads($id,$dateTime)
	{
		$dateTimeInfo = $this->getDateInfo($dateTime);

        $check_if_month_existed = $this->threads->where('name',$dateTimeInfo['month'])->first();
        
        $check_if_year_existed = $this->threads->where('name',$dateTimeInfo['year'])->first();
         

        if (!isset($check_if_month_existed)) {
            $checkmonth = array();
            $checkmonth['name'] = $dateTimeInfo['month'];
            $check_if_month_existed = $this->threads->create($checkmonth);
        }
        /*
            if exists inserting in that thread table otherwise creating new thread and inserting in that respective thread
        */
            $monthresult = $this->userthread->where([
            ['customer_id',$id],
            ['thread_id',$check_if_month_existed->id]
            ])->first();


        /*if user thread exists skip the saving else save the user in that thread*/
        if (empty(trim($monthresult))) {
            $newMonth = array();
            $newMonth['customer_id'] = $id;
            $newMonth['thread_id'] = $check_if_month_existed->id;
            $this->userthread->create($newMonth);
            
        }
        

        if (!isset($check_if_year_existed)) {
            $checkyear = array();
            $checkyear['name'] = $year_of_birth;
            $check_if_year_existed = $this->threads->create($checkyear);
        }

        $yearresult = $this->userthread->where([
            ['customer_id',$id],
            ['thread_id',$check_if_year_existed->id]
            ])->first();
       
        if (empty(trim($yearresult))) {
            $newYear = array();
            $newYear['customer_id'] = $id;
            $newYear['thread_id'] = $check_if_year_existed->id;
            $this->userthread->create($newYear);
            
        }
	}
}

 ?>
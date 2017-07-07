<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;
use App\Models\Device;


class ApiDeviceController extends ApiController
{
   public function __construct()
    {
        $this->device = new Device();
        $this->customer = new Customer();

    }

   public function store(Request $request)
   {
        $request = json_decode(file_get_contents("php://input"),true);
        if (empty($request['device_id'])||empty($request['push_id'])) {
           return $this->fail('Missing Device ID or Push ID');
        }
        else{
            $success = $this->device->firstorcreate($request);
            return $this->success($success); 
          
        }
        
   }

   public function update(Request $request)
   {
        $request = json_decode(file_get_contents("php://input"));
        $device = $this->device->where(['device_id',$request->device_id])->first();
        if(isset($device))
          {
            if ($request->push_id) {
                $device->push_id = $request->push_id;
                $device->save();  
              }
            else{
              $device->push_id = NULL;
              $device->save();
            }
            return $this->success($device);  
          }
    
   }
  

    
}

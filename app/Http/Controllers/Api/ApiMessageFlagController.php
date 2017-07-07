<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;
use App\Models\MessageFlag;

use App\Models\Thread;


class ApiMessageFlagController extends ApiController
{
   public function __construct()
    {
        $this->thread = new Thread();
        $this->customer = new Customer();
        $this->messageflag = new MessageFlag();

    }

   public function store(Request $request)
   {
      $request = json_decode(file_get_contents("php://input"),true);
      if ($request) {
        $this->messageflag->firstOrCreate($request);
        $this->success('Message Successfully Flaged');
      }
      else
      {
        $this->fail('Sorry no valid data on server');
      }

   }

   // public function update($id)
   // {
   //    $request = json_decode(file_get_contents("php://input"));
    
   // }


    
}

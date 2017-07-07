<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;
use App\Models\Friend;


class ApiFriendsController extends ApiController
{
   public function __construct()
    {
        $this->friend = new Friend();
        $this->customer = new Customer();

    }

   public function store(Request $request)
   {
      $request = json_decode(file_get_contents("php://input"),true);
      $success = $this->friend->firstorcreate($request);
      return $this->success($success); 
   }

   public function friendshipAck(Request $request)
   {

        $request = json_decode(file_get_contents("php://input"));
        $user = $this->friend->where([
          ['requested_by',$request->requested_by],
          ['requested_for',$request->requested_for],
          ['status','pending'],
          ])->first();
        // echo "<pre>";
        // print_r($user);
        // die;
        if ($user) {
          $user->status = $request->status;
          $user->save();
          return $this->success($user);
          
        }
        else{
          return fail("Sorry No Friend Request Found");
        }
   }

   public function allFriends($id)
   {
        if ($id) {
          $friends = $this->friend
          ->where('status','accepted')
          ->where('requested_for',$id)
          ->orWhere('requested_by',$id)
          ->with('requested_by')
          ->with('requested_for')
          ->get();
          return $this->success($friends);
          
        }
        else{
            return $this->fail('Please Send User ID');
        }
   }

   public function blockedList($id)
   {
        if ($id) {
          $friends = $this->friend
          ->where('status','blocked')
          ->where('requested_for',$id)
          ->with('requested_by')
          ->get();
          if (empty(trim($friends))) {
            return $this->success('No Blocked Friends');
          }
          else{
            return $this->success($friends);
          }
          
        }
   }

   public function pendingRequests($id)
   {
        if ($id) {
          $friends = $this->friend->where([
            ['requested_for' ,$id],
            ['status','pending']
            ])->with('requested_by')->get();

          if (empty(trim($friends))) {
            return $this->success('Sorry No Pending Friend Requests');
          }
          else{
            return $this->success($friends);
          }
        }
   }

   public function deleteRequest(Request $request)
   {
        $request = json_decode(file_get_contents("php://input"));
        $user = $this->friend->where([
          ['requested_for',$request->requested_for],
          ['requested_by',$request->requested_by],
          ['status','pending']])->first();
        
        $user->delete();
        return $this->success('Successfully Deleted The Request');
    }

    
}

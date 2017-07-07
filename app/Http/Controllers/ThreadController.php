<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\Customer;
use App\Models\Thread;
use App\Models\UserThread;


class ApiThreadController extends ApiController
{
   public function __construct()
    {
        $this->thread = new Thread();
        $this->userthread = new UserThread();
        $this->customer = new Customer();

    }

    public function index()
    {
      $threads = $this->thread->all();
      return View('Threads.index',compact('threads'));
    }

    public function create(){
      return View('Threads.create');
    }

   public function store(Request $request)
   {
        $threads = $this->thread->firstorcreate($request)
        if (empty(trim($threads))) {
            return $this->fail("Sorry Thread Couldnot be created");
        }
        else{
          return redirect('threads');
        }
   }

   public function update($id)
   {
      $thread = $this->thread->find($id);
      $thread->name = $request->name;
      $thread->save();
      return $this->success($thread);
   }


    
}

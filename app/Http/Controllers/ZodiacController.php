<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zodiac;
use App\Models\Thread;

class ZodiacController extends Controller
{


    public function __construct(){
        $this->zodiacs = new Zodiac();
        $this->threads = new Thread();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $zodiacs = $this->zodiacs->all();
        return view('Zodiac.index',['zodiacs' => $zodiacs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Zodiac.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['compatible_zodiacs'] = json_encode($request->compatible_zodiacs);
        $new_inserted_item = $this->zodiacs->create($request->all());

        $check_if_zodiac_existed = $this->threads->where('name',$new_inserted_item->name)->get();
        if (!empty($check_if_zodiac_existed) ) {
            return redirect('zodiacs');
        }
        else{
            $this->threads['name'] = $new_inserted_item->name;
            $this->threads->save();
        return redirect('zodiacs');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zodiac = $this->zodiacs->find($id);
        return View('Zodiac.edit', compact('zodiac'));
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
        //
        $updated_zodiac = $this->zodiacs->find($id);
        $updated_zodiac->name = $request->name;
        $updated_zodiac->zodiac_description = $request->zodiac_description;
        $updated_zodiac->traits = $request->traits;
        $updated_zodiac->gemstone_name = $request->gemstone_name;
        $updated_zodiac->gemstone_description= $request->gemstone_description;
        $updated_zodiac->carat = $request->carat;
        $updated_zodiac->lucky_number = $request->lucky_number;
        $updated_zodiac->lucky_color = $request->lucky_color;
        $updated_zodiac->color_description = $request->color_description;
        $updated_zodiac->compatible_zodiacs = json_encode($request->compatible_zodiacs);

        $updated_zodiac->save();
        return redirect('zodiacs');
    }

}

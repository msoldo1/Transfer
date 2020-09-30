<?php

namespace App\Http\Controllers;

use App\Driver;
use App\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriversController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_company' );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('driver.index')->with('drivers', $user->drivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driver = new Driver();
        return view('driver.create', compact('driver'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Driver::create($this->validateRequest($request));

        return redirect('drivers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        if($driver->user_id == auth()->user()->id){
            return view('driver.show', compact('driver'));
        }
        return redirect('/drivers')->with('error', 'Unauthorized User');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        if($driver->user_id == auth()->user()->id){
            return  view('driver.edit', compact('driver'));
        }
        return redirect('/drivers')->with('error', 'Unauthorized User');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        if($driver->user_id == auth()->user()->id){
            $driver->update($this->validateRequest($request));
        }

        return redirect('drivers/' . $driver->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
            if($driver->user->notifications->count()== 0) {
                if ($driver->user_id == auth()->user()->id) {
                    $driver->offers()->delete();
                    $driver->delete();
                }
            }


        return redirect('drivers/')->with('message','This driver has order to doo');
    }

    private function validateRequest(Request $request){
        $data = new Driver();
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'active'=> 'required',
            'user_id'=>''
        ]);
        $data->fill($request->all());
        $data->user_id = Auth::user()->id;
        return $data->attributesToArray();
    }
}

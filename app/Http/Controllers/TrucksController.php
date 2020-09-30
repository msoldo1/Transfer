<?php

namespace App\Http\Controllers;

use App\Truck;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrucksController extends Controller
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

        return view('truck.index')->with('trucks', $user->trucks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $truck = new Truck();
        return view('truck.create', compact('truck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Truck::create($this->validateRequest($request));
        return redirect('trucks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        if($truck->user_id == auth()->user()->id){
            return view('truck.show', compact('truck'));
        }
        return redirect('/trucks')->with('error', 'Unauthorized User');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        //Check for corect user
        if($truck->user_id == auth()->user()->id){
            return view('truck.edit', compact('truck'));
        }
        return redirect('/trucks')->with('error', 'Unauthorized User');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        if($truck->user_id == auth()->user()->id){
            $truck->update($this->validateRequest($request));
        }

        return redirect('trucks/' . $truck->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        if($truck->user->notifications->count()== 0){
            if($truck->user_id == auth()->user()->id){
                $truck->offers()->delete();
                $truck->delete();
            }

            return redirect('trucks/');
        }
    }

    private function validateRequest(Request $request)
    {
        $data = new Truck();
        $request->validate([
            'brand' => 'required',
            'capacity' => 'required',
            'type' => 'required',

        ]);
        $data->fill($request->all());
        $data->user_id = Auth::user()->id;
        return $data->attributesToArray();
    }
}

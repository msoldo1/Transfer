<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Notifications\Inovice;
use App\Notifications\OrderInovice;
use App\Offer;
use App\Truck;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','acceptOffer','search']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()){
            $offers = Offer::with('company')->paginate(15);
        }elseif(Auth::user()->is_company == 1){
            $offers = Offer::where('company_id', Auth::user()->id)->paginate(15);
        }else{
            $offers = Offer::with('company')->paginate(15);
        }

        return view('offer.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trucks = Truck::all();
        $drivers = Driver::all();
        $offer = new Offer();
        return view ('offer.create', compact('trucks',  'drivers', 'offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Offer::create($this->validateRequest($request));

        return redirect ('offers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        if(Auth::guest()){
            return view('auth.login');
        }
        $user_id = Auth::user()->id;
        return view('offer.show', compact('offer','user_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        $trucks = Truck::all();
        $drivers = Driver::all();
        return view('offer.edit', compact('offer', 'trucks','drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $offer->update($this->validateRequest($request));
        return redirect('offers/' . $offer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect('offers/');
    }

    public function acceptOffer(Offer $offer)
    {
        $offer->customer_id = Auth::user()->id;
        $offer->save();
        $user = User::findOrFail($offer->company_id);
        $user->notify(new Inovice(Auth::user(), $offer->id));
        return redirect('offers');
    }

    public function search(){
        $search_text = $_GET['query'];
        if(Offer::where('start','LIKE','%'.$search_text.'%')->get()->count() != 0 || Offer::where('destination','LIKE','%'.$search_text.'%')->get()->count() != 0){
            $offers = Offer::where('destination','LIKE','%'.$search_text.'%')->get()->merge(Offer::where('start','LIKE','%'.$search_text.'%')->get());
            return view('offer.index', compact('offers'));
        }else{
            $offers = Offer::with('company')->paginate(15);
            return view('offer.index', compact('offers'))->with('message','We are sory there is no destination or start point that match your request');
        }
    }




    private function validateRequest(Request $request)
    {
        $data = new Offer();

        $request->validate([
            'price' =>'required',
            'start' => 'required',
            'destination' => 'required',
            'date'=> 'required',
            'truck_id'=>'required',
            'driver_id'=>'required',
        ]);
        $data->fill($request->all());
        $data->company_id = Auth::user()->id;
        return $data->attributesToArray();
    }
}

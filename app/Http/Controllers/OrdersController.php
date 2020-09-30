<?php

namespace App\Http\Controllers;

use App\Notifications\Inovice;
use App\Notifications\OrderInovice;
use App\Offer;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('is_customer')->except(['index','show','acceptOrder','search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guest()){
            $orders = Order::with('customer')->paginate(15);
        }elseif(Auth::user()->is_customer == 1){
            $orders = Order::where('customer_id', Auth::user()->id)->paginate(15);
        }else{
            $orders = Order::with('customer')->paginate(15);
        }

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        return view ('order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create($this->validateRequest($request));

        return redirect ('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        if(Auth::guest()){
            return view('auth.login');
        }
        $user_id = Auth::user()->id;
        return view('order.show', compact('order','user_id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($this->validateRequest($request));
        return redirect('orders/' . $order->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('orders/');
    }

    public function acceptOrder(Order $order)
    {
        $order->company_id = Auth::user()->id;
        $order->save();
        $user = User::findOrFail($order->customer_id);
        $user->notify(new Inovice(Auth::user(), $order->id));
        return redirect('orders');
    }

    public function search(){
        $search_text = $_GET['query'];
        if(Order::where('start','LIKE','%'.$search_text.'%')->get()->count() != 0 || Order::where('destination','LIKE','%'.$search_text.'%')->get()->count() != 0){
            $orders = Order::where('destination','LIKE','%'.$search_text.'%')->get()->merge(Order::where('start','LIKE','%'.$search_text.'%')->get());
            return view('order.index', compact('orders'));
        }else{
            $orders = Order::with('customer')->paginate(15);
            return view('order.index', compact('orders'))->with('message','We are sory there is no destination or start point that match your request');
        }
    }

    private function validateRequest(Request $request)
    {
        $data = new Order();
        $request->validate([
            'price' => 'required',
            'start' => 'required',
            'destination' => 'required',
            'date'=> 'required'
        ]);
        $data->fill($request->all());
        $data->customer_id = Auth::user()->id;
        return $data->attributesToArray();
    }
}

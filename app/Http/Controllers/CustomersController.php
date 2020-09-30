<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    //

    public function index()
    {
        $users = User::where('is_customer', 1)->get();
        return view('customer.index',compact('users'));
    }

    public function show(User $user)
    {
        $offers = Offer::where('customer_id', $user->id)->get();
        $orders = Order::where('customer_id', $user->id)->get();
        if(auth()->user()->is_admin == 1){
            return view('customer.show', compact('user','orders', 'offers'));
        }
        return redirect('/customers')->with('error', 'Unauthorized User');
    }

    public function edit(User $user)
    {
        if(auth()->user()->is_admin == 1){
            return  view('customer.edit', compact('user'));
        }
        return redirect('/customers')->with('error', 'Unauthorized User');

    }

    public function update(Request $request, User $user)
    {
        if(auth()->user()->is_admin == 1){
            $user->update($this->validateRequest($request));
        }

        return redirect('customers/' . $user->id);
    }

    public function destroy(User $user)
    {
        if($user->notifications->count()== 0) {
            if (auth()->user()->is_admin == 1) {
                $orders = Order::all();
                foreach ($orders as $order){
                    if($order->customer_id == $user->id ){
                        $order->delete();
                    }
                }
                $user->delete();
                return redirect('customers/');
            }
        }

        //Jos završiti
        return redirect('customers/')->with('message','This user has offers on padding');
    }

    private function validateRequest(Request $request){

        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'user_number'=> 'required',
        ]);

        return $data;
    }


}

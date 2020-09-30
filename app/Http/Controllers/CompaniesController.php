<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $users = User::where('is_company', 1)->get();
        return view('company.index',compact('users'));
    }

    public function show(User $user)
    {
        $offers = Offer::where('company_id', $user->id)->get();
        $orders = Order::where('company_id', $user->id)->get();
        if(auth()->user()->is_admin == 1){
            return view('company.show', compact('user','offers','orders'));
        }
        return redirect('/companies')->with('error', 'Unauthorized User');
    }

    public function edit(User $user)
    {
        if(auth()->user()->is_admin == 1){
            return  view('company.edit', compact('user'));
        }
        return redirect('/companies')->with('error', 'Unauthorized User');

    }

    public function update(Request $request, User $user)
    {
        if(auth()->user()->is_admin == 1){
            $user->update($this->validateRequest($request));
        }

        return redirect('companies/' . $user->id);
    }

    public function destroy(User $user)
    {
        if($user->notifications->count()== 0) {
            if (auth()->user()->is_admin == 1) {
                $offers = Offer::all();
                foreach ($offers as $offer){
                    if($offer->company_id == $user->id ){
                        $offer->delete();
                    }
                }
                $user->trucks()->delete();
                $user->drivers()->delete();
                $user->delete();
                return redirect('companies/');
            }
        }

        return redirect('companies/')->with('message','This user has orders to doo, or truck and drivers wont delete');
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

<?php

namespace App\Http\Controllers;

use App\Notifications\OrderInovice;
use App\Offer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InovicesController extends Controller
{
    public function index(){

        $user = Auth::user();
        return view('inovices.index', compact('user'));
    }

    public function show($id){
        $user = Auth::user();
        foreach ($user->notifications as $notification)
        {
            if($notification->data['id']==$id){
                $notification->markAsRead();
                $notification->save();
            }
        }

        if($user->is_company == true){
            $offer = Offer::findOrFail($id);
            return view('inovices.show', compact('offer'));
        }else{
            $order = Order::findOrFail($id);
            return view('inovices.show', compact('order'));
        }

    }

    //nije jos zavrseno destroy
    public function destroy($id){
        $user = Auth::user();
        $user->notification($inovice->id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use Auth;

class ShowController extends Controller
{
    public function orderReal(Request $request){
        $order=new OrderModel;
        $order1=OrderModel::with('order1')->get();
        $order->user_id=$request->get('user_id');
            $cart=session()->get('cart');
            foreach($cart as $data){
                $order=new OrderModel;
                $order->name=$data['name'];
                $order->price=$data['price'];
                $order->quantity=$data['quantity'];
                $order->payment_status=$request->get('payment_status');
                $order->save();
            }
            $request->session()->forget('cart');
            return redirect('/payment1');
            
        }
    
}
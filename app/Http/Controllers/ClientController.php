<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientModel;

class ClientController extends Controller
{
    public function clientView(Request $request){
        return view('client_data');
    }

    public function client(Request $request){
        $data=new ClientModel;
        $data->title=$request->get('title');
        $data->fullname=$request->get('fullname');
        $data->country=$request->get('country');
        $data->state=$request->get('state');
        $data->city=$request->get('city');
        $data->street=$request->get('street');
        $data->bus_stop=$request->get('bus_stop');
        $data->phone_number=$request->get('phone_number');
        $data->email=$request->get('email');
        $data->save();
        return redirect()->back()->withSuccess('Submitted successfully. Redirecting after 5 seconds for payment');
       
        
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class ShowController extends Controller
{
    public function test(Request $request){
        $x=session()->get('user', [10,20,40]);

        dd($x[0]);
    }

} 

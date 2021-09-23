<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\TestModel;
use Auth;

class ShowController extends Controller
{
    public function test(){
     $t1=TestModel::all();
      return view('test', ['t1'=>$t1]);
} 

public function insert(Request $request){
    $t=new TestModel;
    $t->name=$request->get('name');
    $t->save();
    return redirect('/test');
} 

public function edit($id){ 
    $t=TestModel::where('id', $id)->get();
     return view('edit', ['t'=> $t]);
} 

public function update(Request $request, $id){
    $t=TestModel::where('id', $id)->update([
        'name'=>$request->name
    ]);
    // $t->name=$request->get('name');
    // $t->save();
    return back()->with('success', 'Profile updated successfully');
}
}
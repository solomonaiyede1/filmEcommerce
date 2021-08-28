<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function show(Request $request){
       $category=new CategoryModel;
        $category->category_name=$request->category_name;
        $category->save();
        return redirect()->back()->withSuccess('Product saved successfully');
    }


    public function show1(){
        $category1=CategoryModel::all();
        return view('category',['category1'=>$category1]);
    }


} 

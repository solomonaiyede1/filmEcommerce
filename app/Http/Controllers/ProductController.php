<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    public function insert(Request $request){
        $product=new ProductModel;

        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_description=$request->product_description;
        $product->product_image=$request->product_image;
        
        if($file = $request->hasFile('product_image')) {
            $file = $request->file('product_image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = '/images/'.$fileName ;
        }
        $product->save();
        return redirect()->back()->withSuccess('Product saved successfully');
    }


    public function show(){
        $product=ProductModel::all();
        return view('product-admin',['product'=>$product]);
    }

    public function show1(){
        $product=ProductModel::all();
        return view('welcome',['product'=>$product]);
    }


    public function display(Request $request, $id){
                $single_product=ProductModel::where('id', $id)->get();
                 return view('single_product', ['single_product' => $single_product]);            
    }


    public function addToCart(Request $request, $id){
        $product=ProductModel::findOrFail($id);
        $cart=session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                'name'=> $product->product_name,
                'quantity' => $product->product_quantity,
                'price' => $product->product_price,
                'image' => $product->product_image
            ];
        }
        session()->put('cart', $cart);
        session()->flash('success', 'Item added successfully');
        return view('addToCart');


    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  

    public function remove(Request $request, $id)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    // public function addCart($id){
    //         $product=ProductModel::findOrFail($id);
    //         $cart=session()->get('cart', []);
    //         if(isset($cart[$id])){
    //             $cart[$id]['quantity']++;
    //         }else{
    //             $cart[$id]=[
    //                 'name'=> $product->product_name,
    //                 'quantity' => $product->product_quantity,
    //                 'price' => $product->product_price,
    //                 'image' => $product->product_image
    //             ];
    //         }
    //         session()->put('cart', $cart)->back()->with('success', 'Item added successfully');
    // }

}

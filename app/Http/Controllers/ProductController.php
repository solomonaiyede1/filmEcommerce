<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ClientModel;
use App\Models\OrderModel;
use App\Models\User;

class ProductController extends Controller
{
    public function insert(Request $request){
        $product=new ProductModel;
        $product->category_id=$request->category_id;
        $product->product_category=$request->product_category;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_description=$request->product_description;
        $product->product_image=$request->product_image;
        
        if($file = $request->hasFile('product_image')) {
            $file = $request->file('product_image') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            // if(File::exists($destinationPath)){
            //     File::delete($destinationPath);
            // }
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

    public function show2($id){
        $product=ProductModel::where('id', $id)->get();
        return view('product-edit',['product'=>$product]);
    }

    
    public function edit1(){
        return view('product-edit');
    }
    public function update1(Request $request, $id){
        $product=ProductModel::where('id', $id)->update([
            'product_category'=>$request->product_category,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' =>$request->product_description,
            'product_image' => $request->product_image

        ]);
        return redirect('/product-admin');
    }
    public function display(Request $request, $id){
                $single_product=ProductModel::where('id', $id)->get();
                 return view('single_product', ['single_product' => $single_product]);            
    }


    public function addToCart(Request $request, $id){
      
        $product=ProductModel::findOrFail($id);
        $cart=session()->get('cart', []);
    if(isset($cart)){
        $item_id=array_column($cart, 'id');
        if(!in_array($id, $item_id)){
            $item=array(
            'id' => $id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' =>$request->get('quantity')
            );
          $count=count($cart);
          $cart[$count]=$item;
        }else{
            echo "<script>alert('This item has already been added')</script>";
            echo "<script>window.location.href='/' </script>";
        }
    }else{
        $item=array(
            'id' => $id,
            'name' =>$product->product_name,
            'price' =>$product->product_price,
            'quantity' =>$request->get('quantity')
        );
        $cart[0]=$item;
        dd("progress");
    }

    session()->put('cart', $cart);
    session()->flash('success', 'Item added successfully');
    return view('addToCart', ['product' => $product]);




        // if(isset($cart[$id])){
            // $cart[]=[
            // 'name' => $product->product_name,
            // 'price' => $product->product_price,
            // 'quantity'=>$product->product_quantity
            // ];
        // }
        // else{
        //     dd("session not updated");
        // }



        // $cart=session()->get('cart', []);
        // if(isset($cart[$id])){
        //     $cart[$id]['quantity']++;
        // }else{
        //     $cart[$id]=[
        //         'id' => $product->id,
        //         'name'=> $product->product_name,
        //         'price' => $product->product_price,
        //         'quantity' => $product->product_quantity,
        //     ];
        // }
        // session()->put('cart', $cart);
        // session()->flash('success', 'Item added successfully');
        // return view('addToCart');



    }




    // public function update(Request $request)
    // {
    //     if($request->id && $request->quantity){
    //         $cart = session()->get('cart');
    //         $cart[$request->id]["quantity"] = $request->quantity;
    //         session()->put('cart', $cart);
    //         session()->flash('success', 'Cart updated successfully');
    //     }
    // }
  

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
        // return redirect()->back()->withSuccess('Submitted successfully. Redirecting after 5 seconds for payment');
       $cart=session()->get('cart');
        foreach($cart as $data){
            $order=new OrderModel;
            $order->name=$data['name'];
            $order->price=$data['price'];
            $order->quantity=$data['quantity'];
            $order->save();
        }
        
    }

    public function deleteProduct($id){
        $product=ProductModel::find($id);
        $product->delete();
        return redirect('/product-admin');
    }

    public function search(){
        $product=ProductModel::all();
        return view('search',['product'=>$product]);
    }

    public function search1(Request $request){
        $input=$request->get('search');
        $product=ProductModel::where('product_name', 'like', $input .'%')->get();
        return view('search', ['product'=> $product]);
    }

    public function payment(){
        return view('/payment1');
    }

    public function order(){
        return redirect('/payment1');
    }

    public function orderReal(Request $request){
        $order=new OrderModel;
        // $order1=OrderModel::with('orderUser')->get();
            $cart=session()->get('cart');
            foreach($cart as $data){
                $order=new OrderModel;
                $order->name=$data['name'];
                $order->price=$data['price'];
                $order->quantity=$data['quantity'];
                $order->user_id=$request->get('user_id');
                $order->payment_status=$request->get('payment_status');
                $order->save();
            }
            $request->session()->forget('cart');
            return redirect('/payment1');
            
        }

// public function show3(){
//     $product=ProductModel::all();
//     return view('search',['product'=>$product]);
// }
// public function search2(Request $request){
//     $input=$request->get('search');
//     $product=ProductModel::where('product_name', 'like', $input .'%')->get();
//     return view('search', ['product'=> $product]);
// }

public function show3(){
    return view('search');
}
public function search3(Request $request){
    $input=$request->get('search');
    $product=ProductModel::where('product_name', 'like', $input.'%')->get();
    return view('home-search', ['product' =>$product]);
}
}
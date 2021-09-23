
<?php
use App\Models\CategoryModel;
use App\Models\ProductModel;
?>

<body>
@include('sidebar')
<div class="container" style="margin-left: 15%">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Film ID</th>
      <th scope="col">Film Name</th>
      <th scope="col">Film Genres</th>
      <th scope="col">Film Price</th>
      <th scope="col">Film Cover Image</th>
      <th><a href="#" class="btn btn-warning">Action</a></th>
    </tr>
  </thead>
  <tbody>
  @foreach($product as $products)
    <tr>
      <td>{{$products->id}}</td>  
      <td>{{$products->product_name}}</td>
      <td>{{$products->product_category}}</td>
      <td>N{{$products->product_price}}</dh>
      <td><img src="{{url($products->product_image)}}"  height="50" width="50"/></td>
      <form method="post" action="{{url('/product-admin', $products->id)}}">
      {{ method_field('DELETE') }}
         @csrf
      <td><a href="{{url('/product-edit', $products->id)}}" class="btn btn-primary">Edit</a>&nbsp&nbsp&nbsp&nbsp
      <button type="submit" class="btn btn-danger">Delete</button></td>
</form>             
    </tr>
@endforeach
  </tbody>
</table>
 <!-- Check if no result -->
 <?php 
  if($product->count()==0){
       echo "<h4 style='color: red'>Sorry, no result</h4>";
   }
   ?>
</div>
</div>
</body>
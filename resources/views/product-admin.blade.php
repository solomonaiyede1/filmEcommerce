
<?php
use App\Models\CategoryModel;
use App\Models\ProductModel;
?>

<body>
@include('sidebar')
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <h3 style="color: blue">Photofilm</h3>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">You can search,</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Edit and delete films here</a>
    </li>
  </ul>
  <form method="post" action="/product-search" class="ml-auto">
  @csrf
  <input type="text" name="search" placeholder="Search..." required/>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</nav>

 <!-- Button to Open the Modal -->
  @if(session('success'))
  <p class="bg-success text-white">Item saved successfully.</p>
@endif

@if(session('updated'))
  <p class="bg-success text-white">Item Updated successfully.</p>
@endif

<!-- Modal Box  -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Please enter your Film details below:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
        <form method="POST" action="{{url('product-admin')}}" enctype="multipart/form-data">
            @csrf
            @php
                $category=CategoryModel::all();
            @endphp
            @foreach($category as $cat)
            <input type="hidden"  name="category_id" value='{{$cat->id}}'/><br>
            @endforeach

            <label for="category">Genres</label>
        
            <select class="form-control" id="product_category" name="product_category">
                @foreach($category as $categories)
                <option>{{$categories->category_name}}</option>
                @endforeach
            </select>

            <label for="product_name">Film Name</label>
            <input type="text" class="form-control" name="product_name" /><br>

            <label for="product_price">Film price</label>
            <input type="number" class="form-control" name="product_price" /><br>

            <label for="product_description">Film Description</label>
            <input type="text" class="form-control" name="product_description" /><br>

            <label for="product_image">Film  Image</label>
            <input type="file" class="form-control" name="product_image" />
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


<div class="container" style="margin-left: 15%">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Film ID</th>
      <th scope="col">Film Name</th>
      <th scope="col">Film Genres</th>
      <th scope="col">Film Price</th>
      <th scope="col">Film Cover Image</th>
      <th><button class="btn btn-primary" data-toggle="modal" data-target="#myModal" class="float-right">Add Films details here</button></th>
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

</div>
<!--end sidebar -->
</div>
</body>
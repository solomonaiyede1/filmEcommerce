<?php
use App\Models\CategoryModel;
use App\Models\ProductModel;
?>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
  

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Add products
  </button>
  @if(session('success'))
  <p class="bg-success text-white">Item saved successfully.</p>
@endif


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Please enter your product details below:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" action="{{url('product-admin')}}" enctype="multipart/form-data">
            @csrf
            <label for="category">Category</label>
            @php
                $category=CategoryModel::all();
            @endphp
            <select class="form-control" id="product_category">
                @foreach($category as $categories)
                <option>{{$categories->category_name}}</option>
                @endforeach
            </select>

            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" name="product_name" /><br>

            <label for="product_price">Product price</label>
            <input type="number" class="form-control" name="product_price" /><br>

            <label for="product_description">Product Description</label>
            <input type="text" class="form-control" name="product_description" /><br>

            <label for="product_image">Product Image</label>
            <input type="file" class="form-control" name="product_image" />
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">product Image</th>
    </tr>
  </thead>
  <tbody>
  @foreach($product as $products)
    <tr>
      <td>{{$products->id}}</td>  
      <td>{{$products->product_name}}</td>
      <td>N{{$products->product_price}}</dh>
      <td><img src="{{asset('/images/a.jpg')}}"  height="50" width="50"/></td>
      <td><button class="btn btn-primary">Edit</button>&nbsp&nbsp&nbsp&nbsp<button class="btn btn-danger">Delete</button></td>             
    </tr>
@endforeach
  </tbody>
</table>
</body>
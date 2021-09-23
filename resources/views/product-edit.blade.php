<?php
use App\Models\CategoryModel;
use App\Models\ProductModel;
?>

<body>
@include('sidebar')

  @if(session('updated'))
  <p class="bg-success text-white">Item Edited successfully.</p>
@endif

<div class="container" style="width: 40%">
@foreach($product as $products)
        <form method="post" action="{{url('/product-edit', $products->id)}}" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="product_name" value="{{$products->product_name}}"/><br>

            <label for="product_price">Film price</label>
            <input type="number" class="form-control" name="product_price" value="{{$products->product_price}}"/><br>

            <label for="product_description">Film Description</label>
            <input type="text" class="form-control" name="product_description" value="{{$products->product_description}}"/><br>

            <label for="product_image">Film  Image</label>
            <input type="file" class="form-control" name="product_image" />
                @endforeach
            <button type="submit" class="btn btn-primary" name="save">Update</button>
        </form>
</div>
</body>


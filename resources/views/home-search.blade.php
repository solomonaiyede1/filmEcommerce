<!DOCTYPE html>
<html lang="en">
<head>
  <title>Photofilm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
    .container{
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      flex-flow: row wrap;
      justify-content: space-around;
    }
    .card{
      width: 200px;
      height: 150px;
    }
  </style>
</head>
<body>
 
<nav class="navbar navbar-expand-sm bg-light">
<h2 style="color: blue">Photfilm</h2>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/')}}">Home |</a>
    </li>
    @if(Auth::guest())
    <li class="nav-item">
      <a class="nav-link" href="{{url('/login')}}">Login |</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/register')}}">Sign up |</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/addTocart')}}">View cart</a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{url('/dashboard')}}">Dashboard |</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: red">Welcome <i>{{Auth::user()->name}}</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/addToCart')}}">| View cart</a>
    </li>
    @endif
  </ul>
</nav>
<br><br>

<div class="container">
  @foreach($product as $products)
  <a href="{{url('single_product/'.$products->id) }}">
  <div class="card">
    <img class="card-img-top" src="{{url($products->product_image)}}" alt="Card image">
    <div class="card-body">
    <h6><b>Film Genres</b>:{{$products->product_category}}</h6>
    <h6><b>Film Genres</b>:{{$products->product_name}}</h6>
    <h6><b>Film Genres</b>:{{$products->product_price}}</h6>
    </div>
  </div>
  </a>
  @endforeach
  <?php 
  if($product->count()==0){
       echo "<h4 style='color: red'>Sorry, no search result</h4>";
   }
   ?>
</div>

</body>
</html>

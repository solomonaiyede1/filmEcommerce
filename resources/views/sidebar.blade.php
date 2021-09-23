
<?php
use App\Models\CategoryModel;
use App\Models\ProductModel;
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: blue;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: blue;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.content1{
  display: flex;
  flex-direction: row;
  width: 100%;
}
.good1{
  margin-right: 2%;
  float: right;
}
</style>
</head>

<body>

<div class="content1">
<!--side bar here -->
<div class="sidebar">
@if(Auth::user()->role=='admin')
      <b><a class="active" href="#" class="btn btn-success" style="font-size: 15px">Photofilm Admin Dashboard</a></b>
@else
<b><a class="active" href="#" class="btn btn-success" style="font-size: 15px">Photofilm User Dashboard</a></b>
@endif
    <a class="active" href="{{url('/dashboard')}}">Dashboard</a>
    @if(Auth::user()->role=='admin')
    <a href="{{url('/product-admin')}}">Film Upload</a>
    <a href="{{url('/order')}}">Order</a>
    <a href="{{url('/category')}}">Category</a>
    @endif
    <a href="{{url('/category')}}">View Purchase History</a>
    <a href="{{url('/user/profile')}}">Profile setting</a>
</div>

</div>
<!--end sidebar -->
</div>
</body>

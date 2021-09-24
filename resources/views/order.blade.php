
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


@php
$order=App\Models\OrderModel::all();
@endphp
<div class="container" style="margin-left: 15%">
<table class="table">
  <thead class="thead-dark">
      <center><h5 style="color: black">Order information</h5></center>
    <tr>
      <th scope="col">Film ID</th>
      <th scope="col">Film Name</th>
      <th scope="col">Film Price</th>
      <th scope="col">Film Quantity</th>
      <th scope="col">Payment status</th>
      <th scope="col">Date of order</th>
      <th scope="col">Date Updated</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($order as $orders)
    <tr>
        <td>{{$orders->id}}</td>
        <td>{{$orders->name}}</td>
        <td>{{$orders->price}}</td>
        <td>{{$orders->quantity}}</td>
        <td>{{$orders->payment_status}}</td>
        <td>{{$orders->created_at}}</td>
        <td>{{$orders->updated_at}}</td>
    </tr>
  @endforeach
  </tbody>
</table>

</div>
<!--end sidebar -->
</div>
</body>
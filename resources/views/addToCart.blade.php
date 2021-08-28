<?php
use App\Http\Controllers\ClientController
?>
@if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif

    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Marketmasta-shopping cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <!-- Button to Open the Modal -->

  @if (session()->has('success'))
    <script>
       setTimeout(function() {
           window.location.href = "YOUR URL"
       }, 5000); // 2 second
    </script>
@endif

 

<div class="card-body table-responsive">
                  <table class="table table-hover">
                     <thead class="text-warning">
                      <th>Name</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Delete</th>
                    </thead>
                    <tbody>
                    @foreach(session()->get('cart') as $data)
                      <tr>
                          <td>{{$data['name']}}</td>
                          <td>{{$data['price']}}</td>
                          <td>{{$data['quantity']}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @php
                    $total= $data['price']*$data['quantity'];
                    $total=session()->get('total', $total);
                  echo 'total=N'. $total;
                  @endphp
                  <br><br>
                  <a class="btn btn-success" href="{{url('/')}}">Continue Shopping</a>
                  <a class="btn btn-primary" href="{{url('/client_data')}}">Checkout</a>
                </div>


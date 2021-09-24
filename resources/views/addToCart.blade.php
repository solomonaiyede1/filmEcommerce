<?php
  use App\Models\ProductModel;
?>

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
</head>

<body>
<div class="container" style="width: 70%; margin-left: 10%">
<h3>Photofilm Shopping cart</h3>
@if(Auth::guest())
  You are not logged in
@endif

@if(Auth::user())
  You are logged in
@endif
<table class="table-bordered" style="width: 100%;">
<thead class="thead-dark" style="background-color: blue; color: white; height: 50px;">
<tr>
<th><center><b>Film Name</b></center></th>
<th><center><b></b>Film Price(N)</b></center></th>
<th><center><b></b>Film Quantity</b></center></th>
<th><center><b></b>Total price(N)</b></center></th>
</tr>
</thead>
@php
$product=ProductModel::all();
@endphp

<?php
$total=0;
?>
@if(session()->get('cart')!=null)
@foreach(session()->get('cart') as $cart)
<tr border="1">
<td><center>{{$cart['name']}}</center></td>
<td><center>{{$cart['price']}}</center></td>
<td><center>{{$cart['quantity']}}</center></td>
<?php $total1= $cart['price']*$cart['quantity'];?>
<td style="text-align: right"><?php echo 'N'.number_format($total1, 2); ?></td>
<?php
    $total=$total+ $total1;
    $total=number_format($total, 2);
    SESSION(['total'=> $total]);
    session()->get('total');
?>
</tr>
@endforeach
@else
<h3>There is no item on the cart</h3><a href="{{url('/')}}">Please, return back to home page</a>
@endif
<tr>
<td></td>
<td></td>
<td></td>
<td style="text-align: right"><h6>Total: N{{session()->get('total')}}</h6></td>
</tr>
</table>
<form method="post" action="{{url('/payment1')}}" >
@csrf
<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
<input type="hidden" name="payment_status" value='pending'>
<a class="btn btn-primary" href="{{url('/')}}">Continue shopping</a>
<button type="submit" class="btn btn-success">Place an order</button>
</form>
</div>


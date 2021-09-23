@include('navbar')
<br><br><br>
<div class="container">

<div class="description">
@foreach($single_product as $s)
<center>
<img src="{{url($s->product_image)}}" alt="images here" height="300" width="300"><br>
{{$s->product_name}} <br> 
Price: N{{$s->product_price}}<br>
{{$s->product_description}} <br>
<form method="post" action="{{url('/addToCart', $s->id)}}" >
@csrf
quantity<input type="number" name="quantity" required><br>
<button type="submit" value="add to cart">Add to cart</button> </p>
</form>
<a href="{{url('/addToCart', $s->id)}}">Add to cart</a> </p>
</center>
@endforeach

</div>
</div>
</body>
</html>
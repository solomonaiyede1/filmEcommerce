

<h1>Product Description</h1>

@foreach($single_product as $s)
{{$s->product_name}} <br>
{{$s->product_price}}<br>
{{$s->product_description}}
<img src="{{url($s->product_image)}}" alt="images here"> 
quantity<input type="number" name="quantity"><a href="{{url('/addToCart', $s->id)}}">Add to cart</a> </p>
@endforeach
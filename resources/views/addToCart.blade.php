<?php
  use App\Models\ProductModel;
?>

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
@foreach(session()->get('cart') as $cart)
<tr border="1">
<td><center>{{$cart['name']}}</center></td>
<td><center>{{$cart['price']}}</center></td>
<td><center>{{$cart['quantity']}}</center></td>
<?php $total1= $cart['price']*$cart['quantity'];?>
<td><center><?php echo number_format($total1); ?></center></td>
<?php
    $total=$total+ $total1;
?>
</tr>
@endforeach
</table>
<?php
echo $total;
?>


















  <!-- <script>
  var x=@php echo session()->get('total'); @endphp;
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_c9124b21485268af8dd8ad2f9aa0e90b4ea47a25',
      email: 'customer@email.com',
      amount: x*100,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);

       setTimeout(function() {
           window.location.href = "/successful_payment"
       }, 2000); // 2 second

      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script> -->
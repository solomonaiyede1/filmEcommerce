<html lang="en">
<head>
  <title>Photfilm</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>

<div class="alert alert-success"><h3>Photofilm</h3></div>

<form>
  <script src="https://js.paystack.co/v1/inline.js"></script>
</form>
<a href="#" class="btn btn-success">Total Amount to pay</a><br>
N @php echo session()->get('total'); @endphp
<br>
<button class="btn btn-primary" onclick="payWithPaystack()">Pay with debit card</button><br>


<script>
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
</script>

</body>

</html>
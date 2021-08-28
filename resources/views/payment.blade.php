<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron">
<form name="form1">
    <input type="radio" id="payment_type1" name="payment_type" value="Transfer" onchange="c()">Electronic Transfer<br>
    <input type="radio" id="payment_type2" name="payment_type" value="Pay on Delivery" onchange="c()">Pay on Delivery<br>
    <input type="radio" id="payment_type3" name="payment_type" value="Pay with debit card" onchange="c()">Pay with Debit Card
</form>
</div>
<script>
var x1=document.getElementById('payment_type1');
var x2=document.getElementById('payment_type2');
var x3=document.getElementById('payment_type3');
function c(){
  if(x1.checked){
    setTimeout(function() {
           window.location.href = "/payment1"
       }, 3000); // 2 second
  }

  if(x2.checked){
    setTimeout(function() {
           window.location.href = "/payment2"
       }, 3000); // 2 second
  }

  if(x3.checked){
    setTimeout(function() {
           window.location.href = "/payment3"
       }, 3000); // 2 second
  }
}
</script>

</div>
</body>
</html>

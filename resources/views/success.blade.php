<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  die("This is restricted page.You are not allowed here");
}

?>

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

<div class="alert alert-success">
<h4>Your transaction is successful. You will be contacted within 3-5 working days</h4>

<h4>Thanks for transacting with photfilm. Redirecting to home page...</h4>
</div>
<script>
   setTimeout(function() {
           window.location.href = "/"
       }, 3000); // 2 second
</script>
</body>

</html>
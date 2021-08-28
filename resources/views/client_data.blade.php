<?php
use App\Http\Controllers\ClientController
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

  <!-- Button to Open the Modal -->

  

 <!-- The Modal -->
 <div class="container" style="width: 50%; height: 500px">
       <div class="alert alert-info">
        Please fill in your details below
       </div>

        @if (session()->has('success'))
        <div class="alert alert-primary">
         Submitted successfully. You will be redirected after 7 seconds........
    <script>
       setTimeout(function() {
           window.location.href = "/payment"
       }, 7000); // 2 second
        </script>
        </div>
        @endif
       

        <form method="POST" action="{{url('client_data')}}">
            @csrf
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required/><br>

            <label for="full_name">Fullname</label>
            <input type="text" class="form-control" name="fullname" required/><br>

            <label for="country">Country</label>
            <input type="text" class="form-control" name="country" required/><br>

            <label for="state">State</label>
            <input type="text" class="form-control" name="state" required/><br>

            <label for="city">City</label>
            <input type="text" class="form-control" name="city" required/><br>

            <label for="street">Street</label>
            <input type="text" class="form-control" name="street" required/><br>

            <label for="bus_stop">Nearest Bus stop</label>
            <input type="text" class="form-control" name="bus_stop" required/><br>

            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" required/><br>

            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" required /><br>

            <button type="submit" class="btn btn-primary" name="save">Submit</button>
        </form>
        </div>


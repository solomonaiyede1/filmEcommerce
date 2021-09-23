<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Marketmasta</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style>
      .nav-link{
        color: white;
      }
    </style>
  </head>

  <body>

<nav class="navbar navbar-expand-sm bg-dark">
<h2 style="color: white">Photfilm</h2>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/')}}">Home |</a>
    </li>
    @if(Auth::guest())
    <li class="nav-item">
      <a class="nav-link" href="{{url('/login')}}">Login |</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/register')}}">Sign up |</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/addTocart')}}">View cart</a>
    </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{url('/dashboard')}}">Dashboard |</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" style="color: red">Welcome <i>{{Auth::user()->name}}</i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('/addTocart')}}">| View cart</a>
    </li>
    @endif
  </ul>
</nav>
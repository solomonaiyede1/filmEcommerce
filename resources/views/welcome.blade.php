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

    <title>Photfilms</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/tooplate-main.css">
    <link rel="stylesheet" href="assets/css/owl.css">
  </head>

  <body>

<nav class="navbar navbar-expand-sm bg-dark">
<h2 style="color: blue">Photfilm</h2>
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
      <a class="nav-link" href="{{url('/addToCart')}}">| View cart</a>
    </li>
    @endif
  </ul>
  <form method="post" action="/home-search" class="ml-auto">
  @csrf
  <input type="text" name="search" placeholder="Search..." required/>
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</nav>
  <!--Film product display  -->
  <div class="featured-items">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
            @foreach($product as $products)
            <a href="{{url('single_product/'.$products->id) }}">
                <div class="featured-item">
                  <img src="{{url($products->product_image)}}" height="200"  width="200" alt="images here">
                  <center>
                  <h4><b>Film Genres</b>:{{$products->product_category}}</h4>
                  <h4><b>Film Title</b>:{{$products->product_name}}</h4>
                  <h6><b>Film Cost</b>:N{{$products->product_price}}.00</h6>
                  </center>
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Subscribe Form Starts Here -->
    <div class="subscribe-form">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <div class="line-dec"></div>
              <h1>Subscribe on Photofilm now!</h1>
            </div>
          </div>
          <div class="col-md-8 offset-md-2">
            <div class="main-content">
              <p>You can get the best with us now</p>
              <div class="container">
                <form id="subscribe" action="" method="get">
                  <div class="row">
                    <div class="col-md-7">
                      <fieldset>
                        <input name="email" type="text" class="form-control" id="email" 
                        onfocus="if(this.value == 'Your Email...') { this.value = ''; }" 
                    	onBlur="if(this.value == '') { this.value = 'Your Email...';}"
                    	value="Your Email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-5">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">Subscribe Now!</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Subscribe Form Ends Here -->


    
    <!-- Footer Starts Here -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="logo">
              Photofilms
            </div>
          </div>
          <div class="col-md-12">
            <div class="social-icons">
              <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer Ends Here -->


    <!-- Sub Footer Starts Here -->
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>Copyright &copy; Photofilm 
                
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Sub Footer Ends Here -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>

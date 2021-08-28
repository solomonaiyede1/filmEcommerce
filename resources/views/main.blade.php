<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- <link href="{{ asset('userback/css/panel/toastr.min.css" rel="stylesheet" type="text/css') }}" /> --}}
  {{-- <link href="{{ asset('userback/css/panel/jquery-editable-select.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('userback/css/panel/medium-zoom.css') }}" rel="stylesheet" type="text/css"> --}}
   <link rel="stylesheet" href="{{ asset('userback/css/main.css') }}">
  <script src="{{ asset('userback/js/modernizr-2.6.2.min.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('userback/dropify/dropify.min.css') }}">

<script>(function(w,d,u){w.readyQ=[];w.bindReadyQ=[];function p(x,y){if(x=="ready"){w.bindReadyQ.push(y);}else{w.readyQ.push(x);}};var a={ready:p,bind:p};w.$=w.jQuery=function(f){if(f===d||f===u){return a}else{p(f)}}})(window,document)</script>

<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>
    


 <meta charset="UTF-8">
    <title>chatapp</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.3/handlebars.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    
    
@yield('stylesheet')



<body>
    


  <div id="app">
      @include('sidebar')

      <div class="has-sidebar-left sti">
        <div class="pos-f-t">
          <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
              <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text" placeholder="start typing...">
              </div>
              <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
            </div>
          </div>
        </div>
        <div class="sticky">
          <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar green accent-3">
            <div class="relative">
              <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                <i></i>
              </a>
            </div>

            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li>
                  <a class="nav-link ml-2" data-toggle="control-sidebar">
                  </a>
                </li>

                <li class="dropdown custom-dropdown user user-menu ">
                  <div class="avatar">
                    <span class="avatar-letter avatar-letter-t circle green"></span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <div id="app">


          @yield('contents')
      </div>
  </div>

</body>
</html>

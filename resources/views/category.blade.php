<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  

  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Create Category
  </button>
  @if(session('success'))
  <p class="bg-success text-white">Category created successfully.</p>
@endif

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Please enter your category name:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form method="post" action="{{url('/category')}}">
            @csrf
            <label for="category">Create category</label><br>
            <input type="text" class="form-control" name="category_name" placeholder="Enter category name"><br><br>
            <button class="btn btn-primary" type="submit">Create category</button>

        </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
    </tr>
  </thead>
  <tbody>
  @foreach($category1 as $categories)
    <tr>
      <td>{{$categories->id}}</td>  
      <td>{{$categories->category_name}}</td>
      <td><button class="btn btn-primary">Edit</button>&nbsp&nbsp<button class="btn btn-danger">Delete</button></td>             
    </tr>
@endforeach
  </tbody>
</table>

</body>
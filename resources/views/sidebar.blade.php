@yield('content')
<head>
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: blue;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: white;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: blue;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
                
                <div class="sidebar">
                    <a class="active" href="{{url('/dashboard')}}">Dashboard</a>
                    <a href="{{url('/product-admin')}}">Product</a>
                    <a href="{{url('/order')}}">Order</a>
                    <a href="{{url('/category')}}">Category</a>
                    <a href="{{url('/miscellaneous')}}">Miscellaneous</a>
                </div>

                <div class="content">
                    <h2>Responsive Sidebar Example</h2>
                    
                </div>

      
</x-app-layout>

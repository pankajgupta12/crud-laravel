<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css//bootstrap.min.css') }}" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      
      @if(session()->has('id')) 
      <li><a href="/dashboard">Dashboard</a></li>
      <li><a href="/userlist">User List</a></li>
      <li><a href="/product">Product</a></li>
      <li><a href="/productlist">List</a></li>
      <li><a href="/aboutus">About us</a></li>
	    <li><a href="/contactus">Contact us</a></li>
      @else 
      <li class="active"><a href="./">Home</a></li>
     @endif
    </ul>
    <ul class="nav navbar-nav" style="float: right;">
     

      @if(session()->has('id'))
      <li><a href="javascript:void(0);">Welcome : {{ Session::get('name')  }}</a></li>
      <li><a href="/logout">logout</a></li>\
      @else
      <li><a href="/userlogin">Login</a></li>
      <li><a href="/registration">Registration</a></li>
      @endif
	    
    </ul>
  </div>
</nav>
  


<div class="container">
    @yield('header')
</div>



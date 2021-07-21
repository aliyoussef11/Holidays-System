@extends('design.bootstrap-head')

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.dot {
  height: 21px;
  width: 24px;
  background-color: white;
  border-radius: 60%;
  display: inline-block;
}
</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Holidays System</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="/admin">Admin Page</a></li>
      <li><a href="/show-requests">Notification <span class="dot"><span style="visibility: hidden;">.</span>
      <span style="color: black;"><?php echo $requests_number; ?></span> </a></li>
      <li class="active"><a href="/Contact-Us">Contact Us</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo Auth::User()->name;?></a></li>
      <li><a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> 
        Logout</a>
      </li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
      </form>
      
    </ul>
  </div>
</nav>
<div style="text-align:center;">
<img src="/img/Contact-Us.jpg" alt="Leave Image" width=40% height=40%><br>
<a class="mailto" href="mailto:asy085@usal.edu.lb">
       <p><span class="glyphicon glyphicon-envelope"></span>: Our Mail</p>
</a>
    <p style="color:black;"><span class="glyphicon glyphicon-phone"></span>: 70082977</p>
</div>

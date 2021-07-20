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
      <li><a href="/academic">Academic Page</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/non-academic-statistics">Statistics</a></li>
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

<div class="container">

@if (\Session::has('not-deleted'))
<div class="alert alert-danger">
  <ul>
    <li>{!! \Session::get('not-deleted') !!}</li>
      </ul>
    </div>
@endif

<?php if($holidays->count() > 0){?>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
      <th>Name</th>
      <th>Role</th>
      <th>Title</th>
      <th>Date</th>
      <th></th>
      </tr>
      </thead>
                
      <tbody>        
      <?php
      
      foreach($holidays as $OneHoliday){
  
      
      ?>
      <tr>
      <td><?php echo $OneHoliday -> name?> </td>
      <td><?php echo $OneHoliday -> role?> </td>
      <td><?php echo $OneHoliday -> title?> </td>
      <td><?php echo $OneHoliday -> date?> </td>
      <td><a href="<?php echo "/delete-non-academic-holiday/".$OneHoliday -> name."/".$OneHoliday -> role."/".$OneHoliday -> title."/".$OneHoliday -> date; ?> " 
      onclick="confirm ('Are you sure you want delete this Holiday?')" class="btn btn-danger">Delete</a></td>
      </tr>

      <?php
      }}else{?>
        <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Note</div>
                <div class="panel-body">
                There are No Holidays Yet!
                </div>
                </div>
              </div>
          </div>  
        </div>
        </div>
      <?php
      }
      ?>
</div>
</body>
</html>
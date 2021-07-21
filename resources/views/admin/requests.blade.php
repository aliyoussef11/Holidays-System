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
      <li  class="active"><a href="/show-requests">Notification  <span class="dot"><span style="visibility: hidden;">.</span>
      <span style="color: black;"><?php echo $requests_number; ?></span> </a>
      </li>
      <li><a href="/Contact-Us">Contact Us</a></li>
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

@if (\Session::has('not-accepted'))
<div class="alert alert-danger">
  <ul>
    <li>{!! \Session::get('not-accepted') !!}</li>
      </ul>
    </div>
@endif
@if (\Session::has('accepted'))
  <div class="alert alert-success">
  <ul>
  <li>{!! \Session::get('accepted') !!}</li>
  </ul>
  </div>
@endif

<?php
$requests = DB::table('requests')->get();
if($requests->count() >0){
?>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
      <th>Name</th>
      <th>Role</th>
      <th>Title</th>
      <th>Details</th>
      <th>Date</th>
      <th></th>
      <th></th>
      </tr>
      </thead>
                
      <tbody>        
      <?php
      foreach($requests as $OneRequest){
  
      $name_of_user = $OneRequest -> name;
      $data = DB::table('users')->where('name', '=', $name_of_user)->get();
      foreach($data as $take_email){
        $email = $take_email->email;
      }
      
      ?>
      <tr>
      <td><?php echo $OneRequest -> name ?> </td>
      <td><?php echo $OneRequest -> role ?> </td>
      <td><?php echo $OneRequest -> title?> </td>
      <td><?php echo $OneRequest -> details?> </td>
      <td><?php echo $OneRequest -> date?> </td>
      <td><a href="<?php echo "/accept-request/".$OneRequest->name."/".$OneRequest->role."/".$OneRequest->title."/".$OneRequest->date ?>" onclick="confirm ('Are you sure you accept this Holiday?')" class="btn btn-success">Accept</a></td>
      <td><a href="<?php echo "/decline-request/".$OneRequest->name."/".$OneRequest->role."/".$OneRequest->title."/".$OneRequest->date ?>" onclick="confirm ('Are you sure you reject this Holiday?')" class="btn btn-danger">Decline</a></td>
      </tr>

      <?php
      }}
      ?>


<?php 
$all_edit_requests = DB::table('edit-holidays-requests')->get(); 
if($all_edit_requests->count() > 0){
?>
<table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
      <th>Name</th>
      <th>Role</th>
      <th>Title</th>
      <th>Details</th>
      <th>Previous Date</th>
      <th>New Date</th>
      <th></th>
      <th></th>
      </tr>
      </thead>
                
      <tbody>        
      <?php  
      $edit_request = DB::table('edit-holidays-requests')->get();
      foreach($edit_request as $OneEdit){
  
      $name_of_user = $OneEdit -> name;
      $data = DB::table('users')->where('name', '=', $name_of_user)->get();
      foreach($data as $take_email){
        $email = $take_email->email;
      }
      
      ?>
      <tr>
      <td><?php echo $OneEdit -> name ?> </td>
      <td><?php echo $OneEdit -> role ?> </td>
      <td><?php echo $OneEdit -> title?> </td>
      <td><?php echo $OneEdit -> details?> </td>
      <td><?php echo $OneEdit -> previousDate?> </td>
      <td><?php echo $OneEdit -> newDate?> </td>
      <td><a href="<?php echo "/accept-edit-request/".$OneEdit->name."/".$OneEdit->role."/".$OneEdit->title."/".$OneEdit->previousDate."/".$OneEdit->newDate ?>" onclick="confirm ('Are you sure you accept editing of this Holiday?')" class="btn btn-success">Accept</a></td>
      <td><a href="<?php echo "/decline-edit-request/".$OneEdit->name."/".$OneEdit->role."/".$OneEdit->title."/".$OneEdit->previousDate."/".$OneEdit->newDate ?>" onclick="confirm ('Are you sure you reject editing of this Holiday?')" class="btn btn-danger">Decline</a></td>
      </tr>

      <?php
      }}

      if($requests->count() + $all_edit_requests->count() == 0){?>
        <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Note</div>
                <div class="panel-body">
                There is No Request!
                </div>
                </div>
              </div>
          </div>  
        </div>
        </div>
     <?php }
      ?>
</div>
</body>
</html>
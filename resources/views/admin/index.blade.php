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
      <li class="active"><a href="#">Admin Page</a></li>
      <li><a href="/show-requests">Notification <span class="dot"><span style="visibility: hidden;">.</span>
      <span style="color: black;"><?php echo $requests_number; ?></span> </a></li>
      <li><a href="#">Page 2</a></li>
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
<h2 style="text-align:center;">Users</h2>
      @if (\Session::has('NotDeleted'))
          <div class="alert alert-danger">
              <ul>
                <li>{!! \Session::get('NotDeleted') !!}</li>
                </ul>
                </div>
                @endif
                @if (\Session::has('Deleted'))
                <div class="alert alert-success">
                <ul>
                <li>{!! \Session::get('Deleted') !!}</li>
          </ul>
          </div>
         @endif
         @if (\Session::has('NotEdited'))
          <div class="alert alert-danger">
              <ul>
                <li>{!! \Session::get('NotEdited') !!}</li>
                </ul>
                </div>
                @endif
                @if (\Session::has('Edited'))
                <div class="alert alert-success">
                <ul>
                <li>{!! \Session::get('Edited') !!}</li>
          </ul>
          </div>
         @endif
    <table class="table table-striped table-bordered table-hover"  id="Users">
        <thead>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Delete</th>
        <th>Edit</th>
        </tr>
        </thead>
        <tbody>        
        <?php
        use App\User;
        $users = User::All();

        foreach($users as $user){    
        ?>
        <tr>
        <td><?php echo $user -> name ?> </td>
        <td><?php echo $user -> email ?> </td>
        <td><?php echo $user -> role ?> </td>
        <td><a href= <?php echo "/delete/".$user->email ?> onclick="return confirm('Are you sure you want delete <?php echo $user->name;?> ?')">Delete</a></td>
        <td><a href= <?php echo "/edit/".$user->email?>>Edit</a></td>                    
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>    

<h2 style="text-align:center;">Manage Holidays</h2>
<div style="width:980px;">
    <div style="float: left; width: 400px"> 
    <?php
    // $Is_Managed = DB::table('academic-holidays-condition')->get();
    $Is_Managed = DB::table('holidays-conditions')->where('role', '=', "Academic")->get();
    $Is_Managed = $Is_Managed->count();
    ?>
        <?php 
        if($Is_Managed > 0){?>
        <a style="margin-left:200px;" href=<?php echo '/admin/update-academic-holidays';?>
        class= "btn btn-primary">Update Academic Holidays</a>
        <?php }
        else{?>
        <a style="margin-left:200px;" href= <?php echo 'admin/Manage-Academic-Holidays'; ?> 
        class= "btn btn-primary">Manage Academic Holidays</a>
        <?php }
        ?>
        
    </div>
    <div style="float: right; width: 225px"> 
    <?php
    // $Is_Managed_non_academic = DB::table('non-academic-holidays-condition')->get();
    $Is_Managed_non_academic = DB::table('holidays-conditions')->where('role', '=', "Non-Academic")->get();
    $Is_Managed_non_academic = $Is_Managed_non_academic->count();
    ?>
    <?php 
        if($Is_Managed_non_academic > 0){?>
        <a  href=<?php echo '/admin/update-non-academic-holidays';?>
        class= "btn btn-primary">Update Non Academic Holidays</a>
        <?php }
        else{?>
        <a  href= <?php echo 'admin/Manage-Non-Academic-Holidays'; ?> 
        class= "btn btn-primary">Manage Non Academic Holidays</a>
        <?php }
        ?>
    </div>
</div>

</div>


</body>
</html>
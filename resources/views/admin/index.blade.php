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
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}


/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  text-decoration: none;
  cursor: pointer;
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
         <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>
                <div class="panel-body">
           
                <button id="myBtn" class="btn btn-dark">Add User</button><br><br>
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
        $users = User::Where('role', '!=' ,'Admin')->get();

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
    </div>
                </div>
              </div>
          </div>  
        </div>
        </div>

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
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: black; font-size: 20px; text-align: center; color:white;">
                <span class="close" style="color:white;">&times;</span>
                Add User
                </div>
                <div class="panel-body">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/admin">Admin Page</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
                </nav>
                <form class="form-horizontal" method="POST" action="/admin-add-user">
                        {{ csrf_field() }}

                        @if (\Session::has('success'))
                        <div class="alert alert-success">
                        <ul>
                        <li>{!! \Session::get('success') !!}</li>
                        </ul>
                        </div>
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6" style="margin-top:7px;">
                            <select id='role' name ="role" class="form-control">
                            <option value= 'academic'>Academic</option>
                            <option value= 'non-academic'>Non-Academic</option>
                            </select>
                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
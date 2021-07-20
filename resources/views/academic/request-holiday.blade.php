<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Add Holiday </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Holidays System</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/academic">Academic Page</a></li>
    </ul>
    <ul class="nav navbar-nav">
      <li><a href="/academic-statistics">Statistics</a></li>
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
<body>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: black; font-size: 20px; text-align: center; color:white;">
                Request A Holiday
                </div>
                <div class="panel-body">
                <h2>Task: Add Data</h2>
                <form method="POST" action="/store-academic">

                {{ csrf_field() }}
                <label for="">Enter Simple Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter the Name" required/><br /><br />
                
                <label for="">Enter The Reasons Of Your Holiday</label>
                <input type="text" class="form-control" name="details" placeholder="Enter the Reason" required/><br /><br />

                <label for="">Enter Date Of Holiday</label>
                <input type="date" class="form-control" name="date" placeholder="Enter the Date" required/><br /><br />

                <input type="submit" name="submit" class="btn btn-primary" style="margin-left: 300px;" value="Send Request" />
                
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
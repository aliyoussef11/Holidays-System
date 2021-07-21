<!doctype html>
<html lang="en">
<body>
<head>
<style>
.bs-example{
    	margin: 20px;
        position: relative;
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

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
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
    
<div class="container" style ="margin-top: 30px;">
  <div class="row" style="text-align:center; width: 500px; margin-left:270px;">
    <button id="myBtn" class="btn btn-success">ADD Holiday</button>
    <a href="/edit-a-holiday-academic" class="btn btn-primary">Edit Holidays</a>
    <a href="/delete-a-holiday-academic" class="btn btn-danger">Delete Holidays</a>
    <br>
    @if (\Session::has('success'))
    <div class="alert alert-success">
    <ul>
    {!! \Session::get('success') !!}
    </ul>
    </div>
    @endif
    @if (\Session::has('failed'))
    <div class="alert alert-danger">
    <ul>
    {!! \Session::get('failed') !!}
    </ul>
    </div>
    @endif  
  </div>
    <br>
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: black; font-size: 20px; text-align: center; color:white;">
                Your Holidays
                </div>

                <div class="panel-body">
                {!! $calendar->calendar() !!}
                {!! $calendar->script() !!}
                <h6><b>Remaining Holidays This Year: <?php echo $Remaining_holidays_per_year; ?></b></h6>
                <h6>Remaning Holidays in January: <?php echo $Remaining_holidays_in_January; ?></h6>
                <h6>Remaning Holidays in February: <?php echo $Remaining_holidays_in_February; ?></h6>
                <h6>Remaning Holidays in March: <?php echo $Remaining_holidays_in_March; ?></h6>
                <h6>Remaning Holidays in April: <?php echo $Remaining_holidays_in_April; ?></h6>
                <h6>Remaning Holidays in May: <?php echo $Remaining_holidays_in_May; ?></h6>
                <h6>Remaning Holidays in June: <?php echo $Remaining_holidays_in_June; ?></h6>
                <h6>Remaning Holidays in July: <?php echo $Remaining_holidays_in_July; ?></h6>
                <h6>Remaning Holidays in August: <?php echo $Remaining_holidays_in_August; ?></h6>
                <h6>Remaning Holidays in September: <?php echo $Remaining_holidays_in_September; ?></h6>
                <h6>Remaning Holidays in October: <?php echo $Remaining_holidays_in_October; ?></h6>
                <h6>Remaning Holidays in November: <?php echo $Remaining_holidays_in_November; ?></h6>
                <h6>Remaning Holidays in December: <?php echo $Remaining_holidays_in_December; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>  

<?php 
$notifications_info = DB::table('notifications')->where('name', '=', Auth::User()->name)->where('role', '=', Auth::User()->role)
->get();

foreach($notifications_info as $one_notification){
?>
<div class="well well-sm" style="float:right;">Notification!
<br>
Your Holiday on <?php echo $one_notification->date;?> <?php echo $one_notification->response;?>
 By Your responsible!<br>
 <a href="<?php echo "Hide-Academic/".$one_notification->name."/".$one_notification->role
 ."/".$one_notification->title."/".$one_notification->date."/".$one_notification->response; ?>">Hide...</a></div>
<?php } ?>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: black; font-size: 20px; text-align: center; color:white;">
                <span class="close" style="color:white;">&times;</span>
                Request A Holiday
                </div>
                <div class="panel-body">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/academic">Home Page</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Add Holiday</li>
                </ol>
                </nav>
                <form method="POST" action="/store-academic">

                {{ csrf_field() }}
                <label for="">Enter Simple Title</label>
                <input type="text" class="form-control" name="title" placeholder="Enter Title" required/><br /><br />
                
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
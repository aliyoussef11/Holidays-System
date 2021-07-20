<!doctype html>
<html lang="en">
<body>
<head>
<style>
.bs-example{
    	margin: 20px;
        position: relative;
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
      <li class="active"><a href="/academic-statistics">Statistics</a></li>
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
    <a href="/request-a-holiday-academic" class="btn btn-success">ADD Holiday</a>
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
                Choose Your Holiday
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
</body>
</html>
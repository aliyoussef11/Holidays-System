Skip to content
Search or jump to…

Pull requests
Issues
Marketplace
Explore

@aliyoussef11
aliyoussef11
/
Holidays-System
Private
1
00
Code
Issues
Pull requests
Actions
Projects
Security
Insights
Settings
Holidays-System/resources/views/admin/manage-non-academic-holidays.blade.php
@aliyoussef11
aliyoussef11 Add project files.
Latest commit 67c49ba yesterday
History
1 contributor
228 lines (222 sloc) 6.39 KB

@extends('design.bootstrap-head')

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
    <?php   $all_requests = DB::table('requests')->get();
        $requests_number = $all_requests->count(); ?>
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
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
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
        <nav aria-label="breadcrumb" style="width:30%; margin-left:210px;">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Admin Page</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Non-Academic Holidays</li>
            </ol>
        </nav>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            @if (\Session::has('Managed'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('Managed') !!}</li>
                                </ul>
                            </div>
                            @endif
                            @if (\Session::has('Not Managed'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('Not Managed') !!}</li>
                                </ul>
                            </div>
                            @endif

                            <form method="POST" action="/admin/manage-non-academic-holidays">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="text" class="form-control" value="Non-Academic" name="Role" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value=<?php echo Auth::User()->name;?>
                                        name="Name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="HolidaysPerYear">Holidays Per Year</label>
                                    <select class="form-control" name="SelectHolidaysPerYear">
                                        <?php
    for ($i=1; $i<=30; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInJanuary">Holidays In January</label>
                                    <select class="form-control" name="SelectHolidaysInJanuary">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInFebruary">Holidays In February</label>
                                    <select class="form-control" name="SelectHolidaysInFebruary">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInMarch">Holidays In March</label>
                                    <select class="form-control" name="SelectHolidaysInMarch">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInApril">Holidays In April</label>
                                    <select class="form-control" name="SelectHolidaysInApril">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInMay">Holidays In May</label>
                                    <select class="form-control" name="SelectHolidaysInMay">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInjune">Holidays In June</label>
                                    <select class="form-control" name="SelectHolidaysInjune">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInJuly">Holidays In July</label>
                                    <select class="form-control" name="SelectHolidaysInJuly">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInAugust">Holidays In August</label>
                                    <select class="form-control" name="SelectHolidaysInAugust">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInSeptember">Holidays In September</label>
                                    <select class="form-control" name="SelectHolidaysInSeptember">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInOctober">Holidays In October</label>
                                    <select class="form-control" name="SelectHolidaysInOctober">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInNovember">Holidays In November</label>
                                    <select class="form-control" name="SelectHolidaysInNovember">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                    <label for="HolidaysInDecember">Holidays In December</label>
                                    <select class="form-control" name="SelectHolidaysInDecember">
                                        <?php
    for ($i=0; $i<=10; $i++)
    {
        ?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php
    }
    ?>
                                    </select><br>
                                </div>

                                <input type="submit" name="submit" class="btn btn-primary" style="margin-left: 250px;"
                                    value="Save and Manage" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    © 2021 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Docs
    Contact GitHub
    Pricing
    API
    Training
    Blog
    About
    Loading complete{"mode":"full","isActive":false}
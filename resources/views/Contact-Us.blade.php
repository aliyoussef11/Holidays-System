<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Holidays System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-a11y="true"></script>
    <!-- Styles -->
    <style>
    html,
    body {
        background-color: white;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .top-left {
        position: absolute;
        left: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links>a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    a:hover {
        background-color: #eaeae1;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .top-center {
        position: absolute;
        top: 18px;
    }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="top-left links">
            <a href="/About-Us">About Us</a>
            <a href="/Contact-Us">Contact Us</a>
            <hr>
        </div>
        <div class="top-center links">
            <a href="/">Holidays System</a>
            <hr>
        </div>
        <div class="top-right links">
            <!-- @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else -->
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            <!-- @endif -->
            <hr>
        </div>

        <div class="content">
            <div style="text-align:center;">
                <img src="/img/Contact-Us.jpg" alt="Contact Us" width=40% height=40%><br>
                <a class="mailto" href="mailto:asy085@usal.edu.lb" style="color:black">
                    <p><i class="fa fa-envelope" aria-hidden="true"></i><b> : Our Mail</b></p>
                </a>
                <p style="color:black;"><i class="fa fa-phone" aria-hidden="true"></i><b> : 70082977</b></p>
            </div>
        </div>
    </div>
</body>

</html>
<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Holidays System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

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

    .top-center {
        position: absolute;
        top: 18px;
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

    .m-b-md {
        margin-bottom: 30px;
    }

    a:hover {
        background-color: #eaeae1;
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
            <div class="title m-b-md">
                Holidays System
            </div>
            <img src="/img/Leave.jpg" alt="Leave Image" width=40% height=40%>
        </div>
    </div>
</body>

</html>
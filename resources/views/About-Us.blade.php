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
    #div1 {
        float: left;
        margin-left: 270px;
    }

    #div1 {
        width: 96px;
        box-sizing: content-box;
        height: 48px;
        background: #eee;
        border-color: gray;
        border-style: solid;
        border-width: 2px 2px 50px 2px;
        border-radius: 100%;
        position: relative;
    }

    #div1:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        background: #eee;
        border: 18px solid gray;
        border-radius: 100%;
        width: 12px;
        height: 12px;
        box-sizing: content-box;
    }

    #div1:after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        background: gray;
        border: 18px solid #eee;
        border-radius: 100%;
        width: 12px;
        height: 12px;
        box-sizing: content-box;
    }

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

            <div id="div1"></div><br><br><br><br><br><br><br><br>
            <p style="font-family:Arial, Helvetica, sans-serif"><b>Our Mission :</b></p><br>
            <p style="font-family:Arial, Helvetica, sans-serif"><i>Using this system, instructors can apply for leave
                    online.<br>
                    the admin also can adjust various leave categories (academic- non-academic) and adjust <br>
                    the leave policy to the university. This process also allows instructors to request holidays <br>
                    according to the previous holidays, and the admin can review and approve holiday requests.</i></p>

            <br /><br /><br /><br /><br />
            <div style="font-family:Arial, Helvetica, sans-serif"><i>© 2021 Ali Youssef. All rights reserved</i></div>
        </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Stylish Portfolio - Start Bootstrap Theme</title>

    <style type="text/css">
        {!! File::get(public_path(elixir('css/landing-page/above-the-fold-content.min.css'))) !!}
    </style>

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
          rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .header {
            display: table;
            position: relative;
            width: 100%;
            height: 100%;
            background: url(img/landing-page/bg.jpg) no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
        .callout {
            display: table;
            width: 100%;
            height: 400px;
            color: #fff;
            background: url(../img/landing-page/callout.jpg) no-repeat center center scroll;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }
    </style>
</head>

<body>

<header id="top" class="header">
    <div class="text-vertical-center">
        <h1>{!! $landingPage->title !!}</h1>
        <h3>{!! $landingPage->home_description !!}</h3>
        <br>
        <a href="{!! route('login.get') !!}" class="btn btn-dark btn-lg">{{ $landingPage->home_access_button }}</a>
    </div>
</header>
<script type="text/javascript" src="{!! elixir('js/landing-page/master.min.js') !!}"></script>

</body>

</html>


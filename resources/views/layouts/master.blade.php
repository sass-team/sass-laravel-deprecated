<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <title>SASS &middot; @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Content Management System for Peer Tutoring Workshops">
    <meta name="author" content="Rizart Dokollar & George Skarlatos"/>

    <style type="text/css">
        {!! File::get(public_path(elixir('css/landing-page/above-the-fold-content.min.css'))) !!}
    </style>

    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800">

    <style type="text/css">
        #wrapper {
            min-height: 100%;
            height: auto !important;
            margin: 0 auto -30px;
        }
    </style>
</head>
<body>

<header id="header">

    <h1 id="site-logo">
        <a href="{!! route('auth.login') !!}">
            <img src="{!! url('img/logo.png') !!}" alt="Site Logo"/>
        </a>
    </h1>

    <a href="javascript:;" data-toggle="collapse" data-target=".top-bar-collapse" id="top-bar-toggle"
       class="navbar-toggle collapsed">
        <i class="fa fa-cog"></i>
    </a>

    <a href="javascript:;" data-toggle="collapse" data-target=".sidebar-collapse" id="sidebar-toggle"
       class="navbar-toggle collapsed">
        <i class="fa fa-reorder"></i>
    </a>

</header>
<!-- header -->

@include('_partials.sidebar')

<nav id="top-bar" class="collapse top-bar-collapse">
    <ul class="nav navbar-nav pull-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:;">
                <i class="fa fa-user"></i>
<!--                --><?php //echo "Welcome ".$user->getFirstName(); ?>
                <span class="caret"></span>
            </a>

            {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<!-- "My schedule" choice is shown only to type tutor -->--}}
                {{--<?php if ($user->isTutor()) { ?>--}}
                {{--<li>--}}
                    {{--<a href="<?php echo BASE_URL; ?>account/schedule">--}}
                        {{--<i class="fa fa-calendar"></i>--}}
                        {{--&nbsp;&nbsp;My Schedule--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="<?php echo BASE_URL; ?>appointments/calendar">--}}
                        {{--<i class="fa fa-calendar"></i>--}}
                        {{--&nbsp;&nbsp;My Appointments--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="divider"></li>--}}
                {{--<?php } ?>--}}
                {{--<li>--}}
                    {{--<a href="<?php echo BASE_URL; ?>logout">--}}
                        {{--<i class="fa fa-sign-out"></i>--}}
                        {{--&nbsp;&nbsp;Logout--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </li>
    </ul>

</nav>

<div id="footer">
    <ul class="nav pull-left">
        <li>
            For bugs, improvements, proposals and tasks please use the <a
                    href="https://github.com/sass-team/sass-app/issues"
                    target="_blank">GitHub issue tracker</a>.
        </li>
    </ul>
    <ul class="nav pull-right">
        <li>
            Copyright &copy; autocpyright since 2014, <a
                    href="https://github.com/rdok">rdok</a>
            &amp; <a href="http://gr.linkedin.com/pub/georgios-skarlatos/70/461/123">geoif</a>
        </li>
    </ul>
</div>

{!! Form::input('hidden', 'styleSheetUrls[]', elixir("css/master.min.css")) !!}

</body>
</html>

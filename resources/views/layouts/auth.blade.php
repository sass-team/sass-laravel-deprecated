<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
<![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">
<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9">
<![endif]-->
<!--[if gt IE 8]>
<html class="no-js"> <![endif]-->
<head>
    <title>bla bla </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Content management system for managing peer workshop tutoring.">
    <meta name="author" content="Rizart Dokollari, George Skarlatos"/>
    <style>
        {!! File::get(public_path(elixir('css/auth/above-the-fold-content.min.css'))) !!}
    </style>

    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,800italic,400,600,800">

    <style type="text/css">
        #wrap {
            min-height: 100%;
            height: auto !important;
            margin: 0 auto -60px;
        }

        .video-section .pattern-overlay {
            padding: 110px 0 32px;
            min-height: 496px;
            /* Incase of overlay problems just increase the min-height*/
        }

        .video-section h1, .video-section h3 {
            text-align: center;
            color: #fff;
        }

        .video-section h1 {
            font-size: 110px;
            font-family: 'Buenard', serif;
            font-weight: bold;
            text-transform: uppercase;
            margin: 40px auto 0px;
            text-shadow: 1px 1px 1px #000;
            -webkit-text-shadow: 1px 1px 1px #000;
            -moz-text-shadow: 1px 1px 1px #000;
        }

        .video-section h3 {
            font-size: 25px;
            font-weight: lighter;
            margin: 0px auto 15px;
        }

        .video-section .buttonBar {
            display: none;
        }

        .player {
            font-size: 1px;
        }

        @media (max-width: 767px) {
            #footer {
                display: none;
            }
        }
    </style>

</head>

<body>

<div id="wrap">
    <div id="login-container">

        <div id="logo">
            <a href="{!! route('landing_page') !!}">
                <img src="{!! url('img/auth/logo.png') !!}" alt="Logo"/>
            </a>
        </div>


        <!-- /#login -->
        <div id="login">
            <h4>Welcome to SASS App</h4>
            <h5>Please log in.</h5>

            <form method="post" id="login-form" action="" class="form">
                <div class="form-group">
                    <label for="login-email">Username</label>
                    <input type="email" class="form-control" id="login-email" name="login_email" placeholder="Email"
                           required>
                </div>

                <div class="form-group">
                    <label for="login-password">Password</label>
                    <input type="password" class="form-control" id="login-password" name="login_password"
                           placeholder="Password" required>
                </div>

                <div class="form-group">
                    <input type="hidden" name="hidden_submit_pressed">
                    <button type="submit" id="login-btn" name="login" class="btn btn-primary btn-block">Log In
                        &nbsp; <i
                                class="fa fa-sign-in"></i></button>
                </div>
            </form>

            <div class="form-group text-center">
                <input type="hidden" name="hidden_forgot_pressed">
                <a href="confirm-password" name="forgot" class="btn btn-default">
                    Forgot Password?
                </a>
            </div>
        </div>
        <!-- /# -->

    </div>
    <!-- /#login-container -->

    @yield('content')

    <footer id="footer" class="footer navbar-fixed-bottom">
        <ul class="nav pull-left">
            <li>
                For bugs, improvements, proposals and tasks please use the <a
                        href="https://github.com/sass-team/sass-laravel/issues/new"
                        target="_blank">GitHub issue tracker</a>.
            </li>
        </ul>
        <ul class="nav pull-right">
            <li>
                Copyright &copy; autocopyright since 2014,
                &#60;devs&#62;<a href="https://github.com/rdok" target="_blank">rdok</a> &#38;
                <a href="http://gr.linkedin.com/pub/georgios-skarlatos/70/461/123" target="_blank">geoif</a>&#60;&#47;devs&#62;

            </li>
        </ul>
    </footer>

    <!--Video Section-->
    <section class="content-section video-section">
        <div class="pattern-overlay">
            <a id="bgndVideo" class="player"
               data-property="{videoURL:'https://www.youtube.com/watch?v=qW5VeFdeYTU', quality:'large', autoPlay:true, mute:true, opacity:1, optimizeDisplay:true, loop:true, vol:1, realfullscreen:true}">bg</a>
        </div>
    </section>
    <!--Video Section Ends Here-->

</div>

<!-- Warming Up -->
{{----}}
<link href='https://fonts.googleapis.com/css?family=Buenard:700' rel='stylesheet' type='text/css'>

<script type="text/javascript" href="{!! elixir('js/auth/master.min.js') !!}"></script>

@yield('scripts')

</body>
</html>


<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<!-- Mirrored from getbootstrapadmin.com/remark/base/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2017 11:46:25 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Login | DGAmbassadors</title>

  <link rel="apple-touch-icon" href="{{asset('userdash/images/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{asset('userdash/images/favicon.ico')}}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('userdash/global/css/bootstrap.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/css/bootstrap-extend.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/css/site.min3f0d.css?v2.2.0')}}">

  <!-- Skin tools (demo site only) -->
  {{-- <link rel="stylesheet" href="{{asset('userdash/global/css/skintools.min3f0d.css?v2.2.0')}}"> --}}
  {{-- <script src="{{asset('userdash/js/sections/skintools.min.js')}}"></script> --}}

  <!-- Plugins -->
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/animsition/animsition.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/switchery/switchery.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/intro-js/introjs.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0')}}">

  <!-- Page -->
  <link rel="stylesheet" href="{{asset('userdash/examples/css/pages/login-v2.min3f0d.css?v2.2.0')}}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{asset('userdash/global/fonts/web-icons/web-icons.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0')}}">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>


  <!--[if lt IE 9]>
    <script src="{{ asset('userdash/global/vendor/html5shiv/html5shiv.min.js') }}"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="{{ asset('userdash/global/vendor/media-match/media.match.min.js') }}"></script>
    <script src="{{ asset('userdash/global/vendor/respond/respond.min.js') }}"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="{{ asset('userdash/global/vendor/modernizr/modernizr.min.js') }}"></script>
  <script src="{{ asset('userdash/global/vendor/breakpoints/breakpoints.min.js') }}"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="page-login-v2 layout-full page-dark">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
    <div class="page-content">
      <div class="page-brand-info">
        <div class="brand">
          <img class="brand-img" src="{{ asset('userdash/images/logo%402x.png') }}" alt="...">
          <h2 class="brand-text font-size-40">DGAmbassadors</h2>
        </div>
        <p class="font-size-20">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>

      <div class="page-login-main">
        <div class="brand visible-xs">
          <img class="brand-img" src="{{ asset('userdash/images/logo-blue%402x.png') }}" alt="...">
          <h3 class="brand-text font-size-40">DGAmbassadors</h3>
        </div>
        <h3 class="font-size-24">Sign In</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

        <form method="post" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="sr-only" for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="sr-only" for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password"
            placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary pull-left">
              <input type="checkbox" id="remember" name="checkbox" {{ old('remember') ? 'checked' : '' }}>
              <label for="inputCheckbox">Remember me</label>
            </div>
            <a class="pull-right" href="{{ route('password.request') }}">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Sign in</button>
        </form>

        <p>No account? <a href="{{ url('register') }}">Sign Up</a></p>

        <footer class="page-copyright">
          <p>WEBSITE DEVELOPED BY WEBWIZ</p>
          <p>&copy; 2018. All RIGHT RESERVED.</p>
          <div class="social">
            <a class="btn btn-icon btn-round social-twitter" href="javascript:void(0)">
              <i class="icon bd-twitter" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-facebook" href="javascript:void(0)">
              <i class="icon bd-facebook" aria-hidden="true"></i>
            </a>
            <a class="btn btn-icon btn-round social-google-plus" href="javascript:void(0)">
              <i class="icon bd-google-plus" aria-hidden="true"></i>
            </a>
          </div>
        </footer>
      </div>

    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="{{asset('userdash/global/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/animsition/animsition.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/asscroll/jquery-asScroll.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/mousewheel/jquery.mousewheel.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/asscrollable/jquery.asScrollable.all.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/ashoverscroll/jquery-asHoverScroll.min.js')}}"></script>

  <!-- Plugins -->
  <script src="{{asset('userdash/global/vendor/switchery/switchery.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/intro-js/intro.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/screenfull/screenfull.min.js')}}"></script>
  <script src="{{asset('userdash/global/vendor/slidepanel/jquery-slidePanel.min.js')}}"></script>

  <!-- Plugins For This Page -->
  <script src="{{asset('userdash/global/vendor/jquery-placeholder/jquery.placeholder.min.js')}}"></script>

  <!-- Scripts -->
  <script src="{{asset('userdash/global/js/core.min.js')}}"></script>
  <script src="{{asset('userdash/js/site.min.js')}}"></script>

  <script src="{{asset('userdash/js/sections/menu.min.js')}}"></script>
  <script src="{{asset('userdash/js/sections/menubar.min.js')}}"></script>
  <script src="{{asset('userdash/js/sections/gridmenu.min.js')}}"></script>
  <script src="{{asset('userdash/js/sections/sidebar.min.js')}}"></script>

  <script src="{{asset('userdash/global/js/configs/config-colors.min.js')}}"></script>
  <script src="{{asset('userdash/js/configs/config-tour.min.js')}}"></script>

  <script src="{{asset('userdash/global/js/components/asscrollable.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/animsition.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/slidepanel.min.js')}}"></script>
  <script src="{{asset('userdash/global/js/components/switchery.min.js')}}"></script>

  <script src="{{asset('userdash/global/js/components/jquery-placeholder.min.js')}}"></script>


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'http://www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>


<!-- Mirrored from getbootstrapadmin.com/remark/base/pages/login-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2017 11:46:25 GMT -->
</html>

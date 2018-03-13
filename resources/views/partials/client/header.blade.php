<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<!-- Mirrored from getbootstrapadmin.com/remark/material/base/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Sep 2017 10:42:09 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>{{ isset($title) ? $title." | Client Dashboard | DGAmbassadors" : "Client Dashboard | DGAmbassadors" }}</title>

  <link rel="apple-touch-icon" href="{{asset('userdash/images/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{asset('userdash/images/favicon.ico')}}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{asset('userdash/global/css/bootstrap.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/css/bootstrap-extend.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/css/site.min3f0d.css?v2.2.0')}}">

  <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="{{asset('userdash/global/css/skintools.min3f0d.css?v2.2.0')}}">
  <script src="{{asset('userdash/js/sections/skintools.min.js')}}"></script>

  <!-- Plugins -->
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/animsition/animsition.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/asscrollable/asScrollable.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/switchery/switchery.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/intro-js/introjs.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/slidepanel/slidePanel.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/flag-icon-css/flag-icon.min3f0d.css?v2.2.0')}}">
  <link rel="stylesheet" href="{{asset('userdash/global/vendor/waves/waves.min3f0d.css?v2.2.0')}}">

  <!-- Plugins For This Page -->
  <link rel="stylesheet" href="{{ asset('userdash/global/vendor/chartist-js/chartist.min3f0d.css?v2.2.0') }}">
  <link rel="stylesheet" href="{{ asset('userdash/global/vendor/jvectormap/jquery-jvectormap.min3f0d.css?v2.2.0') }}">
  <link rel="stylesheet" href="{{ asset('userdash/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min3f0d.css?v2.2.0') }}">

  <!-- Page -->
  <link rel="stylesheet" href="{{ asset('userdash/examples/css/dashboard/v1.min3f0d.css?v2.2.0') }}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{ asset('userdash/global/fonts/material-design/material-design.min3f0d.css?v2.2.0') }}">
  <link rel="stylesheet" href="{{ asset('userdash/global/fonts/brand-icons/brand-icons.min3f0d.css?v2.2.0') }}">
  <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}">

  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,700'>


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

    <!-- TinyMCE -->
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
</head>
<body class="dashboard">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

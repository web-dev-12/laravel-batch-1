<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>@yield("title","Wallet")</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('/')}}assets/images/favicon.png">
    <link href="{{asset('/')}}assets/css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    @yield('content')


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/')}}vendor/global/global.min.js"></script>
    <script src="{{asset('/')}}js/custom.min.js"></script>
    <script src="{{asset('/')}}js/dlabnav-init.js"></script>
	<script src="{{asset('/')}}js/styleSwitcher.js"></script>
</body>
</html>
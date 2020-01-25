     <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href='{{asset("admintmpl/img/favicon.ico")}}'>
    <!-- Google Fonts
		============================================ -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
	
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/bootstrap.min.css")}}'>
    <!-- Bootstrap CSS
		============================================ -->
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/owl.carousel.css"		)}}'>
    <link rel="stylesheet" href='{{asset("admintmpl/css/owl.theme.css"		)}}'>
    <link rel="stylesheet" href='{{asset("admintmpl/css/owl.transitions.css"	)}}'>
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/animate.css")}}'>
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/normalize.css")}}'>
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/meanmenu.min.css")}}'>
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/main.css")}}'>
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/educate-custon-icon.css")}}'>
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/morrisjs/morris.css")}}'>
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/scrollbar/jquery.mCustomScrollbar.min.css")}}'>
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/metisMenu/metisMenu.min.css")}}'>
    <link rel="stylesheet" href='{{asset("admintmpl/css/metisMenu/metisMenu-vertical.css")}}'>
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/calendar/fullcalendar.min.css")}}'>
    <link rel="stylesheet" href='{{asset("admintmpl/css/calendar/fullcalendar.print.min.css")}}'>
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/style.css")}}'>
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href='{{asset("admintmpl/css/responsive.css")}}'>
    <!-- modernizr JS
		============================================ -->
    <script src='{{asset("admintmpl/js/vendor/modernizr-2.8.3.min.js")}}'></script>
	<!-- leaflet 
		============================================ -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@latest/dist/leaflet.css" />
    <link rel="stylesheet" href="{{asset('admintmpl/css/Control.Geocoder.css')}}" />

    <script src="https://unpkg.com/leaflet@latest/dist/leaflet-src.js"></script>
    <script src="{{asset('admintmpl/js/Control.Geocoder.js')}}"></script>
	
<script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
	@yield('style')
    <style>
	.js-stools-container-filters.collapse{display:none !important;}
	.js-stools-container-filters.collapse.in{display:block !important;}
	.header-top-area ,.footer-copyright-area ,.sidebar-header{
		background-color: rgba(0,0,0,0.5) !important;
	}
	.main-logo{
		    width: 174px;
			height:61px;
	}.mm-active{
		background: #9e8d6f;
		color:#fff !important;
	}.mm-active a{
		color:#fff !important;
	}.mm-active a:hover{
		color:#000 !important;
	}.row-title{
		width:25%;
	}
	span.mini-click-non {
		
		margin: 15px;
	}
	</style>
	
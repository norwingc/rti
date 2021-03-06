<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RTI | Backend</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    {{ HTML::style('dist/bootstrap/css/bootstrap.min.css') }}    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
  	{{ HTML::style('dist/css/AdminLTE.min.css') }}    
    {{ HTML::style('dist/css/skins/skin-green.min.css') }}   

    @yield('css')

    <!-- Theme Accedo -->
  	{{ HTML::style('css/main.min.css') }}     
   
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <style type="text/css">
        .logo-lg img{
            width: 30% !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .skin-green .main-header .navbar{
           background-color: #feca08; 
        }
        .skin-green .main-header .logo{
            background-color: black;
        }
        .skin-green .main-header .logo:hover{
             background-color: black;
        }
        .skin-green .main-header .navbar .sidebar-toggle:hover{
            background-color: #feca08; 
        }
    </style>
</head>    

<body class="hold-transition skin-green sidebar-mini fixed">

	<!-- Main Header -->
	<header class="main-header">
		<!-- Logo -->
		<a href="{{ URL::to('/') }}" class="logo">
			
		</a>
        <!-- Header Navbar -->
        @include('includes.nav.__headrole0')
       
	</header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
       @include('includes.nav.__navrole0')
    </aside>  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
       @yield('contenido')
    </div>
    <!-- /.content-wrapper -->  

   @include('includes.__footer')


    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.2.0 -->
    {{ HTML::script('plugins/jQuery/jQuery-2.2.0.min.js') }}   
    
    <!-- Bootstrap 3.3.6 -->
    {{ HTML::script('dist/bootstrap/js/bootstrap.min.js') }}   
    
    <!-- SlimScroll -->
    {{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') }}   
   
    <!-- AdminLTE App -->
    {{ HTML::script('dist/js/app.min.js') }}   

    <script type="text/javascript">
        $('input[type=text]').keyup (function () {
           $(this).val($(this).val().toUpperCase());            
        })
    </script>   

     @yield('js')
</body>
</html>
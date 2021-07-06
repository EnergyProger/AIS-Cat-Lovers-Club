<!doctype html>
<html lang="en">
  <head>
  	<title>CatsLand</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/content-page.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/form.css')}}">
    
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
		@if(Auth::check())
      @yield('sidebar')

      @yield('content')
    @else
    
    <p style="margin-left: 500px; margin-top: 50vh; font-size: 16px;">Ви не можете виконати цю дію, так яки не авторизовані.</p>&nbsp;
    <a style="margin-top: 50vh; font-size: 16px;"href="{{route('signin')}}">Авторизуватися</a>
    
    @endif

      
      </div>
    
      <script src="{{asset('assetsjs/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assetsjs/sidebar-main.js')}}"></script>
  </body>
</html>
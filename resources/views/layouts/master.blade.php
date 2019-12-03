<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<title>{{$title}}</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<div class="page_wrap">
	<header>
		@yield('header')
	</header>
	
<div class="content">
	@yield ('content')
</div><!-- end content-->
	
<footer>
	@yield ('footer')	
<footer>
	
</div> <!-- end pagewrap-->
</body>
</html>
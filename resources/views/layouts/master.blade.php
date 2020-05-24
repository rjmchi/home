<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<title>{{$title}}</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<meta name="csrf-token" content="{{csrf_token()}}">
</head>

<body>

<div id="app" class="page_wrap">
	<header>
		@yield('header')
	</header>
	
<div class="content">
	@yield ('content')
</div><!-- end content-->
	
<footer>
	@yield ('footer')	
</footer>
	
</div> <!-- end pagewrap-->
	
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
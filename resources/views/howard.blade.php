<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Howard's Photos</title>

    <!-- Scripts -->
	<script src="https://kit.fontawesome.com/ee4a5395d5.js" crossorigin="anonymous"></script>	
	
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">	

</head>
<body>
    <div id="app">
	<howard-photos></howard-photos>
    </div>
</body>
</html>
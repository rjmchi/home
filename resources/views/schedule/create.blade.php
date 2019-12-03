<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{{ $title }}</title>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="page-wrap">
	<header>
		<h1>{{$title}}</h1>
	</header>
	
	<div class="content">
		

		@include('partials.messages')		
		
		<form method="post" action="{{route('schedule.store')}}">
			{{csrf_field()}}
			<label for="message">Name:</label>
			<input type="text" name="message" value="{{old('message')}}">
			<label for="days">Days:</label>
			<input type="text" name="days" value="{{old('days')}}">
			<label for="next_due">Next Due:</label>
			<input type="text" name="next_due" value="{{old('next_due')}}">
			
			
			<button type="submit">Submit</button>
		
		</form>
	
	</div><!-- end content-->
	</div><!--end page-wrap-->
	<footer>
		
	</footer>
</div>
</body>
</html>
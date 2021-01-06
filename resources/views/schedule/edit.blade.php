<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{{ $title }}</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="edit_reminder">
<div class="page_wrap">
	<header>
		<h1>Edit Scheduled Reminder</h1>
	</header>
	
	<div class="content">

		@include('partials.messages')		
		
		<form method="post" action="{{route('schedule.update', ['reminder'=>$reminder->id])}}">			
			<input type="hidden" name="_method" value="PATCH">
			{{csrf_field()}}
			<label for="message">Name:</label>
			<input type="text" name="message" value="{{$reminder->message}}">
			<label for="days">Days:</label>
			<input type="text" name="days" value="{{$reminder->days}}">
			<label for="next_due">Next Due:</label>
			<input type="text" name="next_due" value="{{$reminder->due_date->format('m/d/Y')}}">
			
			<button type="submit">Update</button>
		
		</form>
	
	</div><!-- end content-->
	</div><!--end page-wrap-->
	<footer>
		
	</footer>
</div>
</body>
</html>
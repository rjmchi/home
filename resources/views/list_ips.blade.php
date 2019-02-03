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
		<h2>{{$title}}</h2>
	</header>
	
	<div class="content">
		<table class="iplist">
			<tr>
			<th>Date</th>
			<th>IP Address</th>
			</tr>
			@foreach($addrs as $addr) 
			<tr>
				<td>{{$addr->day}}</td>
				<td>{{$addr->ip}}</td>
			</tr>
			@endforeach
		</table>
	
	</div>		
	</div>
	<footer>
		
	</footer>
</div>
</body>
</html>
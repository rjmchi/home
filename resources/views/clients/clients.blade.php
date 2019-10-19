<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>{{ $title }}</title>
<link href="{{ asset('css/clients.css') }}" rel="stylesheet">
</head>

<body>
<div class="page-wrap">
	<header>
		<h1>{{$title}}</h1>
	</header>
	
	<div class="content">
		
	@php $odd = true @endphp
	<div class="client_table">
	<p>
		<span>ID</span>
		<span class="name">Name</span>
		<span class="url">URL</span>
		<span>Client ID</span>
		<span class="delete">Delete</span>
		<span class="update">Update</span>
	</p>
	@foreach ($clients as $client) 
		<form action="{{ route('clients.update', $client->id)}}" method="post">
			<fieldset class="{{ ( $odd ) ? 'odd' : 'even' }}">
				<input type="hidden" name="id" value="{{ $client->id}}">
				{{ csrf_field() }}
			
				@php $odd = !$odd; @endphp
				<span>{{$client->id}}</span>
				<input type="text" name="name" value="{{$client->name}}" class="name">
				<input name="url" type="text" class="url" id="url" value="{{$client->url}}">
				<input name="client_id" type="text" class="image" id="client_id" value="{{$client->client_id}}">
			  <button type="submit" formaction="{{ route('clients.destroy', $client->id) }}" class="delete">Delete</button>
			  <button type="submit" class="update">Update</button>
			</fieldset>
		</form>			
		
	@endforeach
	</div>		
	</div>
	<footer>
		
	</footer>
</div>
</body>
</html>
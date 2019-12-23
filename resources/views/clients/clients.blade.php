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
		<form action="{{route('clients.store')}}" method="POST">
			{{ csrf_field() }}
			<label for="name">Name:</label>
			<input type="text" name="name">
			<label for="url">URL:</label>
			<input type="text" name="url">
			<lable for="client_id">Client ID:</lable>
			<input type="text" name="client_id">
			<button type="submit" class="btn btn-primary">Add</button>
		</form>
		
	@php $odd = true @endphp
	<div class="client_table">
	<p>
		<span>ID</span>
		<span class="name">Name</span>
		<span class="url">URL</span>
		<span>Client ID</span>
		<span class="update">Update</span>
		<span class="delete">Delete</span>
	</p>
	@foreach ($clients as $client) 
		<form action="{{ route('clients.update', $client->id)}}" method="post">
			<input type="hidden" name="_method" value="PUT">
			<fieldset class="{{ ( $odd ) ? 'odd' : 'even' }}">
				<input type="hidden" name="id" value="{{ $client->id}}">
				{{ csrf_field() }}
			
				@php $odd = !$odd; @endphp
				<span>{{$client->id}}</span>
				<input type="text" name="name" value="{{$client->name}}" class="name">
				<input name="url" type="text" class="url" value="{{$client->url}}">
				<input name="client_id" type="text" class="image"  value="{{$client->client_id}}">
			  <button type="submit" class="update">Update</button>
			</fieldset>
		</form>			
		<form action="{{ route('clients.destroy', $client->id)}}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="_method" value="delete">
			<button type="submit" class="btn btn-danger delete">Delete</button>
		</form>
		
	@endforeach
	</div>		
	</div>
	<footer>
		
	</footer>
</div>
</body>
</html>
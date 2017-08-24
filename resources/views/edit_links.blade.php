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
	<form action="{{ route('reorderlinks')}}">
		<button type="submit">Reorder Links</button>
	</form>
	@php $odd = true @endphp
	<div class="link_table">
	<div>
	<p>
		<span class="name">Name</span>
		<span class="url">URL</span>
		<span class="image">Image</span>
		<span class="image_width">Image Width</span>
		<span class="image_height">Image Height</span>
		<span class="sort_order">Sort Order</span>
		<span class="delete">Delete</span>
		<span class="update">Update</span>
	</p>
	</div>
	@foreach ($links as $link) 
		<form action="{{ route('updatelink')}}" method="post">
			<fieldset class="{{ ( $odd ) ? 'odd' : 'even' }}">
				<input type="hidden" name="id" value="{{ $link->id}}">
				{{ csrf_field() }}
			
				@php $odd = !$odd; @endphp
				<input type="text" name="name" value="{{$link->name}}" class="name">
				<input name="url" type="text" class="url" id="url" value="{{$link->url}}">
				<input name="image" type="text" class="image" id="image" value="{{$link->image}}">
			  <input name="image_width" type="text" class="image_width" id="image_width" value="{{$link->image_width}}">
			  <input name="image_height" type="text" class="image_height" id="image_height" value="{{$link->image_height}}">
			  <input name="sort_order" type="text" class="sort_order" id="sort_order" value="{{$link->sort_order}}">
			  <button type="submit" formaction="{{ route('deletelink') }}" class="delete">Delete</button>
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
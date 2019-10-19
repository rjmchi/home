@extends ('layouts.master')
@section ('content')

<div class="sidebar">

<form action="{{ route('addlink') }}" method="post" id="addlink" class="addlink">
{{ csrf_field() }}
	<label for="name">Name: </label>
	<input type="text" name="name">
	<label for="url">URL: </label>
	<input type="text" name="url">
	<label for="image">Image: </label>
	<input type="text" name="image">
	<label for="width">Image Width:</label>
	<input type="text" name="width" value="150">
	<label for="height">Image Height:</label>
	<input type="text" name="height">
	<label for="sort_order">Sort Order:</label>
	<input type="text" name="sort_order" value="1">		
	<button type="submit" class="btn">Add Link</button>
	<a href="{{ route('editlinks') }}" class="btn">Edit Links</a>
</form>
	
	@if(isset($alert))
	<p>{{$alert}}</p>
	@endif
<div class="reminders">

<table>
@php $odd = false; @endphp

@foreach ($reminders as $reminder)

<tr class="{{ $reminder->due }} {{ ( $odd ) ? 'odd' : 'even' }}">
@php $odd = !$odd; @endphp

<td> {{ $reminder->strdate }}</td>
<td>{{ $reminder->message }}</td>
<td>
					<form action="{{ route('deletereminder') }}" method="post">
					{{ csrf_field() }}
						<input name="delete" type="image" value="delete" src="images/del.png" alt="Delete">
						<input name="id" type="hidden" value="{{ $reminder->id }}">
					</form>
				</td>

</tr>
@endforeach 
<form action={{route("addreminder")}} method="post">

{{ csrf_field() }}		
			<tr>
				<td> <input name="date" type="text"></td>
				<td><input name="message" type="text"></td>
				<td><input name="add" type="submit" value="Add"></td>
			</tr>
</form>				
</table>
	<a class="button" href="{{route('autoreminders.index')}}">Scheduled Reminders</a>
</div><!--end reminders-->
</div><!-- end sidebar-->

<a href="{{route('videos.index')}}">Videos</a>

<nav class="menu">
<ul>
@foreach ($links as $link)
<li>
	@if ($link['image'])
		<a href="http://{{$link->url}}"><img src="images/{{$link->image}}" alt="{{$link->name}}"
		@if ($link['image_width'] > 0)
			width="{{$link->image_width}}" 
		@endif
		></a>
	@else
		<a href="http://{{$link->url}}">{{$link->name}}</a>
	@endif
</li>	
@endforeach
</ul>
</nav>
<h2>Clients</h2>
	@foreach($clients as $client) 
		<div class="client">
	
			<h2><a href="http://{{$client->url}}">{{ $client->name}}</a></h2>
			@foreach ($client->links as $link)
				<p><a href="http://{{$link->url}}">{{$link->name}} </a></p>
			@endforeach
		</div>
	@endforeach
@endsection

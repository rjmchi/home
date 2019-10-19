@extends ('layouts.master')
@section ('heading')
<h2>{{$title}}</h2>
@endsection
@section ('content')

<form action="{{ route('videos.update', $video->id) }}" method="post" id="editvideo">
{{ csrf_field() }}
	<input type="hidden" name="_method" value="put">
	<label for="category">Category:</label>
	<input type="text" name="category" value="{{$video->category}}">
	<label for="name">Name: </label>
	<input type="text" name="name" value="{{$video->name}}">
	<label for="url">URL: </label>
	<input type="text" name="url" value="{{$video->url}}">
	<label for="notes">Notes:</label>
	<input type="text" name="notes" value="{{$video->notes}}">
	<label for="sort_order">Sort Order:</label>
	<input type="text" name="sort_order" value="{{$video->sort_order}}">		
	<button type="submit" class="btn">Update Video</button>
</form>

@endsection
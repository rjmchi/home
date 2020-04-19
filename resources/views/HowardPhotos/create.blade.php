@extends ('layouts.master')
@section ('content')
<h1>{{$title}}</h1>
<h2>New Link</h2>

	<form action="{{ route('howard.store') }}" method="post" id="addphoto" class="addphoto">
	{{ csrf_field() }}
		<label for="title">Title:</label>
		<input type="text" name="title">
		<label for="url">URL: </label>
		<input type="text" name="url">
		<button type="submit" class="btn">Add Link</button>
	</form>

@endsection
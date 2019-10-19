@extends ('layouts.master')

@section ('header')
<h2>{{$title}}</h2>

@endsection
@section ('content')

	<form action="{{ route('videos.store') }}" method="post" id="addvideo" class="addvideo">
	{{ csrf_field() }}
		<label for="category">Category:</label>
		<input type="text" name="category">
		<label for="name">Name: </label>
		<input type="text" name="name">
		<label for="url">URL: </label>
		<input type="text" name="url">
		<label for="notes">Notes:</label>
		<input type="text" name="notes">
		<label for="sort_order">Sort Order:</label>
		<input type="text" name="sort_order" value="1">		
		<button type="submit" class="btn">Add Video</button>
	</form>

<p><a href="{{route('videos.reorder')}}">Reorder</a></p>


<?php $odd = false;?>
<table class="video">
	<tr>
		<td>Category</td>
		<td>Link</td>
		<td>Notes</td>
		<td>Edit</td>
		<td>Delete</td>
		<td>Sort Order</td>
	</tr>
@foreach ($links as $link)
<tr class="{{$odd?'odd':'even'}}">
<?php $odd = !$odd; ?>	
	<td>{{$link->category}}</td>
	<td>
		 <a href="http://{{$link->url}}">{{$link->name}}</a>
	</td>		
	<td>{{$link->notes}}</td>
	<td><a href="{{route('videos.edit', $link->id)}}">Edit</a></td>
	<td>
		<form action="{{ route('videos.destroy', $link->id) }}" method="post">
			<input type="hidden" name="_method" value="delete">
			{{csrf_field()}}
			<button type="submit">Delete</button>
		</form>
	</td>
	<td>{{$link->sort_order}}</td>
</tr>	
@endforeach
</table>
@endsection
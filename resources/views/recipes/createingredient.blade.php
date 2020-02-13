@extends ('layouts.master')
@section('header')
	<h2>{{$title}}</h2>
@endsection

@section ('content')

<form method="post" action="{{route('ingredients.store')}}" >
	{{csrf_field()}}

	<label for="name">Name: </label>
	<input type="text" name="name">
	
	<label for="amount">Amount: </label>
	<input type="text" name="amount">
	
	<label for="unit">Unit</label>
	<input type="text" name="unit">
	
	<input type="hidden" name="recipe_id" value="{{$recipe_id}}">
	
	<button type="submit">Add</button>
</form>

@endsection
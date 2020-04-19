@extends ('layouts.master')
@section('header')
	<h2>{{$title}}</h2>
@endsection

@section ('content')

<div class="recipes">
	@foreach($recipes as $recipe)
		<div class="recipe">
			<h3>{{$recipe->name}}</h3>
			<p>Starter: {{$recipe->starter}}<button class="btn btn-primary">+</button><button class="btn btn-primary">-</button></p>
			<p>
				Flour: {{$recipe->flour}}
				<button class="btn btn-primary">+</button>
				<button class="btn btn-primary">-</button>
			</p>
			<p>Water: {{$recipe->water}}
				<button class="btn btn-primary">+</button>
				<button class="btn btn-primary">-</button>
			</p>
			<p>Salt: {{$recipe->salt}}
				<button class="btn btn-primary">+</button>
				<button class="btn btn-primary">-</button>
			</p>
			
			<div class="ingredients">
			@foreach ($recipe->ingredients as $ingredient)
			<p>{{$ingredient->name}}: {{$ingredient->amount}} {{$ingredient->unit}}</p>
			@endforeach
			<p>{{$recipe->notes}}</p>

			</div>
			<p>Hydration:{{($recipe->starter/2 + $recipe->water) / ($recipe->starter/2 + $recipe->flour)}}</p>
			
			<a href="{{route('ingredients.create', $recipe->id)}}" class="btn btn-primary">Add Ingredient</a>
			<form method="post" action="{{route('recipes.destroy', $recipe->id)}}">
				<input type="hidden" name ="_method" value="delete">
				{{csrf_field()}}
				<button class="btn btn-danger" type="submit">Delete</button>
			</form>
			
		</div>
	@endforeach
</div>

<h3>New Recipe</h3>
<form method="post" action="{{route('recipes.store')}}" class="newrecipe">
	{{csrf_field()}}

	<label for="name">Name: </label>
	<input type="text" name="name">
	<div class="input-group">
		<label for="starter">Starter: </label>
		<input type="text" name="starter">
		<label for="flour">Flour:</label>
		<input type="text" name="flour">
		<label for="water">Water:</label>
		<input type="text" name="water">	
		<label for="salt">Salt:</label>
		<input type="text" name="salt">		
	</div>
	
	<label for="notes">Notes:</label>
	<textarea name="notes"></textarea>
	
	<button class="btn btn-primary" type="submit">Add</button>
</form>

@endsection
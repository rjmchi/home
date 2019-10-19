@extends ('layouts.master')
@section('header')
	<h2>{{$title}}</h2>
@endsection

@section ('content')

<form method="post" action="{{route('hydration.calc')}}">
	{{csrf_field()}}
	
	<label for="starter">Starter: </label>
	<input type="text" name="starter">
	<label for="starterper">Starter %</label>
	<input type="text" name="starterper" value="100">
	<label for="flour">Flour</label>
	<input type="text" name="flour">
	<label for="water">Water</label>
	<input type="text" name="water">	
	
	<button type="submit">Caclulate</button>
</form>

@if($hydration)
	<p>Hydration = {{$hydration}}</p>
@endif

<p>Starterper: {{$starterper}}</p>
<p>Flour: {{$flour}}</p>
<p>Water: {{$water}}</p>

@endsection
@extends ('layouts.master')
@section('header')
	<h2>{{$title}}</h2>
@endsection

@section ('content')

<form method="post" action="{{route('hydration.calc')}}" class="hydration">
	{{csrf_field()}}
	
	<label for="starter">Starter: </label>
	<input type="text" name="starter">
	<label for="flour">Flour</label>
	<input type="text" name="flour">
	<label for="water">Water</label>
	<input type="text" name="water">	
	
	<button type="submit">Caclulate</button>
</form>


<div class="hydration">
@if($hydration)
	<p>Hydration = {{$hydration}} %</p>
@endif	
	<p>Starter %: {{$starterper * 100}}</p>
	<p>Total Flour: {{$flour}}</p>
	<p>Total Water: {{$water}}</p>
</div>

<p><a href="{{route('hydration')}}">Reset</a></p>
@endsection
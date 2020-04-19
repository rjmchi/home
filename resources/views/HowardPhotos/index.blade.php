@extends ('layouts.master')
@section ('content')
<h1>Howard's Photos</h1>

<ul class="howard-photos">

@foreach ($photos as $photo)
	<li><a href="{{$photo->url}}">{{$photo->title}}</a></li>
@endforeach
	
</ul>
<a class="btn btn-primary" href="{{route("howard.create")}}">Add Link</a>	
@endsection
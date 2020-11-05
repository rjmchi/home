@extends('layouts.master')
@section('header')

	<h2>{{$title}}</h2>
@endsection
@section ('content')
		
	<a class="button" href="{{route('schedule.create')}}">New Reminder</a>
		
		@php $odd = false; @endphp

		<table>
			<tr>
				<th>Name</th>
				<th>Number of Days</th>
				<th>Next Due Date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		@foreach($reminders as $reminder)
			<tr class="{{ ( $odd ) ? 'odd' : 'even' }}">
				@php $odd = !$odd; @endphp				
				
				<td>{{$reminder->message}}</td>
				<td>{{$reminder->days}}</td>
				<td>{{$reminder->due_date->format('m/d/Y')}}</td>				
				
				<td><a href="{{route('schedule.edit', [$reminder->id])}}">Edit</a></td>
				<td><form action="{{ route('schedule.destroy', $reminder->id) }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="delete">
						<input name="delete" type="image" value="delete" src="{{asset('/images/del.png')}}" alt="Delete">
						<input name="id" type="hidden" value="{{ $reminder->id }}">
					</form></td>
			</tr>
		@endforeach
	</table>
@endsection
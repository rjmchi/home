@extends('layouts.master')
@section('header')

	<h2>{{$title}}</h2>
@endsection
@section ('content')
		
	<a class="button" href="{{route('autoreminders.create')}}">New Reminder</a>
		
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
				
				<td>{{$reminder->name}}</td>
				<td>{{$reminder->days}}</td>
				<td>{{$reminder->next_due}}</td>
				<td>Edit</td>
				<td><form action="{{ route('autoreminders.destroy', $reminder->id) }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="delete">
						<input name="delete" type="image" value="delete" src="images/del.png" alt="Delete">
						<input name="id" type="hidden" value="{{ $reminder->id }}">
					</form></td>
			</tr>
		@endforeach
	</table>
@endsection
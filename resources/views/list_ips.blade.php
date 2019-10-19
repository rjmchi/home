@extends ('layouts.master')
@section ('header')
<h2>{{$title}}</h2>
@endsection

@section ('content')

	<table class="iplist">
			<tr>
			<th>Date</th>
			<th>IP Address</th>
			</tr>
			@foreach($addrs as $addr) 
			<tr>
				<td>{{$addr->day}}</td>
				<td>{{$addr->ip}}</td>
			</tr>
			@endforeach
		</table>
	@endsection
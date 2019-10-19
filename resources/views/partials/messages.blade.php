{{-- Primary Alert --}}
@if(Session::has('primary'))
	<div class="alert alert-primary" role="alert">
		<strong>Note to User:</strong> {{ Session::get('primary') }}
	</div>
@endif

{{-- Secondary Alert --}}
@if(Session::has('secondary'))
	<div class="alert alert-secondary" role="alert">
		<strong>Note to User:</strong> {{ Session::get('secondary') }}
	</div>
@endif

{{-- Success Alert --}}
@if(Session::has('success'))
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong> {{ Session::get('success') }}
	</div>
@endif

{{-- Danger Alert --}}
@if(Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		<strong>Error:</strong> {{ Session::get('danger') }}
	</div>
@endif

{{-- Warning Alert --}}
@if(Session::has('warning'))
	<div class="alert alert-warning" role="alert">
		<strong>Something Went Wrong!</strong>
		{{ Session::get('warning') }}

	</div>
@endif

{{-- Informational Alert --}}
@if(Session::has('info'))
	<div class="alert alert-info" role="alert">
		<strong>Heads Up!</strong> {{ Session::get('info') }}
	</div>
@endif

{{-- Light Alert --}}
@if(Session::has('light'))
	<div class="alert alert-light" role="alert">
		<strong>Note to User:</strong> {{ Session::get('light') }}
	</div>
@endif

{{-- Dark Alert --}}
@if(Session::has('dark'))
	<div class="alert alert-dark" role="alert">
		<strong>Note to User:</strong> {{ Session::get('dark') }}
	</div>
@endif

{{-- Authentication Alerts --}}
@if (session('status'))
<div class="alert alert-success" role="alert">
	<strong>Note to User:</strong> {{ session('status') }}
</div>
@endif

{{-- If the page has any errors passed to it --}}
@if(count($errors) > 0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong>

		<ul>
			@foreach($errors->all() as $error)
				
				<li>{{ $error }}</li>

			@endforeach
		</ul>
	</div>

@endif
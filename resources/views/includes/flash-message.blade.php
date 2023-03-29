@if ($message = Session::get('success'))
	<div class="alert success">
		<strong>{{ $message }}</strong>
	</div>
@endif

@if ($message = Session::get('danger'))
	<div class="alert danger">
		<strong>{{ $message }}</strong>
	</div>
@endif


@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="text-center error404">
			<img src="{{ asset('public/img/warning.png') }}" class="img-responsive" alt="Page not found">
			<h6>Error 404 - Page not found</h6>
			<p>Sorry the page you are looking for cannot be found</p>					
		</div>
	</div>	
</div>
@endsection
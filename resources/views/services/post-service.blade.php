@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">	
		@include('partials.sidebar') 
		<div class="col-md-9">
			<div class="main">
				<div class="panel panel-default">        
			        <div class="panel-heading">
			          <div class="panel-title">	            
			            <h4>Post Your Service</h4>	            
			          </div>
			        </div>
			        <div class="panel-body">				
						<div class="row">
							<div class="col-sm-10">						         	
					          	<form role="form" method="post" enctype="multipart/form-data" action="{{ url('services/post-service') }}">
					          		{{ csrf_field() }}
					          		@if ($message = Session::get('success_msg'))
		                                <div class="alert alert-success">
		                                    <p>{{ $message }}</p>
		                                </div>
		                            @endif

		                            @if ($message = Session::get('error_msg'))
		                                <div class="alert alert-warning text-center">
		                                    <p>{{ $message }}</p>
		                                </div>
		                            @endif
					          		@include('partials.post-service-form')						            
					          	</form>
					        </div>														
						</div>
					</div>
				</div>
			</div>					
		</div>	
	</div>	
</div>
@endsection

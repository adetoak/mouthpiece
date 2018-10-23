@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">		
		<div class="col-sm-12">
			<div class="main">
				<div class="panel panel-default">        
			        <div class="panel-heading">
			          <div class="panel-title">	            
			            <h4>Billing Information</h4>
			          </div>
			        </div>
			        <div class="panel-body">			        	
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
		        		<fieldset>
		        			<legend>Select Address to deliver to</legend>
		        				@foreach ($billing as $bill)
				        		<div class="col-md-3">
					        		<div class="panel panel-default billing">
									  <div class="panel-body">
									    <p><strong>Name:</strong> {{ $bill->full_name }}</p>
										<p><strong>State:</strong> {{ $bill->state }}</p>
										<p><strong>City:</strong> {{ $bill->city }}</p>
										<p><strong>Address:</strong> {{ $bill->address }}</p>
										<p><strong>Telephone:</strong> {{ $bill->telephone}}</p>
										<p class="dbutton">
										<a href="{{ url('checkout/'.$bill->id) }}" class="btn btn-primary">Deliver to this Address</a>
										</p>
									  </div>
									</div>
					        	</div>
					        	@endforeach
		        		</fieldset>
			        	<fieldset>
			        		<legend>Add a new Adress</legend>
							<div class="col-md-6">
								<form id="form-horizontal" method="post" action="{{ url('postbilling') }}">		    	
									{{ csrf_field() }}
									<input type="hidden" name="pid" value="" />
									<input type="hidden" name="amount" value="" />
									<input type="hidden" name="dprice" value="3000" />
									@include('partials.billing-form')			   
								</form>															
							</div>							
			        	</fieldset>					            						
					</div>
				</div>
			</div>					
		</div>
	</div>	
</div>
@endsection

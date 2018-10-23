@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		@include('partials.sidebar')	
		<div class="col-md-9 col-lg-9">
			<div class="main">
				<div class="panel panel-default">        
			        <div class="panel-heading">
			          <div class="panel-title">	            
			            <h4>Verify Profile</h4>	            
			          </div>
			        </div>
			        <div class="panel-body">				
						<div class="row">
							<div class="col-sm-12">	
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
									<legend>Verify Yourself</legend>
									<div class="well">
										<form method="post" action="{{ url('verify-profile') }}" enctype="multipart/form-data">
											{{ csrf_field() }}
											<div class="form-group">
											    <label><span class="fa fa-image">&nbsp;</span> Upload  Document (.png, .jpg, .jpeg):</label>
											    <input type="file" name="docimg" />
											</div>
											<p class="help-block">Either of I.D Card, Business certificate of incorporation</p>
											<div class="form-group text-right">    
											    <button type="submit" class="btn btn-primary">Update</button>            
											</div>											
										</form>										
									</div>
								</fieldset>	
								<fieldset>
									<legend>Social Media Accounts</legend>
									<div class="well">
										<form method="post" action="{{ url('updatesocial')}}" enctype="multipart/form-data">
							          		{{ csrf_field() }}							          		
							          		@include('partials.verify-profile-form')						            
							          	</form>
									</div>
								</fieldset>									       
					        </div>														
						</div>
					</div>
				</div>
			</div>					
		</div>	
	</div>	
</div>
@endsection

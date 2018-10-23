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
			            <h4>Edit Profile</h4>	            
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
									<legend>Personal Information</legend>
									<div class="well">
										<form method="post" action="{{ url('edit-profile')}}" enctype="multipart/form-data">
							          		{{ csrf_field() }}
				          					@include('partials.edit-profile')						            
							          	</form>
									</div>
								</fieldset>	
								<fieldset>
									<legend>Uplaod Profile Picture</legend>
									<div class="well">
										<form method="post" action="{{ url('profile-image') }}" enctype="multipart/form-data">
											{{ csrf_field() }}
											<div class="form-group">
											    <label><span class="fa fa-image">&nbsp;</span> Upload Picture (.png, .jpg, .jpeg):</label>
											    <input type="file" name="profileimg" />
											</div>
											<div class="form-group text-right">    
											    <button type="submit" class="btn btn-primary">Update</button>            
											</div>											
										</form>										
									</div>
								</fieldset>	
								<fieldset>
									<legend>Change Password</legend>
									<div class="well">
										<form method="post" action="{{ url('changepassword') }}" enctype="multipart/form-data">
											{{ csrf_field() }}
											<div class="form-group">
											    <label><span class="fa fa-lock">&nbsp;</span> New Password:</label>
											    <input class="form-control" name="newpassword" />            
											</div>
											<div class="form-group">
											    <label><span class="fa fa-lock">&nbsp;</span> Confirm Password:</label>
											    <input class="form-control" name="confirmnewpassword" />            
											</div>
											<div class="form-group text-right">    
											    <button type="submit" class="btn btn-primary">Update</button>            
											</div>            
											</div>											
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

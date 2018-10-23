@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">		
		<div class="col-sm-12">
			<div class="main">
				<div class="panel panel-default">        
			        <div class="panel-heading">
			          <div class="panel-title">	            
			            <h4>Job Offers</h4>
			          </div>
			        </div>
			        <div class="panel-body">							            
						<div class="row">	
							<div class="col-sm-12">
								<div class="table-responsive">
								  	<table class="table table-bordered">
									 	<thead>
							                <tr>
							                  <th class="text-left">Date Posted</th>
							                  <th class="text-center">Job Description</th>
							                  <th class="text-center">Duration</th>
							                  <th class="text-center">Price</th>
							                  <th class="text-center">Action</th>
							                </tr>
						              	</thead>	
						              	<tbody>	
						              		@foreach ($jobs as $job)					              	
							                <tr>
							                  	<td class="text-center">
							                  		<div class="media">
													  <div class="media-left media-middle">
													    <a href="#">
													      <img src="{{ asset('public/img/jobs/job-'.$job->job_id.'/'.$job->image_path)}}" alt="{{ $job->title }}" class="img-polaroid img-responsive joboffers">
													    </a>
													  </div>
													  <div class="media-body">
													    <h4 class="media-heading">{{ $job->description }}</h4>
													  </div>
													</div>								                  	
							                  	</td>
							                  	<td class="text-center">{{ $job->description }}</td>
							                  	<td class="text-center">{{ $job->duration }}</td>
							                  	<td class="text-center">&#8358;{{ number_format($job->price, 2, '.', ',') }}</td>
							                  	<td class="text-center">
								                    <div class="btn-group">
								                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Action <span class="caret"></span></button>
								                      <ul role="menu" class="dropdown-menu">
								                        <li><a href="#">View</a></li>
								                        <li><a href="#" data-toggle="modal" data-target="#sendoffer{{ $job->id }}">Send Offer</a></li>
								                        <li><a href="#">Delete</a></li>        
								                      </ul>
								                    </div><!-- /btn-group --> 
							                  	</td>
							                </tr> 
							                <div class="modal fade" id="sendoffer{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      	<div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">{{ $job->duration }}</h4>
											      	</div>
											      	<form method="post" action="">
												      	<div class="modal-body">
												        	@include('partials.send-offer-form')
												     	 </div>
												      	<div class="modal-footer">
													        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													        <button type="button" class="btn btn-primary">Submit</button>
												      	</div>
											        </form>
											    </div>
											  </div>
											</div>
							                @endforeach						              
						              	</tbody>							    
								  	</table>
								</div>														
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>	
</div>
@endsection

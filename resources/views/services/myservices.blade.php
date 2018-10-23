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
			            <h4>My Services</h4>
			          </div>
			        </div>
			        <div class="panel-body">				
			            <div class="row text-right">
			            	<div class="col-sm-12">
			            		<a href="{{ url('services/post-service') }}" class="btn btn-primary">
			            			<span class="fui-plus">&nbsp;</span>New Service
			            		</a>	 	
			            		<p></p>
			            	</div>
			            </div>
						<div class="row">	
							<div class="col-sm-12">
								
								@foreach ($services as $service)
								<div class="table-responsive">
								  	<table class="table table-bordered">
									 	<thead>
							                <tr>
							                  <th class="text-left">Service Details</th>
							                  <th class="text-center">Impressions</th>
							                  <!-- <th class="text-center">Views</th> -->
							                  <th class="text-center">orders</th>
							                  <th class="text-center">Action</th>
							                </tr>
						              	</thead>
						              	<tbody>						              	
							                <tr>
							                  	<td class="text-center">
							                  		<div class="media">
													  <div class="media-left media-middle">
													    <a href="#">
													      <img src="{{ asset('public/img/services/service-'.$service->service_id.'/'.$service->image_path)}}" alt="{{ $service->title }}" class="img-polaroid img-responsive myservices">
													    </a>
													  </div>
													  <div class="media-body">
													    <h6 class="media-heading">{{ $service->title }}</h6>
													  </div>
													</div>								                  	
							                  	</td>
							                  	<!-- <td class="text-center">0</td> -->
							                  	<td class="text-center">{{ $service->clicks }}</td>
							                  	<td class="text-center">		        			
								        			{{ $orders = \App\Order::where('ref_id', $service->service_id)->where('reference', 'service')->count() }}							
							                  	</td>
							                  	<td class="text-center">
								                    <div class="btn-group">
								                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Action <span class="caret"></span></button>
								                      <ul role="menu" class="dropdown-menu">
								                        <li><a href="{{ url('services/service-profile/'.$service->service_id) }}" target="_blank">View</a></li>
								                        <li><a href="#">Edit</a></li>
								                        <li><a href="{{ url('upload-video/'.$service->id) }}">Upload Video</a></li>
								                        <li><a href="#">Delete</a></li>        
								                      </ul>
								                    </div><!-- /btn-group --> 
							                  	</td>
							                </tr> 						              
						              	</tbody>								    
								  	</table>
								</div>	
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>	
</div>
@endsection

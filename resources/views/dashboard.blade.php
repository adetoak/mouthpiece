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
			            <h4>Dashboard</h4>	            
			          </div>
			        </div>
			        <div class="panel-body">				
						<div class="row">							
							<div class="col-md-6">								
								<div class="panel panel-default">        
							        <div class="page-header dashboard">							                    
							            <h6>Your Orders</h6>	            							          
							        </div>
							        <div class="panel-body">
							        	@if(!empty($orders))
							        	@foreach($orders as $order)
							        	<a class="list-group-item" href="{{ url('myorders') }}">
							        		<img src="{{ asset('public/img/products/product-'.$order->pid.'/'.$order->pimage) }}" alt="{{ $order->title }}" class="img-circle pimg">
							        		{{ $order->title }}
								        </a>	
								        @endforeach							        						        
								        @endif
							        </div>
							    </div>
							    <div class="panel panel-default">        
							        <div class="page-header dashboard">							                     
							            <h6>Message History</h6>	            							   
							        </div>
							        <div class="panel-body">
							        	@foreach ($msgtos as $msgto)								  	
									  	<a href="{{ url('messages/'.$msgto->message_id )}}" class="list-group-item">
									  		<img src="{{ asset('public/img/profile/profile-'.$msgto->msg_from.'/profilepic/'.$msgto->image_path) }}" alt="{{ $msgto->username }}" class="img-circle pimg">
										    {{ $msgto->username }} 									    									    
									  	</a>
									  	@endforeach
									  	@foreach ($msgfroms as $msgfrom)
									  	<a href="{{ url('messages/'.$msgfrom->message_id )}}" class="list-group-item">
									  		<img src="{{ asset('public/img/profile/profile-'.$msgfrom->msg_to.'/profilepic/'.$msgfrom->image_path) }}" alt="{{ $msgfrom->username }}" class="img-circle pimg">
										    {{ $msgfrom->username }} 									    									    
									  	</a>
									  	@endforeach
								    </div>
							    </div>
							</div>
							<div class="col-md-6">
								<div class="panel panel-default">        
							        <div class="page-header dashboard">							                     
							            <h6>News Update</h6>	            							          
							        </div>
							        <div class="panel-body">
							        	
							        </div>
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

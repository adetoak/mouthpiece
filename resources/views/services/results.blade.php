@extends('layouts.app')
@section('content')
<div class="resultjumbotron">
    <div class="container">
	  	<!-- Main component for a primary marketing message or call to action -->
	    <div class="col-md-6">
	    	<h3>No 1 Platform for Connecting with Enterpreneurs</h3> 
		    <div class="tabbable"> <!-- Only required for left/right tabs -->
		        <ul class="nav nav-tabs">
		            <li class="active">
		            	<a href="#tab1" data-toggle="tab">
		            		<span class="fa fa-hospital-o">&nbsp;</span> Services
		            	</a>
		            </li>
		          	<li>
		          		<a href="#tab2" data-toggle="tab">
		          			<span class="fa fa-cart-plus">&nbsp;</span> Products
		          		</a>
		          	</li>
		        </ul>
		        <p></p>
		        <div class="tab-content">
		            <div class="tab-pane active" id="tab1">		            
	              	  	<form action="{{ url('services/results') }}" method="get">
	              	  	{{ csrf_field() }} 		              	  	
	              	  		<div class="form-group">					        
						    	<div class="input-group">
						          	<input type="text" name="search" required class="form-control" placeholder="Search for services of any type!">
						          	<span class="input-group-btn">
						           		<button class="btn btn-primary" type="submit"><span class="fa fa-long-arrow-right">&nbsp;</span></button>
						          	</span>
						        </div>
						        <!-- /input-group -->
						    </div>                	  	                       
		            	</form>		            	             
		            </div>
		            <div class="tab-pane" id="tab2">	                
	              	  	<form action="{{ url('products/results') }}" method="get"> 	
	              	  		{{ csrf_field() }}	              	
	              	  		<div class="form-group">					        
						    	<div class="input-group">
						          	<input type="text" name="search" required class="form-control" placeholder="Search for Products of any type!">
						          	<span class="input-group-btn">
							            <button class="btn btn-primary" type="submit"><span class="fa fa-long-arrow-right">&nbsp;</span></button>
							        </span>
						        </div>
						        <!-- /input-group -->
						    </div>              	  		              	  	                       
		            	</form>
		            </div>
		     	</div>
		    </div>  	    	
	    </div>
 	</div>
</div> <!-- /jumbotron -->
<div class="container">
	<div class="row">		
		<div class="col-md-12">
			<div class="page-header">
				<h4>{{ $count }} result(s) found for &nbsp;"<b>{{ $search }}</b>"</h4>	            
			</div>			
		</div>
		@foreach ($searchss as $searchs)						 	
	 	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
			<div class="panel">
				<div class="panel-body" style="padding: 0px">
				    <div class="thumbnail">
					    	<img src="{{ asset('public/img/services/service-'.$searchs->service_id.'/'.$searchs->image_path)}}" alt="{{ $searchs->title }}" class="img-responsive">
					    <!-- <a href="{{ url('services/service-profile/'.$searchs->service_id) }}" class="imglink">
					    </a> -->
					    <div class="caption">					        
					        <p>
					        	<a href="{{ url('services/service-profile/'.$searchs->service_id) }}">
					        		<strong>{{ $searchs->title}}</strong>	
					        	</a>
					        </p>
					        <p class="serviceprice">&#8358;{{ number_format($searchs->price) }}</p>				        
					        <p class="servicedescription">
					        	{{ $searchs->description }}
					        </p>								        	
					    </div>
				    </div>											
		        	<div class="panel-footer">
		        		<small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
		        	</div>       									        
				</div>										
			</div>
	 	</div>
	 	@endforeach						 			
	</div>	
</div>
@endsection

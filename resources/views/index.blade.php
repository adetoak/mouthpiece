@extends('layouts.app')
@section('content')
<div class="jumbotron">
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
<div class="services">
	<div class="container">		
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<div class="featuredservices-heading">								
					<div class="featuredservices">								
						<h6>FEATURED SERVICES</h6>										
					</div>								
				</div>
				@foreach ($services as $service)								
					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 clearpadding">
						<div class="panel">
							<div class="panel-body" style="padding: 0px">
							    <div class="thumbnail">
								    	<img src="{{ asset('public/img/services/service-'.$service->service_id.'/'.$service->image_path) }}" alt="{{ $service->title }}" class="media-object img-responsive">											    
								    <div class="caption">					        
								        <p class="servicetitle">
								        	<a href="{{ url('services/service-profile/'.$service->service_id) }}">
								        		<strong>{{ $service->title}}</strong>	
								        	</a>
								        </p>
								        <p class="serviceprice">&#8358;{{ number_format($service->price) }}</p>
								        
								        <p class="servicedescription">
								        	{{ $service->description }}
								        </p>								        	
								    </div>
							    </div>											
					        	<div class="panel-footer">
					        		<small class="text-muted">
					        			<?php
					        			$feedback = \App\Order::where('ref_id', $service->service_id)->where('reference', 'service')->avg('rating');
					        			$orders = \App\Order::where('ref_id', $service->service_id)->where('reference', 'product')->count();								        			
					        			?>
					        			@if (ceil($feedback) == 0)
					        			&#9734; &#9734; &#9734; &#9734; &#9734; ({{ $orders }})
					        			@elseif (ceil($feedback) == 1)
					        			&#9733; &#9734; &#9734; &#9734; &#9734; ({{ $orders }})
					        			@elseif (ceil($feedback) == 2)
					        			&#9733; &#9733; &#9734; &#9734; &#9734; ({{ $orders }})
					        			@elseif (ceil($feedback) == 3)
					        			&#9733; &#9733; &#9733; &#9734; &#9734; ({{ $orders }})
					        			@elseif (ceil($feedback) == 4)
					        			&#9733; &#9733; &#9733; &#9733; &#9734; ({{ $orders }})
					        			@elseif (ceil($feedback) == 5)
					        			&#9733; &#9733; &#9733; &#9733; &#9733; ({{ $orders }})
					        			@endif
					        		</small>
					        	</div>       									        
							</div>										
						</div>
				 	</div>		
				@endforeach	
				<!-- <div id="carousel-example-generic" class="carousel slide">
				  <!-- Indicators 
					<ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active">Featured Services</li>
					    <li data-target="#carousel-example-generic" data-slide-to="1">Featured Products</li>	    
					</ol>					
					<!-- Wrapper for slides 
					<div class="carousel-inner">
						<div class="item active">
							@foreach ($services as $service)								
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 clearpadding">
									<div class="panel">
										<div class="panel-body" style="padding: 0px">
										    <div class="thumbnail">
											    	<img src="{{ asset('public/img/services/service-'.$service->service_id.'/'.$service->image_path) }}" alt="{{ $service->title }}" class="media-object img-responsive">
											   
											    <div class="caption">					        
											        <p class="servicetitle">
											        	<a href="{{ url('services/service-profile/'.$service->service_id) }}">
											        		<strong>{{ $service->title}}</strong>	
											        	</a>
											        </p>
											        <p class="serviceprice">&#8358;{{ number_format($service->price) }}</p>
											       
											        <p class="servicedescription">
											        	{{ $service->description }}
											        </p>								        	
											    </div>
										    </div>											
								        	<div class="panel-footer">
								        		<small class="text-muted">
								        			<?php
								        			$feedback = \App\Order::where('ref_id', $service->service_id)->where('reference', 'service')->avg('rating');
								        			$orders = \App\Order::where('ref_id', $service->service_id)->where('reference', 'product')->count();								        			
								        			?>
								        			@if (ceil($feedback) == 0)
								        			&#9734; &#9734; &#9734; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 1)
								        			&#9733; &#9734; &#9734; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 2)
								        			&#9733; &#9733; &#9734; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 3)
								        			&#9733; &#9733; &#9733; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 4)
								        			&#9733; &#9733; &#9733; &#9733; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 5)
								        			&#9733; &#9733; &#9733; &#9733; &#9733; ({{ $orders }})
								        			@endif
								        		</small>
								        	</div>       									        
										</div>										
									</div>
							 	</div>		
							@endforeach						 									
						</div>
						<div class="item">							
							@foreach ($products as $product)									
							 	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 clearpadding">
									<div class="panel">
										<div class="panel-body" style="padding: 0px">
										    <div class="thumbnail">
											    	<img src="{{ asset('public/img/products/product-'.$product->product_id.'/'.$product->image_path) }}" alt="{{ $product->title }}" class="media-object img-responsive">
											    <!-- <a href="{{ url('services/service-profile/'.$service->service_id) }}" class="imglink">
											    </a> 
											    <div class="caption">					        
											        <p class="servicetitle">
											        	<a href="{{ url('products/product-details/'.$product->product_id) }}">
											        		<strong>{{ $product->title}}</strong>	
											        	</a>
											        </p>
											        <p class="serviceprice">&#8358;{{ number_format($product->price) }}</p>
											        <!-- <p>
											        	<a href="" class="btn btn-primary orderbtn">Order</a>
											        	<span href="#" class="price pull-right" role="button">&#8358;{{ number_format($product->price) }}</span> 
											        </p> 
											        <p class="servicedescription">
											        	{{ $product->description }}
											        </p>								        	
											    </div>
										    </div>											
								        	<div class="panel-footer">
								        		<small class="text-muted">
								        			<?php
								        			$feedback = \App\Order::where('ref_id', $product->product_id)->where('reference', 'product')->avg('rating');
								        			$orders = \App\Order::where('ref_id', $product->product_id)->where('reference', 'product')->count();								        			
								        			?>
								        			@if (ceil($feedback) == 0)
								        			&#9734; &#9734; &#9734; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 1)
								        			&#9733; &#9734; &#9734; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 2)
								        			&#9733; &#9733; &#9734; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 3)
								        			&#9733; &#9733; &#9733; &#9734; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 4)
								        			&#9733; &#9733; &#9733; &#9733; &#9734; ({{ $orders }})
								        			@elseif (ceil($feedback) == 5)
								        			&#9733; &#9733; &#9733; &#9733; &#9733; ({{ $orders }})
								        			@endif
								        		</small>
								        	</div>       									        
										</div>										
									</div>
							 	</div>		
							@endforeach								 	
						</div>		
					</div>				
				</div> -->								 		
			</div>	
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">	
				<div class="featuredposts-heading">								
					<div class="featuredposts">								
						<h6>FEATURED POSTS</h6>										
					</div>								
				</div>	
				<div>
					<ul class="list-group">
						@if (count($posts) != 0)
						@foreach ($posts as $post)
						  <li class="list-group-item">
						    {{ $post->title }}
						    <a href="{{ $post->link }}" class="text-right"><span class="badge">View</span></a>
						  </li>					  
						@endforeach
						@endif
					</ul>									
				</div>		
			</div>			
		</div>		
	</div>	
</div>
<div class="products">
	
</div>
<!-- first section (nuts) -->
<div class="product-sec1">
	<h3 class="heading-tittle">Featured Products</h3>
	@foreach ($products as $product)
	<div class="col-md-3 product-men">
		<div class="men-pro-item simpleCart_shelfItem">
			<div class="men-thumb-item">
				<img src="{{ asset('public/img/products/product-'.$product->product_id.'/'.$product->image_path) }}" alt="{{ $product->title }}" style="width: 150px; height: 150px;">
				<div class="men-cart-pro">
					<div class="inner-men-cart-pro">
						<a href="{{ url('products/product-details/'.$product->product_id ) }}" class="link-product-add-cart">Quick View</a>
					</div>
				</div>
				<!-- <span class="product-new-top">New</span> -->
			</div>
			<div class="item-info-product ">
				<h4>
					<a href="{{ url('products/product-details/'.$product->product_id ) }}">{{ $product->title }}</a>
				</h4>
				<div class="info-product-price">
					<span class="item_price">&#8358;{{ number_format($product->price, 2, '.', ',') }}</span>
					<del>&#8358;{{ number_format($product->price, 2, '.', ',') }}</del>
				</div>
				<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
					<form action="#" method="post">
						<fieldset>
							<input type="submit" data-name="{{ $product->title }}" data-price="{{ number_format($product->price, 2, '.', '') }}" data-id="{{ $product->product_id }}" data-img="{{ $product->image_path }}" value="Add to cart" class="button add-to-cart" />
						</fieldset>
					</form>
				</div>

			</div>
		</div>
	</div>
	@endforeach	
	<div class="clearfix"></div>
</div>
@endsection

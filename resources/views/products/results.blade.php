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
		<div class="col-md-3 product-men">
			<div class="men-pro-item simpleCart_shelfItem">
				<div class="men-thumb-item">
					<img src="{{ asset('public/img/products/product-'.$searchs->product_id.'/'.$searchs->image_path) }}" alt="{{ $searchs->title }}" style="width: 150px; height: 150px;">
					<div class="men-cart-pro">
						<div class="inner-men-cart-pro">
							<a href="{{ url('products/product-details/'.$searchs->product_id ) }}" class="link-product-add-cart">Quick View</a>
						</div>
					</div>
					<!-- <span class="product-new-top">New</span> -->
				</div>
				<div class="item-info-product ">
					<h4>
						<a href="{{ url('products/product-details/'.$searchs->product_id ) }}">{{ $searchs->title }}</a>
					</h4>
					<div class="info-product-price">
						<span class="item_price">&#8358;{{ number_format($searchs->price, 2, '.', ',') }}</span>
						<del>&#8358;{{ number_format($searchs->price, 2, '.', ',') }}</del>
					</div>
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="#" method="post">
							<fieldset>
								<input type="submit" data-name="{{ $searchs->title }}" data-price="{{ number_format($searchs->price, 2, '.', '') }}" data-id="{{ $searchs->product_id }}" data-img="{{ $searchs->image_path }}" value="Add to cart" class="button add-to-cart" />
							</fieldset>
						</form>
					</div>

				</div>
			</div>
		</div>
		@endforeach
	</div>	
</div>
@endsection

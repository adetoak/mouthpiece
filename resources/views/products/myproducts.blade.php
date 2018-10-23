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
			            <h4>My Products</h4>
			          </div>
			        </div>
			        <div class="panel-body">				
			            <div class="row text-right">
			            	<div class="col-sm-12">
			            		<a href="{{ url('products/post-product') }}" class="btn btn-primary">
			            			<span class="fui-plus">&nbsp;</span>New Product
			            		</a>	 	
			            		<p></p>
			            	</div>
			            </div>
						<div class="row">	
							<div class="col-sm-12">
								<div class="table-responsive">
								  	<table class="table table-bordered">
									 	<thead>
							                <tr>
							                  <th class="text-left">Product Details</th>
							                  <th class="text-center">Impressions</th>
							                  <!-- <th class="text-center">Views</th> -->
							                  <th class="text-center">orders</th> 
							                  <th class="text-center">Action</th>
							                </tr>
						              	</thead>
						              	<tbody>				
						              		@foreach ($products as $product)		              	
							                <tr>
							                  	<td class="text-center">
							                  		<div class="media">
													  <div class="media-left media-middle">
													    <a href="#">
													      <img src="{{ asset('public/img/products/product-'.$product->product_id.'/'.$product->image_path)}}" alt="{{ $product->title }}" class="img-cicle img-responsive myservices">
													    </a>
													  </div>
													  <div class="media-body">
													    <h4 class="media-heading">{{ $product->title }}</h4>
													  </div>
													</div>								                  	
							                  	</td>
							                  	<!-- <td class="text-center">0</td> -->
							                  	<td class="text-center">{{ $product->clicks }}</td>
							                  	<td class="text-center">
							                  		{{ $orders = \App\Order::where('ref_id', $product->product_id)->where('reference', 'product')->count() }}
							                  	</td>
							                  	<td class="text-center">
								                    <div class="btn-group">
								                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Action <span class="caret"></span></button>
								                      <ul role="menu" class="dropdown-menu">
								                        <li><a href="{{ url('products/product-details/'.$product->product_id) }}" target="_blank">View</a></li>
								                        <li><a href="#">Edit</a></li>
								                        <li><a href="#">Delete</a></li>        
								                      </ul>
								                    </div><!-- /btn-group --> 
							                  	</td>
							                </tr>
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

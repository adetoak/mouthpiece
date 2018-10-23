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
			            <h4>Upgrade Your Account</h4>	            
			          </div>
			        </div>
			        <div class="panel-body">				
						<div class="row">							
							<div class="col-sm-12">
								@foreach ($usercategorys as $usercategory)								
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
									<div class="panel upgradeaccount">
										<div class="panel-body" style="padding: 0px">
										    <div class="thumbnail">
											    <img src="http://localhost/mouthpadmin/public/img/clientcategory/{{ $usercategory->category_img }}" alt="{{ $usercategory->title }}" class="media-object img-responsive">										    
											    <div class="caption">					        
											        <p>
											        	<a href="#">
											        		<strong>{{ $usercategory->title}}</strong>	
											        	</a>
											        </p>
											        <p class="usercategoryprice">&#8358;{{ number_format($usercategory->price) }}</p>											        
											        <p class="usercategorydescription">
											        	{{ $usercategory->sdescription }}
											        </p>								        	
										        	<p>
										        		<button class="btn btn-primary">Upgrade</button>
										        		<button class="btn btn-default">Read More</button>
										        	</p>       									        
											    </div>
										    </div>											
										</div>										
									</div>
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

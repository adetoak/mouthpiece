@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="">
			<div class="main">
				<div class="panel panel-default">        
			        <div class="panel-heading">
			          <div class="panel-title">	            
			            <h4>Service Description</h4>	            
			          </div>
			        </div>
			        <div class="panel-body">				 
						<div class="row">
							<div class="col-sm-4">
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
	                            <div class="well">
	                            	<div>
	                            		<a href="#">
									      <img class="serviceimg" src="{{ asset('public/img/services/service-'.$services->service_id.'/'.$services->imagepath) }}" alt="{{ $services->title }}">
									    </a>
	                            	</div>
	                            	<div class="panel-footer">
						        		<small class="text-muted">
						        			<?php
						        			$feedback = \App\Order::where('ref_id', $services->service_id)->where('reference', 'service')->avg('rating');
						        			$orders = \App\Order::where('ref_id', $services->service_id)->where('reference', 'product')->count();								        			
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
						        	<a href="{{ url('order/'.$services->sid) }}" class="btn btn-primary btn-lg btn-block">Order</a>
						            <!-- <div class="form-group">						            	
						            	<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" role="form">        
										  {{ csrf_field() }}   
										  <input type="hidden" name="email" value="{{ $email = isset($user->id)?$user->email:'adetoak2015@gmail.com' }}"> 
										  <input type="hidden" name="orderID" value="345">             				<input type="hidden" name="amount" value="{{ $services->price*100 }}">             			
										  <?php $userid = isset($user->id)?$user->id:0; $refid= $services->service_id; $price = $services->price; ?>
										  <input type="hidden" name="quantity" value="3">
										  <input type="hidden" name="metadata" value="{{ json_encode($array = ['userid' => $userid,'reference' => 'services','amount' => $price,'ref_id' => $refid,'paymentmethod' => 'Paystack',]) }}" > 
										  <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
										  <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> 


										  <div class="form-group text-left">
										    <button class="btn btn-primary btn-lg btn-block" type="submit">
										    Order
										    </button>
										  </div>          
										</form>					            	
						            </div> -->						            	
					            </div>
								<div class="well">          	  						           
						            <div class="form-group">
						            	<a href="#sendmessage" data-toggle="modal" class="btn btn-primary btn-latge btn-block">
						            		<span class="fa fa-envelope"></span> Message Seller
						            	</a>
						            	<div class="modal fade" id = "sendmessage" role = "dialog">
								          <div class="modal-dialog">
								            <div class="modal-content">
								              <div class="modal-header">
								                <h4>Send message to {{ $services->username }}</h4>
								              </div>
								              <form method="post" action="{{ url('messages') }}" enctype="multipart/form-data">
								              	<div class="modal-body">
													{{ csrf_field() }}
													<input type="hidden" name="messageid" value="{{ str_shuffle('01234789') }}">
													<input type="hidden" name="id" value="{{ $services->sid }}">
													<input type="hidden" name="recipent" value="{{ $services->uid }}">	
													<input type="hidden" name="ref" value="services">	
													<div class="form-group">
														<textarea class="form-control" rows="3" name="message"></textarea>
													</div>
													<div class="form-group">
														<label for="exampleInputFile">
															<span class="fui-clip">&nbsp;</span> Attach Files
														</label>
														<input type="file" name="messageimg" id="exampleInputFile">
														<p class="help-block">Max size:10mb</p>
													</div>								              		
								              	</div>
												<div class="modal-footer">
									                <a class="btn btn-default" data-dismiss="modal">Close</a>
									                <button type="submit" class="btn btn-primary">
														<span class="fa fa-send">&nbsp;</span> Send
													</button>
								                </div>													
												</form>								              
								            </div>
								          </div>
								        </div>
						            	<!-- <a href="{{ url('messages/services/'.$services->id) }}" class="btn btn-primary btn-latge btn-block">
						            		<span class="fa fa-envelope"></span> Message
						            	</a> -->
						            </div>
					            </div>					            
							</div>
							<div class="col-sm-8 servicedetails">
								<div class="page-header">
									<h6><strong>Title</strong></h6>	
								</div>
								<p>{{ $services->title }}</p>
								<div class="page-header">
									<h6><strong>Description</strong></h6>	
								</div>
								<p>{{ $services->description }}</p>
								<div class="page-header">
									<h6><strong>Pricing</strong></h6>	
								</div>
								<p>&#8358;{{ number_format($services->price, 2, '.', ',')}}</p>
								<div class="page-header">
									<h6><strong>Service Timeline</strong></h6>	
								</div>
								<p>{{ $services->duration }}</p>
								<div class="page-header">
									<h6><strong>Requirements</strong></h6>	
								</div>
								<p>{{ $services->requirement }}</p>
								<div class="page-header">
									<h6><strong>Buyers Remarks</strong></h6>	
								</div>
								<p>

								</p>
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>		
	</div>	
</div>
@endsection

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
			            <h4>Ordered Products</h4>
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
								<div class="table-responsive">
								  	<table class="table table-bordered">
									 	<thead>
							                <tr>
							                  <th class="text-left">Date</th>
							                  <th class="text-center">Description</th>
							                  <th class="text-center">Seller Details</th>
							                  <th class="text-center">Price</th>
							                  <th class="text-center">Action</th>
							                </tr>
						              	</thead>	
						              	<tbody>
						              		@foreach($orders as $order)
						              		<tr>
						              			<td>{{ $order->created_at }}</td>
						              			<td class="text-center">{{ $order->title }}</td>
						              			<td class="text-center">{{ $order->username }}</td>
						              			<td class="text-center">&#8358;{{ number_format($order->price) }}</td>
						              			<td class="text-center">												
													<div class="btn-group">
								                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button">Action <span class="caret"></span></button>
								                      <ul role="menu" class="dropdown-menu">
								                        <li><a href="{{ url('invoice/product/'.$order->order_id) }}">View invoice</a></li>
								                        <li>
								                        	<a href="#confirm" data-toggle="modal">
																Complete Order
															</a>
								                        </li>
								                        <li>
								                        	<a href="#feedback{{ $order->oid }}" data-toggle="modal">
																Leave feedback
															</a>
														</li>
								                        <li><a href="{{ url('order/delete/'.$order->order_id.'/'.$order->pid)}}">Delete</a></li>        
								                      </ul>
								                    </div><!-- /btn-group --> 											
								                </td>
						              		</tr>
						              		 <div class="modal fade" id = "feedback{{ $order->oid }}" role = "dialog">
					                            <div class="modal-dialog">
					                                <div class="modal-content">
					                                	<div class="modal-header">
					                                		<h4>Leave Feedback For Order {{ $order->title }}</h4>
					                                	</div>
					                                    <div class="modal-body">
					                                    	<form method="post" action="{{ url('feedback') }}">
					                                    		{{ csrf_field() }}
					                                        	@include('partials.feedback-form')           		
					                                        </form>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
						              		@endforeach
						              	</tbody>							    
								  	</table>
								</div>	
								{{ $orders->links() }}													
							</div>
						</div>
					</div>
				</div>
			</div>					
		</div>
	</div>	
</div>
@endsection

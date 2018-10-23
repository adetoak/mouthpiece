@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">		
		<div class="col-sm-12">
			<div class="main">
				<div class="panel panel-default">        
			        <div class="panel-heading">
			          <div class="panel-title">	            
			            <h4>My Messages</h4>
			          </div>
			        </div>
			        <div class="panel-body">							            
						<div class="row">
							<div class="col-sm-4">								
								<div class="list-group">
									<a href="#" class="list-group-item active">
									    Conversations
									</a>											
									@foreach ($conversations as $conversation)
								  	<a href="#" class="list-group-item">
									    <h6 class="list-group-item-heading">
									    	{{ $conversation->username }} </span> 
									    </h6>									    
								  	</a>
								  	@endforeach								  	
								</div>								
							</div><!-- /.col-sm-4 -->  
							<div class="col-sm-8">
								<div class="conversations">
									{{ csrf_field() }}
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
										<div class="media">
											<div class="media-left pull-left">
												@if ($ref == "services")
											    <a href="#">
											      <img class="img-circle" src="{{ asset('public/img/services/service-'.$reference->service_id.'/'.$reference->image_path)}}" alt="{{ $reference->title }}" class="img-responsive">
											    </a>
											    @else
											    <a href="#">
											      <img class="img-circle" src="{{ asset('public/img/products/product-'.$reference->product_id.'/'.$reference->image_path)}}" alt="{{ $reference->title }}" class="img-responsive">
											    </a>
												@endif
											</div>
											<div class="media-body">
											    <h4 class="media-heading">{{ $reference->title }}</h4>
											    <p>{{ $reference->description }}</p>
											</div>
										</div>										
									</div>
									<div class="table-responsive">
									  	<table class="table table-bordered">
							                <tr>
							                  <td>
							                  	<div class="media">
													<div class="media-left pull-left">
													    <a href="#">
													      <img class="img-circle" data-src="holder.js/140x140" alt="...">
													    </a>
													</div>
													<div class="media-body">
													    <h4 class="media-heading">Media heading</h4>
													    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
													</div>
												</div>
							                  </td>
							                </tr>
							                <tr>
							                  <td>
							                  	<div class="media">
													<div class="pull-left">
													    <a href="#">
													      <img class="img-circle" data-src="holder.js/140x140" alt="...">
													    </a>
													</div>
													<div class="media-body">
													    <h4 class="media-heading">Media heading</h4>
													    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
													</div>
												</div>
							                  </td>
							                </tr>										 	
									  	</table>
									</div>
									<div class="panel">
										<div class="panel-title">
											<span class="fui-mail">&nbsp;</span> Send Message
										</div>
										<form method="post" action="{{ url('messages') }}" enctype="multipart/form-data">
											{{ csrf_field() }}
											<input type="hidden" name="messageid" value="{{ str_shuffle('01234789') }}">
											<input type="hidden" name="recipent" value="{{ $conversations->user_id }}">		
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
											<div class="form-group text-right">
												<button type="submit" class="btn btn-primary">
													<span class="fa fa-send">&nbsp;</span> Send
												</button>
											</div>
										</form>
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

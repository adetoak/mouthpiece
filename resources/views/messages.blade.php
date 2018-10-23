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
								  	@foreach ($msgtos as $msgto)		
								  	@if (!empty($msgto->image_path))						  	
								  	<a href="{{ url('messages/'.$msgto->message_id )}}" class="list-group-item">
								  		<img src="{{ asset('public/img/profile/profile-'.$msgto->msg_from.'/profilepic/'.$msgto->image_path) }}" alt="{{ $msgto->username }}" class="img-circle pimg">
									    {{ $msgto->username }} 									    									    
								  	</a>
								  	@else
								  	<a href="{{ url('messages/'.$msgto->message_id )}}" class="list-group-item">
								  		<img src="{{ asset('public/img/brand-logo.png') }}" alt="{{ $msgto->username }}" class="img-circle pimg">
									    {{ $msgto->username }} 		    									    
								  	</a>
								  	@endif
								  	@endforeach
								  	@foreach ($msgfroms as $msgfrom)
								  	@if (!empty($msgfrom->image_path))
								  	<a href="{{ url('messages/'.$msgfrom->message_id )}}" class="list-group-item">
								  		<img src="{{ asset('public/img/profile/profile-'.$msgfrom->msg_to.'/profilepic/'.$msgfrom->image_path) }}" alt="{{ $msgfrom->username }}" class="img-circle pimg">
									    {{ $msgfrom->username }} 									    									    
								  	</a>
								  	@else
								  	<a href="{{ url('messages/'.$msgfrom->message_id )}}" class="list-group-item">
								  		<img src="{{ asset('public/img/brand-logo.png') }}" alt="{{ $msgfrom->username }}" class="img-circle pimg">
									    {{ $msgfrom->username }} 									    									    
								  	</a>
								  	@endif
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
		                            @if (isset($conversations))
			                            <div class="page-header">
			                            	<h4>Chat History</h4>
			                            </div>
			                            @foreach ($conversations as $conversation)
			                            @if ($conversation->msg_from != $user->id)
											<div class="well">
												<img data-src="holder.js/40x40" alt="{{ $conversation->username }}" class="left">									
												<p>{{ $conversation->body }}</p>		
												<span class="time-right">{{ $conversation->created_at }}</span>
											</div>
										@else
											<div class="well darker">
												<img data-src="holder.js/40x40" alt="{{ $conversation->username }}" class="right">									
												<p class="text-right">{{ $conversation->body }}</p>		
												<span class="time-left">{{ $conversation->created_at }}</span>
											</div>
										@endif
										@endforeach																	
									<div class="panel">
										<div class="panel-title">
											<span class="fui-mail">&nbsp;</span> Send Message
										</div>
										<form method="post" action="{{ url('messages') }}" enctype="multipart/form-data">
											{{ csrf_field() }}														
											<input type="hidden" name="messageid" value="{{ $msgid }}">
											<input type="hidden" name="ref" value="">
											<input type="hidden" name="id" value="">
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
									@endif
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

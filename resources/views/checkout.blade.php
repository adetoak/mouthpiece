@extends('layouts.app')
@section('content')
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Checkout
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<!-- <div>You have <span id="count-cart">X</span> items in your cart</div> -->
            <!-- <div>Total Cart:&#8358;<span id="total-cart"></span></div> -->
			<div class="table-responsive">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product</th>
							<th>Product Name</th>
							<th>Unit Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<!-- <th>Remove</th> -->
						</tr>
					</thead>
					<tbody id="show-checkout">						
														
					</tbody>
				</table>
			</div>
		</div>
		<div class="checkout-left">			   			
			<div class="form-group text-right">
				<button class="btn btn-primary" id="checkout-cart" data-txnref="{{ $txn_ref }}">Checkout</button>
			</div>
			<fieldset>
    			<legend>Delivery Address</legend>			        				
        		<div class="col-md-6 clearpadding">
	        		<div class="panel panel-default">
					  <div class="panel-body">
					    <p><strong>Name:</strong> {{ $bill->full_name }}</p>
						<p><strong>State:</strong> {{ $bill->state }}</p>
						<p><strong>City:</strong> {{ $bill->city }}</p>
						<p><strong>Address:</strong> {{ $bill->address }}</p>
						<p><strong>Telephone:</strong> {{ $bill->telephone}}</p>
						<p>
						<a href="{{ url('billing') }}" class="btn btn-primary">Change Delivery Address</a>
						</p>
					  </div>
					</div>
	        	</div>						        	
    		</fieldset>	
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
@endsection

@extends('layouts.app')
@section('content')
<div class="privacy">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Cart
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
							<th>Remove</th>
						</tr>
					</thead>
					<tbody id="show-cart">						
														
					</tbody>
				</table>
			</div>
		</div>
		<div class="checkout-left text-right">
			<div class="form-group">
				<a href="{{ url('billing') }}" class="btn btn-primary">Proceed</a>
			</div>		
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
@endsection

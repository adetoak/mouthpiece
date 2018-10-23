@extends('layouts.app')
@section('content')
<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Product Details
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="col-md-5 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="{{ asset('public/img/products/product-'.$products->product_id.'/'.$products->imagepath)}}">
							<div class="thumb-image">
								<img src="{{ asset('public/img/products/product-'.$products->product_id.'/'.$products->imagepath) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="{{ asset('public/img/products/product-'.$products->product_id.'/'.$products->imagepath)}}">
							<div class="thumb-image">
								<img src="{{ asset('public/img/products/product-'.$products->product_id.'/'.$products->imagepath)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="{{ asset('public/img/products/product-'.$products->product_id.'/'.$products->imagepath)}}">
							<div class="thumb-image">
								<img src="{{ asset('public/img/products/product-'.$products->product_id.'/'.$products->imagepath)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="col-md-7 single-right-left simpleCart_shelfItem">
			<h3>{{ $products->title }}</h3>
			<div class="rating1">
				<span class="starRating">
					<input id="rating5" type="radio" name="rating" value="5">
					<label for="rating5">5</label>
					<input id="rating4" type="radio" name="rating" value="4">
					<label for="rating4">4</label>
					<input id="rating3" type="radio" name="rating" value="3" checked="">
					<label for="rating3">3</label>
					<input id="rating2" type="radio" name="rating" value="2">
					<label for="rating2">2</label>
					<input id="rating1" type="radio" name="rating" value="1">
					<label for="rating1">1</label>
				</span>
			</div>
			<p>
				<span class="item_price">&#8358;{{ number_format($products->price, 2, '.', ',') }}</span>
				<del>{{ number_format($products->price,2) }}</del>
				<label>Free delivery</label>
			</p>
			<div class="single-infoagile">
				<ul>
					<li>
						Cash on Delivery Eligible.
					</li>
					<li>
						Shipping Speed to Delivery.
					</li>
					<li>
						Sold and fulfilled by Supple Tek (3.6 out of 5 | 8 ratings).
					</li>					
				</ul>
			</div>
			<div class="product-single-w3l">
				<p>
					<i class="fa fa-pencil" aria-hidden="true"></i>Product Description</p>
				<p>{{ $products->description }}</p>
				<p>
					<i class="fa fa-warning" aria-hidden="true"></i>All food products are
					<label>non-returnable.</label>
				</p>
			</div>
			<div class="occasion-cart">
				<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
					<form action="#" method="post">
						<fieldset>
							<!-- <input type="hidden" name="cmd" value="_cart" />
							<input type="hidden" name="add" value="1" />
							<input type="hidden" name="business" value=" " />
							<input type="hidden" name="item_name" value="{{ $products->title }}" />
							<input type="hidden" name="amount" value="{{ number_format($products->price, 2, '.', '') }}" />
							<input type="hidden" name="discount_amount" value="0.00" />
							<input type="hidden" name="currency_code" value="NGN" />
							<input type="hidden" name="return" value=" " />
							<input type="hidden" name="cancel_return" value=" " />
							<input type="submit" name="submit" value="Add to cart" class="button" /> -->
							<input type="submit" class="button add-to-cart" href="#" data-name="{{ $products->title }}" data-price="{{ number_format($products->price, 2, '.', '') }}" data-id="{{ $products->product_id }}" data-img="{{ $products->imagepath }}" value="Add to cart" /></a>
						</fieldset>
					</form>
				</div>

			</div>

		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //Single Page -->
<!-- special offers -->
<div class="featured-section" id="projects">
	<div class="container">
		<!-- tittle heading -->
		<h3 class="tittle-w3l">Recommended Product
			<span class="heading-style">
				<i></i>
				<i></i>
				<i></i>
			</span>
		</h3>
		<!-- //tittle heading -->
		<div class="content-bottom-in">
			<ul id="flexiselDemo1">
				@foreach($allproducts as $product)
				<li>
					<div class="w3l-specilamk">
						<div class="speioffer-agile">
							<a href="{{ url('products/product-details/'.$product->product_id )}}">
								<img src="{{ asset('public/img/products/product-'.$product->product_id.'/'.$product->image_path) }}" alt="{{ $product->title }}" style="width: 150px; height: 150px;">
							</a>
						</div>
						<div class="product-name-w3l">
							<h4 style="min-height: 70px; max-height: 80px;">
								<a href="{{ url('products/product-details/'.$product->product_id ) }}">{{ $product->title }}</a>
							</h4>
							<div class="w3l-pricehkj">
								<h6>&#8358;{{ number_format($product->price, 2, '.', ',') }}</h6>
								<p>Save &#8358;{{ number_format(0, 2, '.', ',') }}</p>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<form action="#">
									<fieldset>										
										<input type="submit" data-name="{{ $product->title }}" data-price="{{ number_format($product->price, 2, '.', '') }}" data-id="{{ $product->product_id }}" data-img="{{ $product->image_path }}" value="Add to cart" class="button add-to-cart" />
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</li>
				@endforeach				
			</ul>
		</div>
	</div>
</div>
<!-- //special offers -->
@endsection
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mouthpiece') }}</title>
    <!-- Fonts -->    
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&amp;subset=latin-ext" rel="stylesheet">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('public/img/favicon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('public/img/favicon/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('public/img/favicon/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/img/favicon/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('public/img/favicon/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/img/favicon/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('public/img/favicon/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/img/favicon/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/favicon/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('public/img/favicon/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/img/favicon/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/favicon/favicon-16x16.png') }}">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
    <!-- Styles -->
    <link href="{{ asset('public/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/css/font-awesome/css/font-awesome.min.css') }}">

    <!-- Loading Flat UI -->
    <link href="{{ asset('public/css/flat-ui.css') }}" rel="stylesheet">
    <script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->	
	<link href="{{ asset('public/template/css/templatestyle.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!--pop-up-box-->
	<link href="{{ asset('public/template/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.ico') }}">
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">    
	<link rel="stylesheet" type="text/css" href="{{ asset('public/template/css/jquery-ui1.css') }}">
	<link rel="stylesheet" href="{{ asset('public/template/css/flexslider.css') }}" type="text/css" media="screen" />

</head>
<body>
    <div id="app" class="wrapper">        
        @include('layouts.header')        
        @yield('content')
        @include('layouts.footer')        
    </div>
    <script src="http://code.jquery.com/jquery-1.8.3.min.js" ></script>
    <script src="{{ asset('public/js/vendor/jquery.min.js') }}"></script>    
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/59888a9f1b1bed47ceb03716/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <script type="text/javascript">
        $(function() {
            $(window).on("scroll", function() {
                if($(window).scrollTop() > 50) {
                    $(".navbar-fixed-top").addClass("navbaractive");
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                   $(".navbar-fixed-top").removeClass("navbaractive");
                }
            });
        });
    </script>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('public/js/flat-ui.min.js') }}"></script>

    <script src="{{ asset('public/template/js/jquery-2.1.4.min.js') }}"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="{{ asset('public/template/js/jquery.magnific-popup.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="{{ asset('public/js/shoppingCart.js') }}"></script>
	 <script>

            $(".add-to-cart").click(function(event){
                event.preventDefault();
                var name = $(this).attr("data-name");
                var price = Number($(this).attr("data-price"));
                var id = $(this).attr("data-id");
                var img = $(this).attr("data-img");

                shoppingCart.addItemToCart(name, price, id, img, 1);
                alert("Product added to cart");
                displayCart();
            });

            $("#clear-cart").click(function(event){
                shoppingCart.clearCart();
                displayCart();
            });

            function displayCart() {
                var cartArray = shoppingCart.listCart();
                //console.log(cartArray);
                var output = "";
                var checkoutoutput = "";
                var x = 1;
                var c = 1;

                for (var i in cartArray) {
                    output += "<tr class='rem1'>"
        							+"<td class='invert'>"+(x++)+"</td>"
        							+"<td class='invert-image'>"
        								+"<a href='products/product-details/"+cartArray[i].id+"'>"
        									+"<img src='public/img/products/product-"+cartArray[i].id+"/"+cartArray[i].img+"' alt='"+cartArray[i].id+"' class='img-responsive'>"
        								+"</a>"
        							+"</td>"
        							+"<td class='invert'>"+cartArray[i].name+"</td>"
        							+"<td class='invert'>"+cartArray[i].price+"</td>"
        							+"<td class='invert'>"
        								+"<div class='quantity'>"
        									+"<div class='quantity-select'>"
        										+"<div class='entry value-minus subtract-item' data-name='"+cartArray[i].name+"'>&nbsp;</div>"
        										+"<div class='entry value'>"
        											+"<span class='item-count' data-name='"+cartArray[i].name+"'>"+cartArray[i].count+"</span>"
        										+"</div>"
        										+"<div class='entry value-plus  plus-item active' data-name='"+cartArray[i].name+"'>&nbsp;</div>"
        									+"</div>"
        								+"</div>"
        							+"</td>"
        							+"<td class='invert'>&#8358;"+cartArray[i].total+"</td>"
        							+"<td class='invert'>"
        								+"<div class='rem'>"
        									+"<div class='close1 delete-item' data-name='"+cartArray[i].name+"'></div>"
        								+"</div>"
        							+"</td>";        						
                }
                output += "</tr>"
        						+"<tr>"
        						+"<td></td>"
        						+"<td></td>"
        						+"<td></td>"
        						+"<td></td>"
        						+"<td><strong>Total:</strong> </td>"									
								+"<td><h5><strong>&#8358;<span id='total-cart'></span></strong></h5></td>"
        						+"<td></td>"
        						+"</tr>";
        		for (var i in cartArray) {
                    checkoutoutput += "<tr class='rem1'>"
        							+"<td class='invert'>"+(c++)+"</td>"
        							+"<td class='invert-image'>"
        								+"<a href='../products/product-details/"+cartArray[i].id+"'>"
        									+"<img src='../public/img/products/product-"+cartArray[i].id+"/"+cartArray[i].img+"' alt='"+cartArray[i].id+"' class='img-responsive'>"
        								+"</a>"
        							+"</td>"
        							+"<td class='invert'>"+cartArray[i].name+"</td>"
        							+"<td class='invert'>"+cartArray[i].price+"</td>"
        							+"<td class='invert'>"
        								+"<div class='quantity'>"
        									+"<div class='quantity-select'>"								
        										+"<div class='entry value'>"
        											+"<span class='item-count' data-name='"+cartArray[i].name+"'>"+cartArray[i].count+"</span>"
        										+"</div>"        										
        									+"</div>"
        								+"</div>"
        							+"</td>"
        							+"<td class='invert'>&#8358;"+cartArray[i].total+"</td>";
        							        						
                }
                checkoutoutput += "</tr>"
        						+"<tr>"
        						+"<td></td>"
        						+"<td></td>"
        						+"<td></td>"
        						+"<td></td>"
        						+"<td><strong>Total:</strong> </td>"									
								+"<td><h5><strong>&#8358;<span id='total-cart'></span></strong></h5></td>"
								+"</tr>";

                $("#show-cart").html(output);
                $("#show-checkout").html(checkoutoutput);
                $("#count-cart").html( shoppingCart.countCart() );
                $("#total-cart").html( shoppingCart.totalCart() );
            }

            $("#show-cart").on("click", ".delete-item", function(event){
                var name = $(this).attr("data-name");
                shoppingCart.removeItemFromCartAll(name);
                displayCart();
            });

            $("#show-cart").on("click", ".subtract-item", function(event){
                var name = $(this).attr("data-name");
                var id = $(this).attr("data-id");
                shoppingCart.removeItemFromCart(name);
                displayCart();
            });

            $("#show-cart").on("click", ".plus-item", function(event){
                var name = $(this).attr("data-name");
                var price = $(this).attr("data-price");
                var id = $(this).attr("data-id");
                var img = $(this).attr("data-img");

                shoppingCart.addItemToCart(name, price, id, img, 1);
                //shoppingCart.addItemToCart(name, 0, 1);
                displayCart();
            });

            $("#show-cart").on("change", ".item-count", function(event){
                var name = $(this).attr("data-name");
                var id = $(this).attr("data-id");
                var count = Number($(this).val());
                shoppingCart.setCountForItem(name, id, count);
                displayCart();
            });


            displayCart();

        </script>
        <!-- End Cart.js -->
        <!-- checkout.js -->
        <script type="text/javascript">
        	$("#checkout-cart").click(function(event){
        		var txnref = $(this).attr("data-txnref");
        		var csrf_token = "{!! csrf_token() !!}"; 
        		//alert(txnref);
                //event.preventDefault();  
                var cartArray = shoppingCart.listCart();
                //console.log(cartArray);                

                for (var i in cartArray) {
	                $.post("../submitcart", {"_token":csrf_token, "orderid":txnref, "productid":cartArray[i].id, "qty":cartArray[i].count, "amount":cartArray[i].total}, function (result) {
						if(result == "true") { 
							//alert("Posted");
							
						} else {						
							alert("Could Not Post results");
							
						}
					});
                }        	              
					shoppingCart.clearCart();
					window.location.href='../invoice/product/'+txnref;
                	//displayCart();

					//alert('success');                
            });     	
        </script>
        <!-- End checkout.js -->
	<!-- price range (top products) -->
	<script src="{{ asset('public/template/js/jquery-ui.js') }}"></script>
	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 0,
				max: 9000,
				values: [50, 6000],
				slide: function (event, ui) {
					$("#amount").val("&#8358;" + ui.values[0] + " - &#8358;" + ui.values[1]);
				}
			});
			$("#amount").val("&#8358;" + $("#slider-range").slider("values", 0) + " - &#8358;" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="{{ asset('public/template/js/jquery.flexisel.js') }}"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<!-- <script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script> -->
	<!-- //password-script -->

	<!-- smoothscroll -->
	<script src="{{ asset('public/template/js/SmoothScroll.min.js') }}"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{ asset('public/template/js/move-top.js') }}"></script>
	<script src="{{ asset('public/template/js/easing.js') }}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- imagezoom -->
	<script src="{{ asset('public/template/js/imagezoom.js') }}"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
	<script src="{{ asset('public/template/js/jquery.flexslider.js') }}"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- for bootstrap working -->
	<!-- <script src="{{ asset('public/template/js/bootstrap.js') }}"></script> -->
	<!-- //for bootstrap working -->
	<!-- //js-files -->
</body>
</html>

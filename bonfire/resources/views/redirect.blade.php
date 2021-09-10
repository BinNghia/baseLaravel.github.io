<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BONFIRE</title>
	<base href="{{asset('')}}" >
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,700;1,600&family=Fira+Sans:wght@400;700&display=swap" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/styleSource.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>
	<div class="cover"></div>
	<div class="wrapper">
		
		<div class="header-top">
		<div class="container-fluid" style="background: #d5c4b2;">
			<div class="header-top-inner">
				<!-- Logo -->
				<div class="header-top-left">
					<a href="trangchu"><img src="assets/img/logo.jpg" alt=""></a>
				</div>
				<!-- End Logo -->
				<!-- Icon -->
				<div class="header-top-right">
					@if(!isset($nguoidung))
						<div class="log">
							<li>
	                            <a href="signup">SignUp | </a>
	                        </li>
	                        <li>
	                            <a href="login">Login</a>
	                        </li>
						</div>
					@else
						<div class="cart">
							<div class="cart-wrap">
								<span class="cart-notice">@if(Session::has('cart')){{Session('cart')->totalQty}} @else 0 @endif</span>
								<ion-icon name="cart-outline"></ion-icon>
							</div>
							@if(Session::has('cart'))
							<div class="cart-body">
								@foreach($product_cart as $product)
									<div class="cart-item">
										<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
										<div class="media">
											<a class="pull-left" href="#"><img src="assets/img/{{$product['item']['image']}}" alt=""></a>
											<div class="media-body">
												<span class="cart-item-title">{{$product['item']['name']}}</span>
												<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
												<span class="cart-item-amount">{{$product['qty']}}*<span>@if($product['item']['promotion_price']==0)${{number_format($product['item']['unit_price'])}}.00 @else ${{number_format($product['item']['promotion_price'])}}.00
												@endif</span></span>
											</div>
										</div>
									</div>
								@endforeach
								<div class="cart-caption">
									<div class="cart-total">Tổng tiền: <span class="cart-total-value">${{Session('cart')->totalPrice}}.00</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="checkout" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							@endif
						</div>
					@endif
		            <nav>
                        <div class="nav-icon"><i class="fas fa-bars fa-2x"></i></div>
                        <ul class="navbar">
                        	@if(!isset($nguoidung))
	                            <li class="nav-item"><a href="trangchu">Home</a></li>
	                            <li class="nav-item"><a href="about">About</a></li>
	                            <li class="nav-item"><a href="services">Services</a></li>
	                            <li class="nav-item"><a href="blog">Blog</a></li>
	                            <li class="nav-item"><a href="https://www.arrowhitech.com/">Page</a></li>
	                            <li class="nav-item"><a href="#">Contact</a></li>
                            @else
                            	<li class="nav-item"><a href="trangchu">Home</a></li>
	                            <li class="nav-item"><a href="about">About</a></li>
	                            <li class="nav-item"><a href="services">Services</a></li>
	                            <li class="nav-item"><a href="blog">Blog</a></li>
	                            <li class="nav-item"><a href="https://www.arrowhitech.com/">Page</a></li>
	                            <li class="nav-item"><a href="contact">Contact</a></li>
                            	<li class="nav-item"><a href="logout">Logout</a></li>
                            @endif
                        </ul>
                    </nav>
				</div>
				<!-- End Icon -->
			</div>
		</div>
	</div>

	    @yield('content')

	    @include('footer')
		
	</div>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script>
		$('.image-item').slick({
			prevArrow:"<img class='a-left control-c prev slick-prev' src='assets/img/prev.jpg'>",
    		nextArrow:"<img class='a-right control-c next slick-next' src='assets/img/next.png'>"
		});
	</script>

	<!-- include js files -->
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<script src="source/assets/dest/js/custom2.js"></script>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
	  	paypal.Button.render({
		    env: 'sandbox',
		    client: {
		      sandbox: 'AQX9Gdg-MqK8mHWyfZKNbNRAjuInAaLWphXcWl9w8Ut7yU3FyIQki9A2J1rm_jouJItEhe73uTuHSLQ9',
		      production: 'demo_production_client_id'
		    },
		    // Customize button (optional)
		    locale: 'en_US',
		    style: {
		      	size: 'small',
		      	color: 'gold',
		      	shape: 'pill',
		    },

	    	commit: true,

		    payment: function(data, actions) {
		      return actions.payment.create({
		        transactions: [{
		          amount: {
		            total: '0.01',
		            currency: 'USD'
		          }
		        }]
		      });
		    },
		    onAuthorize: function(data, actions) {
			    return actions.payment.execute().then(function() {
			        window.alert('Thank you very much!');
			    });
		    }
		}, '#paypal-button');

	</script>

	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
	<script>
		$(document).ready(function(){
			$('.nav-icon').on('click', function(e) {
				e.preventDefault();
				$('.navbar').addClass('active');
				$('.cover').addClass('active');
			});
			$('.cart-wrap').on('click', function(e) {
				e.preventDefault();
				$('.cart-body').addClass('active');
				$('.cover').addClass('active');
			});
			$('.cover').on('click', function(e) {
				e.preventDefault();
		        $('.navbar').removeClass('active');
		        $('.cart-body').removeClass('active');
		        $('.cover').removeClass('active');
		    });
		});
	</script>

	<script>
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked"))
                {
                    $(".password").removeAttr('disabled');
                }
                else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
</body>
</html>
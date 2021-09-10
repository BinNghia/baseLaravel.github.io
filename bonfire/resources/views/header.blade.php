<!-- Header -->
<div class="header">
	<!-- Header Top -->
	<div class="header-top">
		<div class="container-fluid">
			<div class="header-top-inner">
				<!-- Logo -->
				<div class="header-top-left">
					<a href="trangchu"><img src="assets/img/logo.jpg" alt="" class="logo_header"></a>
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
	                            <li class="nav-item"><a href="#">Contact</a></li>
                            	<li class="nav-item"><a href="edit">Edit Account</a></li>
                            	<li class="nav-item"><a href="logout">Logout</a></li>
                            @endif
                        </ul>
                    </nav>
				</div>
				<!-- End Icon -->
			</div>
		</div>
	</div>
	<!-- End Header Top -->
	<!-- Header Down -->
	<div class="header-down">
		<!-- Down-Left -->
		<div class="header-down-left">
			<div class="text1_header"><p>Spring 2017</p></div>
    		<div class="text2_header"><p>IT’S YOUR<br>SHINE TIME</p></div>
    		<a href="product" class="text3_header">DISCOVER NOW</a>
		</div>
		<!-- End Down Left -->
		<!-- Down Right -->
		<div class="header-down-right">
			<div class="down-right">
				<ul>
    				<li><a href="https://www.facebook.com/arrowhitech">Facebook</a></li>
    				<li><a href="https://www.facebook.com/arrowhitech">Twitter</a></li>
    				<li><a href="https://www.facebook.com/arrowhitech">Instagram</a></li>
    				<li><a href="https://www.facebook.com/arrowhitech">Youtube</a></li>
    			</ul>
			</div>
			<div class="down-right-responsive">
				<ul>
    				<li><a href="https://www.facebook.com/arrowhitech">Facebook</a></li>
    				<li><a href="https://www.facebook.com/arrowhitech">Twitter</a></li>
    				<li><a href="https://www.facebook.com/arrowhitech">Instagram</a></li>
    				<li><a href="https://www.facebook.com/arrowhitech">Youtube</a></li>
    			</ul>
			</div>
		</div>
		<!-- End Down Right -->
	</div>
	<!-- End Header Down -->
</div>
<!-- End Header -->
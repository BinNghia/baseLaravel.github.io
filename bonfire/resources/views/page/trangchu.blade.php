@extends('index')

@section('content')
<div class="main">
	<!-- Breadcrumb -->
	<div class="breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col1">
					<div class="title">Free shipping</div>
					<div class="detail">All order over $300</div>
				</div>
				<div class="col2">
					<div class="title">Support customer</div>
					<div class="detail">Support 24/7</div>
				</div>
				<div class="col3">
					<div class="title">Secure payments</div>
					<div class="detail">Support 24/7</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb -->
	<!-- Slogan -->
	<div class="slogan">
		<div class="container">
			<div class="slogan-inner">
				<p>It started with a simple idea: Create quality, well-designed <br>products that I wanted myself.</p>
			</div>
		</div>
	</div>
	<!-- Slogan -->
	<!-- Product -->
	<div class="product">
		<div class="container-fluid">
			<div class="row">
				<div class="col1">
					<div class="product-inner">
						<img src="./assets/img/anh1.jpg" alt="">
						<div class="content1">
							<div class="text1">
								<p>Gold Leaf Ring</p>
							</div>
							<div class="text2">
								<p>$179.00</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col2">
					<div class="product-inner">
						<img src="./assets/img/anh2.jpg" alt="">
						<div class="content2">
							<div class="text1">
	            				<p>sale up to</p>
	            			</div>
	            			<div class="text2">
	            				<p>70%</p>
	            			</div>
	            			<div class="text3">
	            				<p>Select Gold Clearance</p>
	            			</div>
	            			<div class="text4">
	            				<a href="product">SHOP NOW</a>
	            			</div>
						</div>
					</div>
				</div>
				<div class="col1">
					<div class="product-inner">
						<img src="./assets/img/anh3.jpg" alt="">
						<div class="content3">
							<div class="text1">
	            				<p>NEW COLLECTION</p>
	            			</div>
	            			<div class="text2">
	            				<p>Leaf &nbsp;Ring</p>
	            			</div>
						</div>
					</div>
				</div>
				<div class="col1">
					<div class="product-inner">
						<img src="./assets/img/anh4.jpg" alt="">
					</div>
				</div>
				<div class="col1">
					<div class="product-inner">
						<img src="./assets/img/anh5.jpg" alt="">
						<div class="content4">
							<div class="text1">
	            				<p>Rose Gold Necklaces</p>
	            			</div>
	            			<div class="text2">
	            				<p>$179.00</p>
	            			</div>
						</div>
					</div>
				</div>
				<div class="col2">
					<div class="product-inner">
						<img src="./assets/img/anh6.jpg" alt="">
						<div class="content5">
							<div class="text1">
	            				<p>Princess Ring<br>Rose Gold</p>
	            			</div>
	            			<div class="text2">
	            				<p>Rose gold plated over brass<br>* One size</p>
	            			</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Product -->
	<!-- Item -->
	<div class="item">
		<div class="feature">
			<div class="container">
				<div class="feature-inner">
					<div class="feature-left">
						<p>Featured items</p>
					</div>
					<div class="feature-right">
						<p>VIEW MORE</p>
                    	<a href="product"><img src="./assets/img/icon.jpg" alt=""></a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				@foreach($products as $pr)
					<div class="col">
						<div class="item-inner">
							<div class="image">
								<div class="image-item">
										<img src="././assets/img/{{$pr->image}}" alt="">
									<!-- @foreach($products as $prd)
			                        	<img src="././assets/img/{{$prd->image}}" alt="">
			                        @endforeach -->
			                    </div>
			                    @if(!isset($nguoidung))
			                    	<div class="bought">
				                    	<div class="text">
				                    		<a href="login">Add to cart</a>
				                    	</div>
				                    	<div class="icon">
				                    		<a href="login"><ion-icon name="heart-outline"></ion-icon></a>
				                    	</div>
				                    	<div class="icon">
				                    		<a href="login"><ion-icon name="cellular-outline"></ion-icon></a>
				                    	</div>
				                    	<div class="icon">
				                    		<a href="login" class="search-icon"><ion-icon name="search-outline"></ion-icon></a>
				                    	</div>
				                    </div>
			                    @else
			                        <div class="bought">
				                    	<div class="text">
				                    		<a href="{{route('themgiohang',$pr->id)}}">Add to cart</a>
				                    	</div>
				                    	<div class="icon">
				                    		<a href="#"><ion-icon name="heart-outline"></ion-icon></a>
				                    	</div>
				                    	<div class="icon">
				                    		<a href="#"><ion-icon name="cellular-outline"></ion-icon></a>
				                    	</div>
				                    	<div class="icon">
				                    		<a href="search" class="search-icon"><ion-icon name="search-outline"></ion-icon></a>
				                    	</div>
				                    </div>
			                    @endif
		                    </div>
		                    <form action="search" method="post" class="navbar-form navbar-left" role="search">
			                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
			                    <input type="search" name="keyword" id="keyword" class="searchbar" placeholder="SEARCH...">
			                </form>
		                    <div class="intro">
		                    	<div class="name">
		                            <p>{{$pr->name}}</p>
		                        </div>
		                        <div class="price">
		                        	@if($pr->promotion_price==0)
										<p>${{$pr->unit_price}}.00</p>
									@else
										<p>${{$pr->promotion_price}}.00</p>
									@endif
		                        </div>
		                    </div>
		                </div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- End Item -->
	<!-- Blog -->
	<div class="blog">
		<div class="blog-inner">
			<div class="container">
				<p>Blog update</p>
			</div>
		</div>
		<div class="container">
			<div class="row">
				@foreach($blogs as $bl)
				<div class="col">
					<div class="blog-single">
						<div class="image">
							<img src="./assets/img/{{$bl->urlHinh}}" alt="">
						</div>
						<div class="blog-content">
							<div class="content">
								<span>July 14th, 2016</span>
								<p>{{$bl->description}}</p>
							</div>
							<div class="content-desktop">
								<span>July 14th, 2016</span>
								<p>{{$bl->description}}</p>
							</div>
							<div class="count">
								<div class="view">
									<a href="#"><ion-icon name="eye-outline"></ion-icon>&nbsp;&nbsp;&nbsp;{{$bl->views}} Views</a>
								</div>
								<div class="like">
									<a href="#"><ion-icon name="share-social-outline"></ion-icon>&nbsp;&nbsp;&nbsp;{{$bl->likes}} Likes</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="blog-down">
			<div class="container">
				<a href="blog">
                    <img src="./assets/img/btn.jpg" alt="">
                </a>
			</div>
		</div>
	</div>
	<!-- End Blog -->
	<!-- Brand -->
	<div class="brand">
		<div class="container">
			<div class="row">
				@foreach($brands as $br)
				<div class="col">
					<div class="image">
						<a href="#"><img src="./assets/img/{{$br->urlHinh}}" alt="" class="brand1"></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- End Brand -->
</div>
@endsection
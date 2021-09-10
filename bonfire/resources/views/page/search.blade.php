@extends('redirect')

@section('content')

<div class="inner-header" style="transform: translateY(150px);">
	<div class="container">
		<?php
            function makeColor($str, $keyword){
                return str_replace($keyword,"<span style='color:red;'>$keyword</span>",$str);
            }
        ?>
		<div class="pull-left">
			<h6 class="inner-title">Search for: {{$keyword}}</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<span>Found {{count($products)}} products</span> / <a href="trangchu">Home</a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="main" style="transform: translateY(130px); margin-bottom: 150px;">
	<div class="item">
		<div class="container">
			<div class="row">
				@foreach($products as $pr)
					<div class="col">
						<div class="item-inner">
							<div class="image">
								<div class="image-item">
			                        <img src="././assets/img/{{$pr->image}}" alt="">
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
				                    		<a href="#" class="search-icon"><ion-icon name="search-outline"></ion-icon></a>
				                    	</div>
				                    </div>
			                    @endif
		                    </div>
		                    <input type="search" name="searchphrase" id="searchphrase" class="searchbar" placeholder="SEARCH...">
		                    <div class="intro">
		                    	<div class="name">
                            		<p>{!! makeColor($pr->name, $keyword) !!}</p>
		                        </div>
		                        <div class="price">
		                        	@if($pr->promotion_price==0)
										<p>${!! makeColor($pr->unit_price, $keyword) !!}.00</p>
									@else
										<p>${!! makeColor($pr->promotion_price, $keyword) !!}.00</p>
									@endif
		                        </div>
		                    </div>
		                </div>
					</div>
				@endforeach
			</div>
			<div>
				{{$products->links()}}
			</div>
		</div>
	</div>
</div>
@endsection
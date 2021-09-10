@extends('index')

@section('content')
<div class="main">
	<div class="item">
		<div class="feature">
			<div class="container">
				<div class="feature-inner">
					<div class="feature-left">
						<p>Featured items</p>
					</div>
					<div class="feature-right">
						<p style="color: #c7a979;">Found {{count($products)}} products</p>
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
									@for($pr->id=1;$pr->id<9;$pr->id++)
			                        	<img src="././assets/img/{{$pr->image}}" alt="">
			                        @endfor
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
			<div>
				{{$products->links()}}
			</div>
		</div>
	</div>
</div>
@endsection
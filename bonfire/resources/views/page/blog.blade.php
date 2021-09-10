@extends('redirect')

@section('content')

<div class="inner-header" style="transform: translateY(150px);">
</div>

<div class="main" style="transform: translateY(150px); margin-bottom: 150px;">
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
	</div>
</div>

@endsection
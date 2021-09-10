@extends('redirect')

@section('content')
<div class="inner-header" style="transform: translateY(150px);">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng nhập</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="trangchu">Home</a> / <span>Đăng nhập</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	
<div class="container" style="transform: translateY(150px); margin-bottom: 150px;">
	<div id="content">
		@if(session('thongbao'))
	  		<div class="alert alert-danger">
	  			{{session('thongbao')}}
  			</div>
  		@endif

		<form action="login" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<!-- <h4>Đăng nhập</h4> -->
					<div class="space20">&nbsp;</div>

					
					<div class="form-block">
						<label for="name">Username*</label>
						<input type="text" placeholder="username" name="name" autofocus>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
					</div>
					<div class="form-block">
						<label for="password">Password*</label>
						<input placeholder="Password" name="password" type="password" value="">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif
					</div>
					<div class="form-block">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->
@endsection
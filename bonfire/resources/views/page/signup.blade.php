@extends('redirect')

@section('content')

<div class="inner-header" style="transform: translateY(150px);">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng kí</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="trangchu">Home</a> / <span>Đăng kí</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	
<div class="container" style="transform: translateY(130px); margin-bottom: 150px;">
	<div id="content">
		<!-- @if(count($errors) > 0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
        @endif -->

        @if(session('thongbao'))
            <div class="alert alert-success">{{session('thongbao')}}</div>
    	@endif

		<form action="signup" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<!-- <h4>Đăng kí</h4> -->
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="your_last_name">Fullname*</label>
						<input type="text" id="full_name" name="full_name" required>
					</div>

					<div class="form-block">
						<label for="name">Username*</label>
						<input type="text" id="name" name="name" placeholder="Username" value="{{old('name')}}">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="address">Address*</label>
						<input type="text" id="address" name="address" placeholder="Street Address" required>
					</div>
					
					<div class="form-block">
						<label for="phone_number">Phone*</label>
						<input type="text" id="phone_number" name="phone_number" required>
					</div>

					<div class="form-block">
                        <label>Date of Birth*</label>
                        <input name="birth" placeholder="Ngày sinh" type="date" required>
                    </div>

                    <div class="form-block">
                        <label>Gender*</label>
                        <input type="radio" class="input-radio" id="gender" name="gender" value="0" checked style="width: 10%;"><span style="margin-right: 10%;">Nam</span>
						<input type="radio" class="input-radio" id="gender" name="gender" value="1" style="width: 10%;"><span>Nữ</span>
                    </div>

                    <!-- <div class="form-block">
                        <label>Quyền người dùng*</label>
                        <input type="radio" class="input-radio" id="idGroup" name="idGroup" checked="" value="0" readonly style="width: 10%;"><span style="margin-right: 10%;">Người dùng</span>
                    </div> -->

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" placeholder="example@gmail.com" value="{{old('email')}}" >
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="password">Password*</label>
						<input type="password" id="password" name="password" required>
					</div>

					<div class="form-block">
						<label>Re password*</label>
						<input type="Password" name="passwordAgain" placeholder="Nhập lại mật khẩu" required>
						@if ($errors->has('passwordAgain'))
                            <div class="alert alert-danger">{{ $errors->first('passwordAgain') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="note">Note*</label>
						<input type="text" id="note" name="note" required>
					</div>

					<div class="form-block">
						<button type="submit" class="btn btn-primary">Register</button>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</form>
	</div> <!-- #content -->
</div> <!-- .container -->

@endsection
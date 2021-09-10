@extends('redirect')

@section('content')

<div class="inner-header" style="transform: translateY(150px);">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Edit</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="trangchu">Home</a> / <span>Edit</span>
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

		<form action="edit" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<!-- <h4>Đăng kí</h4> -->
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label>Fullname</label>
                        <input class="form-control" name="full_name" placeholder="Nhập tên người dùng" value="{{$nguoidung->full_name}}" />
					</div>

					<div class="form-block">
						<label>Username</label>
                        <input class="form-control" name="name" placeholder="Username" value="{{$nguoidung->name}}"/>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="address">Address*</label>
						<input type="text" id="address" name="address" value="{{$nguoidung->address}}">
					</div>
					
					<div class="form-block">
						<label for="phone_number">Phone*</label>
						<input type="text" id="phone_number" name="phone_number" value="{{$nguoidung->phone_number}}">
					</div>

					<div class="form-block">
                        <label>Date of Birth*</label>
                        <input name="birth" placeholder="Ngày sinh" type="date" value="{{$nguoidung->birth}}">
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
						<label>Email</label>
                        <input class="form-control" name="email" placeholder="Nhập địa chỉ email" readonly="" value="{{$nguoidung->email}}" />
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                        @endif
					</div>

					<input type="checkbox" id="changePassword" name="changePassword" style="display: block;">
					<div class="form-block">
                        <label>Password</label>
                        <input class="form-control password" type="password" name="password" placeholder="Nhập mật khẩu" disabled />
					</div>

					<div class="form-block">
						<label>Re password*</label>
                        <input class="form-control password" type="password" name="passwordAgain" placeholder="Nhập lại mật khẩu" disabled />
						@if ($errors->has('passwordAgain'))
                            <div class="alert alert-danger">{{ $errors->first('passwordAgain') }}</div>
                        @endif
					</div>

					<div class="form-block">
						<label for="note">Note*</label>
						<input type="text" id="note" name="note">
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
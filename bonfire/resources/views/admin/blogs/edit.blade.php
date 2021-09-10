@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blogs
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:120px">
                {{-- Hiện thông báo lỗi --}}
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
                @endif

                {{-- Hiện thông báo thành công --}}
                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                @if(session('loi'))
                    <div class="alert alert-danger">{{session('loi')}}</div>
                @endif
                {{-- Thêm encript để gửi file --}}
                <form action="admin/blogs/edit/{{$blogs->id}}" method="POST" enctype="multipart/form-data">
                    {{-- Thêm token để gửi tới server --}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    
                    <div class="form-group">
                        <label>Image</label><br>
                        <img width="370px" src="assets/img/{{$blogs->urlHinh}}"/> <br>
                        <br>
                        <input type="file" name="urlHinh" id="uploadImage">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" placeholder="Điền thứ tự thể loại " value="{{$blogs->description}}" />
                    </div>

                    <div class="form-group">
                        <label>Views</label>
                        <input class="form-control" name="unit_price" placeholder="Ẩn hiện thể loại " value="{{$blogs->views}}" />
                    </div>

                    <div class="form-group">
                        <label>Likes</label>
                        <input class="form-control" name="promotion_price" placeholder="Trạng thái" value="{{$blogs->likes}}" />
                    </div>

                    <button type="submit" class="btn btn-default">Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper --> 
@endsection
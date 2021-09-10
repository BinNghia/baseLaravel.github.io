 @extends('admin.layout.index')
 @section('content')
    <!-- Page Content -->
 <div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blog
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
                @endif

                @if(session('thongbao'))
                    <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                <form action="admin/blogs/add" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                     <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="urlHinh">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" placeholder="Điền thứ tự thể loại " />
                    </div>

                    <div class="form-group">
                        <label>Views</label>
                        <input class="form-control" name="views" placeholder="Ẩn hiện thể loại " />
                    </div>

                    <div class="form-group">
                        <label>Likes</label>
                        <input class="form-control" name="likes" placeholder="Trạng thái" />
                    </div>

                    <button type="submit" class="btn btn-default">Add</button>
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
 
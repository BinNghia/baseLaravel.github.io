@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blogs
                    <small>List</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Image</th>
                        <td>Description</td>
                        <th>Views</th>
                        <th>Likes</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($blogs as $blog)
                        <tr class="odd gradeX" align="center">
                            <td>{{$blog->id}}</td>
                            <td><img width="80px" src="assets/img/{{$blog->urlHinh}}" alt="{{$blog->urlHinh}}"></td>
                            <td>{{$blog->description}}</td>
                            <td>{{$blog->views}}</td>
                            <td>{{$blog->likes}}</td>
                            <td>{{$blog->created_at}}</td>
                            <td>{{$blog->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/blogs/delete/{{$blog->id}}" onclick="return confirm('Are you sure?')"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/blogs/edit/{{$blog->id}}">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection
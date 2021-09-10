@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Brands
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
                        <td>Website</td>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($brands as $brand)
                        <tr class="odd gradeX" align="center">
                            <td>{{$brand->id}}</td>
                            <td><img width="80px" src="assets/img/{{$brand->urlHinh}}" alt="{{$brand->urlHinh}}"></td>
                            <td>{{$brand->Url}}</td>
                            <td>{{$brand->created_at}}</td>
                            <td>{{$brand->updated_at}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/brands/delete/{{$brand->id}}" onclick="return confirm('Are you sure?')"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/brands/edit/{{$brand->id}}">Edit</a></td>
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
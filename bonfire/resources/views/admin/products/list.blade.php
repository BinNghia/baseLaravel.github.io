@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products
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
                        <th>Name</th>
                        <td>Description</td>
                        <th>Unit Price</th>
                        <th>Promotion Price</th>
                        <th>Image</th>
                        <th>New Product</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $pr)
                        <tr class="odd gradeX" align="center">
                            <td>{{$pr->id}}</td>
                            <td>{{$pr->name}}</td>
                            <td>{{$pr->description}}</td>
                            <td>{{$pr->unit_price}}</td>
                            <td>{{$pr->promotion_price}}</td>
                            <td><img width="80px" src="assets/img/{{$pr->image}}" alt="{{$pr->image}}"></td>
                            <td>{{$pr->new}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/products/delete/{{$pr->id}}" onclick="return confirm('Are you sure?')"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/products/edit/{{$pr->id}}">Edit</a></td>
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
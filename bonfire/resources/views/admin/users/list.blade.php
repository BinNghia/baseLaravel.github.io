@extends('admin.layout.index')
@section('content')

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách
                    <small>User</small>
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
                        <th>Full name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>ID Group</th>
                        <th>Note</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr class="odd gradeX" align="center">
                        <td>{{$user->id}}</td>
                        <td>{{$user->full_name}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->birth}}</td>
                        <td>
                            @if ($user->gender == 1)
                                {{"Nữ"}}
                            @else
                                {{"Nam"}} 
                            @endif 
                        </td>
                        <td>
                            @if ($user->idGroup == 1)
                                {{"Admin"}}
                            @else
                                {{"Customer"}} 
                            @endif 
                        </td>
                        <td>{{$user->note}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/users/delete/{{$user->id}}" onclick="return confirm('Are you sure?')">Delete</a></td>
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
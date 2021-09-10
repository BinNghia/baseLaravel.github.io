@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill
                    <small>List</small>
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
               
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>ID Customer</th>
                        <th>Date order</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Created at</th>
                        <th>Update at</th>
                        <th>Bill Detail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($bills as $bill)
                    <tr class="odd gradeX" align="center">
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->users->id}}</td>
                        <td>{{$bill->date_order}}</td>
                        <td>{{$bill->total}}</td>
                        <td>{{$bill->payment}}</td>
                        <td>{{$bill->created_at}}</td>
                        <td>{{$bill->updated_at}}</td>
                        <td class="center"><a href="admin/bills/bill_detail/{{$bill->id}}"> Detail</a></td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
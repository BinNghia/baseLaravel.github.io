@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Bill Detail
                </h1>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
            @endif
            <form action="admin/bills/bill_detail/{{$bills->id}}" method="POST" enctype="multipart/form-data">
                {{-- Thêm token để gửi tới server --}}
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <!-- <th>ID Bill</th> -->
                            <th>ID Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th>Created at</th>
                            <th>Update at</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($bills->bill_detail as $bt)
                        <tr class="odd gradeX" align="center">
                            <td>{{$bt->id}}</td>
                            <!-- <td>{{$bt->bills->id}}</td> -->
                            <td>{{$bt->products->id}}</td>
                            <td><img width="80px" src="assets/img/{{$bt->products->image}}" alt="{{$bt->products->image}}"></td>
                            <td>{{$bt->quantity}}</td>
                            <td>{{$bt->unit_price}}</td>
                            <td>{{$bt->created_at}}</td>
                            <td>{{$bt->updated_at}}</td>
                        </tr>
                        @endforeach
                       
                        
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
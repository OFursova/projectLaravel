@extends('admin.layouts.main')

@section('content')
<div class="container d-flex justify-content-between align-items-center">
    <h1>Orders</h1>
    {{-- <a href="/admin/category/create" class="btn btn-primary">Add Category</a> --}}
</div>

    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Client Info</th>
                <th>Items</th>
                <th>Order Status</th>
                <th>Total Sum</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>
                    <p>{{$order->name}}</p>
                    <p>{{$order->phone}}</p>
                    <p>{{$order->adress}}</p>
                </td>
                <td>
                @foreach ($order->orderItems as $item)
                <img src="{{asset($item->product_img)}}" style="width: 80px; float:left;" alt="{{$item->product_name}}"></>
                    <p>Product: {{$item->product_name}}</p>
                    <p>Price: {{$item->product_price}}</p>
                    <p>Quantity: {{$item->product_qty}}</p>
                <hr>
                @endforeach
                </td>
                <td>{{$order->status->name}}</td>
                <td>{{$order->totalSum}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('js')
    <script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
    </script>
@endsection
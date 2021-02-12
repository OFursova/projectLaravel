@extends('admin.layouts.main')

@section('content')
    <h1>Products</h1>
    <a href="/admin/product/create" class="btn btn-primary">Add Product</a>

    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset($item->img)}}" style="width: 70px;" alt="{{$item->name}}"></td>
                <td>{{$item->name}}</td>
                <td><a href="/admin/product/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                {!! Form::open(['url' => '/admin/product/'.$item->id, 'method' => 'delete']) !!}
                    <button class="btn btn-danger">Delete</button>
                {!! Form::close() !!}
            </td>
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
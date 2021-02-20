@extends('admin.layouts.main')

@section('content')
    <div class="container d-flex justify-content-between align-items-center">
    <h1>Products</h1>
    <a href="/admin/product/create" class="btn btn-primary">Add Product</a>
    </div>

    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Sale</th>
                <th>Category</th>
                <th><i class="fas fa-registered"></i></th>
                <th><i class="fas fa-pencil-alt"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset($item->img)}}" style="width: 70px;" alt="{{$item->name}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->action_price}}</td>
                <td>{{$item->category->name}}</td>
                <td>@if ($item->recommended)
                    <i class="fas fa-check-circle"></i>
                @endif </td>
                <td><a href="/admin/product/{{$item->id}}/edit" class="btn btn-warning my-1">Edit</a>
                {!! Form::open(['url' => '/admin/product/'.$item->id, 'method' => 'delete']) !!}
                    <button class="btn btn-danger my-1">Delete</button>
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
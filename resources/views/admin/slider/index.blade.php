@extends('admin.layouts.main')

@section('content')
<div class="container d-flex justify-content-between align-items-center">
    <h1>Welcome Page Slider</h1>
    <a href="/admin/slider/create" class="btn btn-primary my-2">Add Slider</a>
</div>

    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Button</th>
                <th>Url</th>
                <th><i class="fas fa-pencil-alt"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slider as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{asset($item->img)}}" style="width: 70px;" alt="{{$item->name}}"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->button_text}}</td>
                <td>{{$item->button_url}}</td>
                <td><a href="/admin/slider/{{$item->id}}/edit" class="btn btn-warning my-1">Edit</a>
                {!! Form::open(['url' => '/admin/slider/'.$item->id, 'method' => 'delete']) !!}
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
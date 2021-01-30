@extends('layouts.main')

@section('content')
    <h1>{{$category->name}}</h1>
   
    <div class="thumbs d-flex flex-wrap justify-content-between">
        @foreach ($products as $product)
        @include('store.parts._product')
        @endforeach
    </div>
    {{$products->links()}}
@endsection
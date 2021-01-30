@extends('layouts.main')

@section('content')
    <h1>{{$title}} {!!$subtitle!!}</h1>
    {{-- @foreach ($categories as $category)
    <p>{{$category->name}}</p>
    @endforeach
    @foreach ($products as $product)
    <p>{{$loop->iteration}}. {{$product}}</p>
    @endforeach --}}
    <div class="thumbs d-flex flex-wrap justify-content-between">
        @foreach ($products as $product)
        @include('store.parts._product')
        @endforeach
    </div>
    
@endsection



@section('title', $title)

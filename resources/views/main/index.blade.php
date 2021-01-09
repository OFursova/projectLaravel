@extends('layouts.main')

@section('content')
    <h1>{{$title}} {!!$subtitle!!}</h1>
    @foreach ($categories as $category)
    <p>{{$category->name}}</p>
    @endforeach
    @foreach ($products as $product)
    <p>{{$loop->iteration}}. {{$product}}</p>
    @endforeach
@endsection



@section('title', $title)

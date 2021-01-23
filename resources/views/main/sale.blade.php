@extends('layouts.main')

@section('content')
    <h1 class="text-center text-danger">{{$title}}</h1>
    {{-- Showing error messages in a div on top: --}}
    @include('messages.errors')

    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    
    <div class="thumbs d-flex flex-wrap justify-content-between">
        @foreach ($products as $product)
        <div class="product-tile m-2 p-2 w-25 min-vh-30 max-vh-50 border border-secondary rounded d-flex flex-column justify-content-around">
            <h3>{{$product->name}}</h3>
            <img src="{{$product->img}}" alt="{{$product->name}}" class="w-75 align-self-center">
            <p class="text-dark text-justify">{{$product->description}}</p>
            <p class="text-center text-danger"><del>{{$product->price}}</del></p>
            <p class="text-center text-success">{{$product->action_price}}</p>
            <form action="/sale" method="post" class="align-self-center w-75">
            @csrf
            <button class="btn btn-success m-2 w-100">BUY</button>
            </form>
        </div>
        @endforeach
    </div>
    {{$products->links()}}
@endsection

@section('title', $title)
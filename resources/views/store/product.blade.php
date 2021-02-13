@extends('layouts.main')

@section('content')
<div class="product-tile m-2 p-2 w-100 min-vh-10 max-vh-50 border border-secondary rounded d-flex flex-column justify-content-around">
    <h3><a href="/product/{{$product->slug}}">{{$product->name}}</a></h3>
    <h4>Category: <a href="/category/{{$product->category->slug}}">{{$product->category->name}}</a></h4>
    <img src="{{$product->img}}" alt="{{$product->name}}" class="w-50 align-self-center">
    <p class="text-dark text-justify">{{$product->description}}</p>
    <p class="text-center text-danger"><del>{{$product->price}}</del></p>
    <p class="text-center text-success">{{$product->action_price}}</p>
    <form action="/cart/add" method="post" class="align-self-center w-75 form-add-to-cart">
    {{-- @csrf --}}
    <div class="form-group">
        <input type="number" name="qty" id="" class="form-control" value="1">
    </div>
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button class="btn btn-success m-1 w-100">BUY</button>
    </form>
</div>
<h2>Leave your review:</h2>
@include('store.parts._reviews')
@endsection

@section('title', $title)
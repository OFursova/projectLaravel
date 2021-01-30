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
        @include('store.parts._product')
        @endforeach
    </div>
    {{$products->links()}}
@endsection

@section('title', $title)
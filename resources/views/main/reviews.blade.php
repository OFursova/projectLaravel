@extends('layouts.main')

@section('content')
    <h1 class="text-center text-primary">{{$title}}</h1>
    {{-- Showing error messages in a div on top: --}}
    @include('messages.errors')

    @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    
    <form action="/review" method="post">
        @csrf
        <div class="form-group">
            <label for="name">User name:</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name')}}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="review">Review:</label>
            <textarea class="form-control @error('review') is-invalid @enderror" name="review" id="review">{{old('review')}}</textarea>
            @error('review')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <button class="btn btn-primary my-2">Send</button>
    </form>
@endsection

@section('title', $title)
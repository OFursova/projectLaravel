@extends('layouts.main')

@section('content')
    <h1 class="text-center text-primary">{{$title}}</h1>
   @include('store.parts._reviews')
@endsection

@section('title', $title)
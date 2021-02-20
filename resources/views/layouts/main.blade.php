<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{-- <link rel="stylesheet" href="../../../node_modules/@splidejs/splide/dist/css/themes/splide.min.css"> --}}
    <link rel="stylesheet" href="{{asset('css/splide.min.css')}}">
    @yield('css')
</head>
<body>
    @include('layouts.menu')
    <header>    
    @if (url()->current() == 'http://lara')
    @include('layouts.slider')
    @endif
    </header>
    
    <section class="container">
        <div class="row my-2">
            <div class="col-md-3 w-100">
                @section('sidebar')
                @include('store.parts._list-categories')
                @show
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </section>

    <footer></footer>

    <!-- Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            @include('store.parts._cart')
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary clear-cart">Clear Cart</button>
            <a href="/checkout" class="btn btn-success">Checkout</a>
            </div>
        </div>
        </div>
    </div>

    {{-- <script src="../../../node_modules/@splidejs/splide/dist/js/splide.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    @if (url()->current() == 'http://lara')
    <script>
        document.addEventListener( 'DOMContentLoaded', function () {
            // new Splide( '.splide' ).mount();

            var splide = new Splide( '#image-slider', {
                'cover'      : true,
                'heightRatio': 0.5,
            } );
            splide.on( 'autoplay:playing', function ( rate ) {
            console.log( rate ); // 0-1
            } );
            splide.mount();
        } );
        
    </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
    @yield('js')
</body>
</html>
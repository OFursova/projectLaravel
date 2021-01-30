<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('css')
</head>
<body>
    @include('layouts.menu')
    <header>Header</header>

    <section class="container">
        <div class="row">
            <div class="col-md-3 w-100">
                @section('sidebar')
                @include('store.parts._list-categories')
                @show
            </div>
            <div class="col-md-9">@yield('content')</div>
        </div>
    </section>

    <footer>Footer</footer>

    
    <script src="{{asset('js/app.js')}}"></script>
    @yield('js')
</body>
</html>
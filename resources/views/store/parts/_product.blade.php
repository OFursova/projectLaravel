<div class="product-tile m-2 p-2 w-30 min-vh-20 max-vh-50 border border-secondary rounded d-flex flex-column justify-content-around">
            <h3><a href="/product/{{$product->slug}}">{{$product->name}}</a></h3>
            <h4>Category: <a href="/category/{{$product->category->slug}}">{{$product->category->name}}</a></h4>
            <img src="{{$product->img}}" alt="{{$product->name}}" class="w-75 align-self-center">
            <p class="text-dark text-justify">{{$product->description}}</p>
            <p class="text-center text-danger"><del>{{$product->price}}</del></p>
            <p class="text-center text-success">{{$product->action_price}}</p>
            <form action="/sale" method="post" class="align-self-center w-75">
            @csrf
            <button class="btn btn-success m-1 w-100">BUY</button>
            </form>
            @if (!\Request::is('product/*'))
            <p>Reviews:
            <?php $q = 0; ?>
            @foreach ($reviews as $review)
            @if ($product->id == $review->product_id)
            {{-- <p>{{$review->review}}</p> --}}
            <?php $q++; ?>
            @endif
            @endforeach
            <a href="/product/{{$product->slug}}">{{$q}}</a></p>
        @endif
</div>
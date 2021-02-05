{{-- Showing error messages in a div on top: --}}
@include('messages.errors')

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

@auth
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
    @if (\Request::is('product/*'))
    <input type="hidden" name="product_id" value="{{$product->id}}">
    @else
    <div class="form-group">
        <label for="product">Product #:</label>
        <input type="number" name="product_id" id="product" class="form-control @error('name') is-invalid @enderror">
        @error('product_id')
        <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
    @endif
    <button class="btn btn-primary my-2">Send</button>
</form>
@else
<p><a href="/login">Login</a> or <a href="/register">register</a></p>
@endauth

@forelse ($reviews as $review)
    <div class="alert border">
        <h3>{{$review->name}}</h3>
        <h4 class="text-secondary">{{$review->created_at->format('d.m.Y')}}</h4>
        <p>{{$review->review}}</p>
    </div>
    @empty <p class="text-center">No reviews</p>
@endforelse
{{$reviews->links()}}
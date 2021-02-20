<div class="splide" id="image-slider">
	<div class="splide__track">
		<ul class="splide__list">
      @foreach ($slider as $item)
      <li class="splide__slide">
        <img src="{{$item->img}}" alt="{{$item->name}}" style="max-width:100vw;">
        <h2 class="m-3 font-weight-bold">{{$item->name}}</h2>
        <p class="m-3 font-weight-light">{{$item->description}}</p>
        <button class="btn btn-primary m-3 btn-lg"><a href="{{$item->button_url}}" class="text-light">{{$item->button_text}}</a></button>
      </li>
      @endforeach
		</ul>
	</div>
  <div class="splide__progress">
		<div class="splide__progress__bar">
		</div>
	</div>
</div>
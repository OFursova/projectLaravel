<div class="splide" id="image-slider">
	<div class="splide__track">
		<ul class="splide__list">
      @foreach ($slider as $item)
      <li class="splide__slide">
        <img src="{{$item->img}}" alt="{{$item->name}}" style="max-width:100vw;">
        <h3>{{$item->name}}</h3>
        <p>{{$item->description}}</p>
        <button class="btn btn-primary my-2"><a href="{{$item->button_url}}">{{$item->button_text}}</a></button>
      </li>
      @endforeach
		</ul>
	</div>
  <div class="splide__progress">
		<div class="splide__progress__bar">
		</div>
	</div>
</div>
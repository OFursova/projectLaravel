<div class="splide">
	<div class="splide__track">
		<ul class="splide__list">
      @foreach ($slider as $item)
      <li class="splide__slide">
        <img src="{{$item->img}}" alt="{{$item->name}}" style="max-width:100vw;">
        <h3>{{$item->name}}</h3>
      </li>
      @endforeach
		</ul>
	</div>
  <div class="splide__progress">
		<div class="splide__progress__bar">
		</div>
	</div>
</div>
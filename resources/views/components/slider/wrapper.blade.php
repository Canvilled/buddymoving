@props([
  'options' => [],
  'padding' =>''
])

<div {{$attributes->merge([ 'class' => 'swiper' ])}} data-call="Slider"  data-slider-config='@json($options)'>
    <div class="swiper-wrapper {{$padding}}">
      {!! $slot !!}
    </div>

    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

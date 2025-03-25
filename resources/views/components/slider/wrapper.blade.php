@props([
  'options' => [],
  'padding' =>''
])
<div class="relative">
  <div {{$attributes->merge([ 'class' => 'swiper' ])}} data-call="Slider"  data-slider-config='@json($options)'>
    <div class="swiper-wrapper {{$padding}}">
      {!! $slot !!}
    </div>
  </div>
  @if(!empty($options['pagination']) && $options['pagination'] == 'true')
    <div class="swiper-pagination"></div>
  @endif
  @if(!empty($options['navigation']) && $options['navigation'] == 'true')
    <div class="swiper-button-prev absolute z-10 left-0 transform -translate-x-8 top-1/2 -translate-y-1/2">
      <x-icon-chevron-left class="w-8 h-8 text-primary" />
    </div>
    <div class="swiper-button-next absolute z-10 right-0 transform translate-x-8 top-1/2 -translate-y-1/2">
      <x-icon-chevron-right class="w-8 h-8 text-primary" />
    </div>
  @endif
</div>

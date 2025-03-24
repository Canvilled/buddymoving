@props([
  'name' => '',
  'content' => '',
  'location' => ''
])
<div class="testimonial-item">
    <div class="testimonial-item__content italic leading-[1.5] text-center">
        {!! $content !!}
    </div>
    <div class="testimonial-item__footer mt-2">
        <x-typo tag="h4" alignment="text-center" class="font-heading text-small font-bold">
            {!! $name !!}
        </x-typo>
        <p class="text-center text-secondary font-heading text-small">{!! $location !!}</p>
    </div>
</div>

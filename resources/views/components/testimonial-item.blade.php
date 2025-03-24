@props([
  'name' => '',
  'content' => '',
  'location' => ''
])
<div class="testimonial-item">
   <div>
     <div class="testimonial-item__content">
       {!! $content !!}
     </div>
     <div class="testimonial-item__footer">
        <x-typo tag="h4" alignment="text-center">
            {!! $name !!}
        </x-typo>
       <p>{!! $location !!}</p>
     </div>
   </div>
</div>

@php
$options = [
	'slidesPerView' => 1,
       'loop' => true,
       'navigation' => true,
       'breakpoints' => [
           640 => [
               'slidesPerView' => 1,
           ],
           768 => [
               'slidesPerView' => 1,
           ],
           1024 => [
               'slidesPerView' => 1,
           ],
       ],

];
@endphp
<div class="testimonial-list__block section">
  <div class="container-content">
    <div class="flex flex-col gap-6">
      @if($fields['heading'])
        <x-typo :tag="$fields['heading_tag']" class="text-heading-title font-heading" :alignment="$fields['heading_alignment'] ?? 'text-center'">
          {!! $fields['heading'] !!}
        </x-typo>
      @endif
      @query([
          'post_type' => 'testimonial'
      ])
      <div class="max-w-[514px] mx-auto max-sm:max-w-full max-sm:w-[calc(100%_-_60px)]">
          @hasposts
          <x-slider.wrapper  :options="$options">
              @posts
              <x-slider.slide>
                  <x-testimonal-item name="{{get_the_title()}}" content="{{get_the_content()}}" location="{{carbon_get_the_post_meta('location')}}" />
              </x-slider.slide>
              @endposts
          </x-slider.wrapper>
          @endhasposts
      </div>
    </div>
  </div>
</div>

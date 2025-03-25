@php
    $options = [
		'slidesPerView' => 1,
		'spaceBetween' => 30,
        'loop' => true,
        'navigation' => true,
        'breakpoints' => [
           640 => [
               'slidesPerView' => 1,
           ],
           768 => [
               'slidesPerView' => 2,
           ],
           1024 => [
               'slidesPerView' => 3,
           ],
           1280 => [
               'slidesPerView' => 4,
           ],
       ],
    ];
@endphp

<div class="video-listing__block section">
    <div class="container-content-big">
        @query([
        'post_type' => 'video'
        ])
        <div class="mx-auto max-xl:max-w-full max-xl:w-[calc(100%_-_60px)]">
            @hasposts
            <x-slider.wrapper :options="$options">
                @posts
                <x-slider.slide>
                    <x-video-item poster="{{ get_the_post_thumbnail_url(get_the_ID(),'full') }}"
                                  video="{!! wp_get_attachment_url(carbon_get_the_post_meta('video')) !!}"/>
                </x-slider.slide>
                @endposts
            </x-slider.wrapper>
            @endhasposts
        </div>
    </div>
</div>

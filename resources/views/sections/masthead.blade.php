<div class="masthead__block relative h-[465px] max-sm:h-[692px] overflow-hidden">
  <div class="absolute z-10 bg-heading opacity-30 inset-0"></div>
  {!! wp_get_attachment_image($fields['hero_image'],'full',null,[ 'loading' => 'lazy','class' => 'absolute object-cover top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0 w-full h-full'])!!}
  <x-icon-overlay class="text-white absolute bottom-0 z-20 w-[calc(250%_+_1.3px)] h-full left-1/2 transform -translate-x-1/2" />
  <div class="container relative z-30 h-full flex items-center justify-center">
    <div class="flex flex-col items-center justify-center gap-5 text-white">
      @if($fields['hero'])
        <x-typo :tag="$fields['hero_tag']" class="text-hero max-md:text-hero-mb font-heading uppercase" :alignment="$fields['hero_alignment'] ?? 'text-center'">
          {!! \App\Utils\MarkdownRenderer::render( $fields['hero']) !!}
        </x-typo>
      @endif
      @if($fields['description'])
        <div class="font-heading max-w-[1041px] mx-auto text-center">
          {!! \App\Utils\MarkdownRenderer::render($fields['description']) !!}
        </div>
      @endif
      @if($fields['button_text'])
        <div class="text-center">
          <x-button :href="$fields['button_url']"
                    text_color="text-secondary"
                    tag="a"
                    size="medium"
                    variant="primary">
            {!! $fields['button_text'] !!}
          </x-button>
        </div>
      @endif
    </div>
  </div>
</div>

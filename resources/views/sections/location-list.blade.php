<div class="location-list__block section">
    <div class="container container-content-wrap">
      <div class="flex flex-col gap-4">
        @if($fields['heading'])
          <x-typo :tag="$fields['heading_tag']" class="*:text-heading-title *:font-bold  [&_a]:!no-underline" :alignment="$fields['heading_alignment'] ?? 'text-center'">
            {!! \App\Utils\MarkdownRenderer::render($fields['heading']) !!}
          </x-typo>
        @endif
        @if(!empty($fields['location_item']))
            <div class="flex flex-wrap gap-x-10 gap-y-4">
              @foreach($fields['location_item'] as $item)
                  <a class="location-list__item text-subheading hover:text-primary transition font-bold !no-underline" href="{{ $item['url'] }}">
                      {!! $item['title'] !!}
                  </a>
              @endforeach
            </div>
        @endif
      </div>
    </div>
</div>

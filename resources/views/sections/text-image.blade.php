<div class="text-image__block section">
    <div class="container-content">
        <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-5 max-sm:gap-20">
          <div>
            {!! wp_get_attachment_image($fields['image'],'full',null,[ 'loading' => 'lazy','class' => 'w-full h-auto'])!!}
          </div>
          <div class="self-center">
            @if($fields['heading'])
              <x-typo :tag="$fields['heading_tag']" class="text-heading-title font-bold mb-4" :alignment="$fields['heading_alignment'] ?? 'text-center'">
                {!! $fields['heading'] !!}
              </x-typo>
            @endif
            @if($fields['description'])
              <div class="flex flex-col gap-4 [&_a]:text-secondary [&_a]:!no-underline">
                {!! $fields['description'] !!}
              </div>
            @endif
          </div>
        </div>
    </div>
</div>

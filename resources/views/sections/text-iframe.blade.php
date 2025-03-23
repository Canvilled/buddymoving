<div class="text-image__block section">
  <div class="container-content">
    <div class="grid grid-cols-2 max-sm:grid-cols-1 gap-5 max-sm:gap-6">
      <div>
        @if($fields['heading'])
          <x-typo :tag="$fields['heading_tag']" class="text-heading-title leading-[1.2] font-bold mb-4" :alignment="$fields['heading_alignment'] ?? 'text-center'">
            {!! $fields['heading'] !!}
          </x-typo>
        @endif
        @if($fields['description'])
          <div class="flex flex-col gap-4 [&_a]:text-secondary [&_a]:!no-underline">
            {!! $fields['description'] !!}
          </div>
        @endif
      </div>

      <div class="[&_iframe]:h-[300px] [&_iframe]:w-full">
        {!! $fields['iframe'] !!}
      </div>
    </div>
  </div>
</div>

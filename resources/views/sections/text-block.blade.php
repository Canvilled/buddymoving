<div class="text__block section">
  <div class="container-content">
    <div class="flex flex-col gap-5 ">
      @if($fields['heading'])
        <x-typo :tag="$fields['heading_tag']" class="text-heading-title font-heading" :alignment="$fields['heading_alignment'] ?? 'text-center'">
          {!! $fields['heading'] !!}
        </x-typo>
      @endif
      @if($fields['description'])
        <div class="[&_ul]:list-disc [&_ul]:pl-10 flex flex-col gap-4.5">
          {!! $fields['description'] !!}
        </div>
      @endif
    </div>
  </div>
</div>

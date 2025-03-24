@props([
  'title' => '',
  'description' => ''
])
<div class="service-item group shadow-[0px_0px_10px_0px_rgba(0,0,0,0.5)]">
  <div>
      <x-typo tag="h3" alignment="text-center" class="font-heading text-heading-title text-secondary py-4 px-6 group-hover:bg-primary transition duration-400">
          {!! $title !!}
      </x-typo>
      <div class="p-5">
          {!! $description !!}
      </div>
  </div>
</div>

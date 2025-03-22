@props([
   'tag' => 'button' | 'a',
   'size' => 'small' | 'medium',
   'text_color' => 'text-white',
   'variant' => 'primary' | 'secondary' | 'transparent',
])

@php
  $size ??= 'medium';
  $variant ??= 'solid';

  $size_classes = match ($size) {
     'small' => 'py-2.5 px-4',
     'medium' => 'py-4 px-10 text-button max-lg:py-4 max-lg:px-4',
  };

  $classes = match ($variant) {
     'primary' => 'bg-primary hover:text-white hover:bg-secondary',
     'secondary' => 'bg-secondary hover:text-black',
     'transparent' => 'bg-transparent'
  };

 $classes .= ' !no-underline font-heading transition duration-400 rounded-[5px] text-center inline-flex items-center justify-between gap-3';
@endphp

<{{ $tag }} {{ $attributes->merge(['class' =>  $text_color.' '.$classes.' '.$size_classes]) }}>
   {{ $slot }}
</{{ $tag }}>

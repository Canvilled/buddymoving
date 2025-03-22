@props([
  'title_tag' => 'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'h6' | 'span' | 'div' | 'p',
  'alignment'=>'',
  'class'=>''
])

<{{$title_tag}} {{ $attributes->merge(['class' => $class . ' ' .$alignment])}}>
    {{$slot}}
</{{$title_tag}}>

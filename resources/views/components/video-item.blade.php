@props([
  'poster' => '',
  'video' => ''
])

<div class="video-item rounded-[20px] overflow-hidden">
  <div class="relative">
     <div class="video-item__play-btn w-[60px] h-[60px] rounded-full absolute z-10 text-primary bg-white top-5 right-5">
        <x-icon-circle-play class="w-full h-full" />
     </div>
     <video poster="{{ $poster }}" class="w-full h-full object-cover object-center relative z-0">
        <source src="{{ $video }}" type="video/mp4">
     </video>
  </div>
</div>

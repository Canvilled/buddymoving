@php
  use App\Utils\MarkdownRenderer;
@endphp
<div class="bg-gray py-9">
    <div class="container">
      <div class="grid grid-cols-4 gap-4">
        <div class="flex flex-col gap-5">
          <x-typo tag="h3" class="text-subheading font-heading text-primary">
              {!! __('About us','buddymoving') !!}
          </x-typo>
          <div class="*text-small">
              {!! MarkdownRenderer::renderCarbonField('footer_description','theme_options') !!}
          </div>
          <div>
            {!!
                wp_get_attachment_image(carbon_get_theme_option('footer_media'),'full',null,[
                    'loading' => 'lazy',
                    'class' => 'max-w-[155px] h-auto'
                ])
            !!}
          </div>
          <div class="footer-socials lg:w-full">
            @if(!empty($footerInfo['socials']))
              <ul class="flex items-center gap-[26px]">
                @foreach($footerInfo['socials'] as $key=>$social)
                  <li class="flex items-center justify-center bg-secondary w-[34px] h-[34px]">
                    <a href="{!! $social !!}" target="_blank" class="text-white">
                      {!! Blade::render("<x-icon-{$key} class='w-[17px] h-[17px]'/>") !!}
                    </a>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>

@php
  use App\Menu_Walkers\Footer;
  use App\Utils\MarkdownRenderer;

  $walker = new Footer();
@endphp
<div class="bg-gray py-9 max-sm:py-[18px]">
  <div class="container">
    <div class="grid grid-cols-4 max-sm:grid-cols-1 gap-4">
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
      <div class="col-span-2 max-sm:col-span-1">
        @if (has_nav_menu('footer_navigation'))
          <nav class="nav-sub-footer max-lg:mx-auto" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
            {!! wp_nav_menu([
                'theme_location' => 'footer_navigation',
                'menu_class' => 'nav grid grid-cols-2 gap-4 [&_a]:!no-underline',
				'walker' => $walker,
                'echo' => false,
                ]) !!}
          </nav>
        @endif
      </div>
      <div class="flex flex-col gap-5">
        <x-typo tag="h3" class="text-subheading font-heading text-primary">
          {!! __('Contact','buddymoving') !!}
        </x-typo>
        <div class="flex flex-col gap-3.5">
          <div>
            <x-typo tag="p" class="font-bold">
              {!! __('Address:','buddymoving') !!}
            </x-typo>
            {!! MarkdownRenderer::renderCarbonField('contact_address','theme_options') !!}
          </div>
          <div>
            <x-typo tag="p" class="font-bold">
              {!! __('Call us:','buddymoving') !!}
            </x-typo>
            {!! MarkdownRenderer::renderCarbonField('contact_phone','theme_options') !!}
          </div>
          <div>
            <x-typo tag="p" class="font-bold">
              {!! __('Email Us:','buddymoving') !!}
            </x-typo>
            {!! MarkdownRenderer::renderCarbonField('contact_email','theme_options') !!}
          </div>
          <div>
            <x-typo tag="p" class="font-bold">
              {!! __('Business Hours:','buddymoving') !!}
            </x-typo>
            {!! MarkdownRenderer::renderCarbonField('contact_working_hours','theme_options') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

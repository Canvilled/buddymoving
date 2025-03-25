@php
  use App\Utils\MarkdownRenderer;
@endphp
<div class="bg-primary py-2.5 *:text-white ![&_a]:text-secondary shadow-[0px_0px_10px_0px_rgba(0,0,0,0.5)]">
  <div class="container-content-big">
    <div class="flex items-center justify-between gap-y-5 flex-wrap max-xl:text-center">
        <div>
          {!! MarkdownRenderer::renderCarbonField('footer_copywriter','theme_options') !!}
        </div>
        @if (has_nav_menu('sub_footer_navigation'))
          <nav class="nav-sub-footer max-lg:mx-auto" aria-label="{{ wp_get_nav_menu_name('sub_footer_navigation') }}">
            {!! wp_nav_menu([
                'theme_location' => 'sub_footer_navigation',
                'menu_class' => 'nav text-white flex items-center divide-x divide-white text-small [&_a]:!no-underline [&_li]:px-2 [&_li]:last:pr-0',
                'echo' => false,
                ]) !!}
          </nav>
        @endif
    </div>
  </div>
</div>

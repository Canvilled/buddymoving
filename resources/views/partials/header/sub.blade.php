@php
  use App\Menu_Walkers\Sub_Header;
  use App\Utils\MarkdownRenderer;
  $walker = new Sub_Header();
@endphp
<div class="bg-primary py-2.5">
  <div class="container">
    <div class="flex justify-between max-xl:justify-center items-center">
      @if (has_nav_menu('sub_primary_navigation'))
        <nav class="nav-sub-primary" aria-label="{{ wp_get_nav_menu_name('sub_primary_navigation') }}">
          {!! wp_nav_menu([
              'theme_location' => 'sub_primary_navigation',
              'menu_class' => 'nav text-white font-heading flex gap-[68px]',
              'echo' => false,
              'walker' => $walker
              ]) !!}
        </nav>
      @endif
      <div class="text-white [&_a]:text-secondary max-xl:hidden">
        {!! MarkdownRenderer::renderCarbonField('subheader_text', 'theme_options') !!}
      </div>
    </div>
  </div>
</div>

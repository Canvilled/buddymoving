@php
  use App\Menu_Walkers\Header;
  $walker = new Header();
@endphp
<div class="py-6" data-call="Header">
  <div class="container">
    <div class="flex justify-between items-center">
      <div class="">
        <a class="logo block" href="{{ home_url('/') }}">
          {!! wp_get_attachment_image( get_theme_mod( 'custom_logo'),'full',null,[
              'class' => 'w-[180px] h-[67px] object-contain'
          ]) !!}
        </a>
      </div>
      <div class="flex items-center justify-end gap-20">
        @if (has_nav_menu('primary_navigation'))
          <nav
            class="nav-primary relative z-50 is-menu-inactive"
            aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}"
            aria-expanded="false"
          >
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'nav font-heading flex item-center max-xl:divide-y max-xl:divide-white ',
                'echo' => false,
                'walker' => $walker
                ]) !!}
          </nav>
          <button
            class="hidden max-xl:inline-flex bg-primary cursor-pointer w-10 h-10 rounded-[5px] items-center justify-center"
            aria-label="Toggle Menu"
            aria-controls="{{ wp_get_nav_menu_name('primary_navigation') }}"
          >
            <i class="block"><x-icon-bars class="w-6 h-6 text-white" /></i>
            <i class="hidden"><x-icon-mark class="w-6 h-6 text-white" /></i>
          </button>
        @endif
        <div class="max-sm:hidden">
          <x-button
            tag="a"
            size="medium"
            variant="primary"
            href="{{carbon_get_theme_option('header_button_url')}}"
          >
            {!! carbon_get_theme_option('header_button_text') !!}
            <x-icon-arrow-right class="w-5 h-5" />
          </x-button>
        </div>
      </div>
    </div>
  </div>
</div>

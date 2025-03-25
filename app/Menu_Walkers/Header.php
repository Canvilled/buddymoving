<?php
namespace App\Menu_Walkers;

use Illuminate\Support\Facades\Blade;
use \Walker_Nav_Menu;


class Header extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0): void
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        if($depth == 0){
            $classes[] = 'py-3.5 px-5 text-subheading max-xl:text-base max-xl:py-0 max-xl:px-0 font-heading !font-normal';
        }// add your class for menu items here

        if($depth == 0 && $args->walker->has_children){
            $classes[] = 'group relative';
        }

        if ($depth !==0 && !$args->walker->has_children) {
            $classes[] = 'xl:hover:bg-secondary py-[15px] px-10';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li ' . $class_names .'>';



        if($depth == 0 && $args->walker->has_children) {
            $output .= '<div class="gap-2.5 flex items-center max-xl:py-4 max-xl:px-10"><a class="!no-underline uppercase"  href="' . $item->url . '">' . $item->title . '</a>' .Blade::render('<x-icon-chevron-down class="w-3.5 h-3.5 transform transition origin-center xl:group-hover:rotate-180"  />').'</div>';
        }elseif($depth == 0 && !$args->walker->has_children){
            $output .= '<a class="!no-underline block uppercase max-xl:py-4 max-xl:px-10" href="' . $item->url . '">' . $item->title . '</a>';
        }else{
            $output .= '<a class="!no-underline text-base" href="' . $item->url . '">' . $item->title . '</a>';
        }
    }

    function start_lvl(&$output, $depth = 0, $args = array()): void
    {
        $output .= '<ul class="hidden xl:group-hover:flex max-xl:flex max-xl:h-[0] max-xl:pl-[15px] max-xl:overflow-hidden flex-col bg-heading xl:absolute xl:w-max xl:bottom-0 xl:left-0 xl:transform xl:left-1/2 xl:-translate-x-1/2 text-white xl:translate-y-full xl:rounded-[5px] divide-y divide-white xl:z-10">';
    }
}

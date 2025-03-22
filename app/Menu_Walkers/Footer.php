<?php
namespace App\Menu_Walkers;

use Illuminate\Support\Facades\Blade;
use Walker_Nav_Menu;


class Footer extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0): void
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        if($depth == 0){
            $classes[] = '';
        }// add your class for menu items here

        if($depth == 0 && $args->walker->has_children){
            $classes[] = 'flex flex-col gap-5';
        }

        if ($depth !==0 && !$args->walker->has_children) {
            $classes[] = '';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li ' . $class_names .'>';



        if($depth == 0 && $args->walker->has_children) {
	        $output .= '<div class=""><h3 class="text-subheading font-heading text-primary"><a class="!no-underline"  href="' . $item->url . '">' . $item->title . '</a></h3>'.'</div>';
        }elseif($depth == 0 && !$args->walker->has_children){
            $output .= '<a class="!no-underline uppercase" href="' . $item->url . '">' . $item->title . '</a>';
        }else{
            $output .= '<div class="flex items-center gap-2.5">'.Blade::render('<x-icon-chevron-right class="w-3.5 h-3.5 text-secondary"  />').'<a class="!no-underline text-base" href="' . $item->url . '">' . $item->title . '</a></div>';
        }
    }

    function start_lvl(&$output, $depth = 0, $args = array()): void
    {
        $output .= '<ul class="flex flex-col gap-2.5">';

    }
}

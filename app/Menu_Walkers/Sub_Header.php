<?php

namespace App\Menu_Walkers;
use Illuminate\Support\Facades\Blade;
use \Walker_Nav_Menu;
class Sub_Header extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0): void
    {
        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $classes[] = ''; // add your class for menu items here


        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= '<li ' . $class_names .'>';



        $output .= '<a class="!no-underline" href="' . $item->url . '">' . do_shortcode($item->title) . '</a>';
    }

}

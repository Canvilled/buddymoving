<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'footerInfo' => $this->footerInfo(),
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    public function footerInfo(): array
    {
        return [
            'socials' => $this->socialsLink(),
            'description' => carbon_get_theme_option('footer_description') ?? '',
            'certificates' => wp_get_attachment_image(carbon_get_theme_option('footer_media'),'full',null,[
                'loading' => 'lazy',
                'class' => 'max-w-[155px] h-auto'
            ]),
        ];
    }

    public function socialsLink(): array
    {
        return [
            'facebook' => carbon_get_theme_option('social_facebook') ?? '',
            'instagram' => carbon_get_theme_option('social_instagram') ?? '',
            'linkedin' => carbon_get_theme_option('social_linkedin') ?? '',
        ];
    }
}

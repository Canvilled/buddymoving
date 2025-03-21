<?php
namespace App\Utils\Shortcodes\Strategies;

use Illuminate\Support\Facades\Blade;

class EmailShortcodeStrategy implements ShortcodeStrategy
{
    public function execute($atts, $content = null): string
    {
        $icon = Blade::render('<x-icon-email class="text-secondary flex-[0_0_17px] w-[17px] h-[17px]" />');
        $email = $this->getEmail();

        return "<div class='flex gap-[5px] items-center'>{$icon}<span>{$email}</span></div>";
    }

    protected function getEmail(): string
    {
        return carbon_get_theme_option('contact_email') ?? '';
    }
}

<?php
namespace App\Utils\Shortcodes\Strategies;

use Illuminate\Support\Facades\Blade;

class PhoneShortcodeStrategy implements ShortcodeStrategy
{
    public function execute($atts, $content = null): string
    {
        $icon = Blade::render('<x-icon-phone class="text-secondary flex-[0_0_17px] w-[17px] h-[17px]" />');
        $phone = $this->getPhone();

        return "<div class='flex gap-[5px] items-center'>{$icon}<span>{$phone}</span></div>";
    }

    protected function getPhone(): string
    {
        return carbon_get_theme_option('contact_phone') ?? '';
    }
}

<?php
namespace App\Utils\Shortcodes\Strategies;

interface ShortcodeStrategy
{
    public function execute($atts, $content = null): string;
}

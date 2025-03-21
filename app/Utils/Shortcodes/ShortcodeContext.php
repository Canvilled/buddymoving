<?php
namespace App\Utils\Shortcodes;

use App\Utils\Shortcodes\Strategies\ShortcodeStrategy;

class ShortcodeContext
{
    private ShortcodeStrategy $strategy;

    public function setStrategy(ShortcodeStrategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function executeStrategy($atts, $content = null): string
    {
        return $this->strategy->execute($atts, $content);
    }
}

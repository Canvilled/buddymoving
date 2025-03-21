<?php
namespace App\Utils\Shortcodes;


/**
 * Shortcodes Manager
 */
class Shortcodes
{
    /**
     * Initialize shortcodes and register them with WordPress
     */
    public function __construct()
    {
        // Initialize all available shortcode strategies
        ShortcodeRegistry::initialize();

        // Register all available shortcodes
        $this->registerShortcodes();
    }

    /**
     * Register all shortcodes with WordPress
     */
    private function registerShortcodes(): void
    {
        // Get shortcode names from registry keys
        $shortcodeNames = array_keys(ShortcodeRegistry::getAllStrategies());

        collect($shortcodeNames)->each(function ($shortcode) {
            add_shortcode($shortcode, function ($atts, $content = null) use ($shortcode) {
                $strategy = ShortcodeRegistry::getStrategy($shortcode);
                if ($strategy) {
                    $context = new ShortcodeContext();
                    $context->setStrategy($strategy);
                    return $context->executeStrategy($atts, $content);
                }
                return '';
            });
        });
    }
}

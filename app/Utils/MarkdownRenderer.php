<?php

namespace App\Utils;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\MarkdownConverter;

class MarkdownRenderer
{
    /**
     * Convert Markdown to HTML
     *
     * @param string $markdown The markdown content to parse
     * @return string The HTML output
     */
    public static function render(string $markdown): string
    {
        // Configure the Environment
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());

        // Create the converter
        $converter = new MarkdownConverter($environment);

        // Convert to HTML
        return $converter->convert($markdown)->getContent();
    }

    /**
     * Render Markdown from a Carbon Field
     *
     * @param string $fieldName The carbon field name
     * @param string $containerType Optional. The container type ('post_meta', 'term_meta', 'user_meta', 'theme_options')
     * @param int|null $id Optional. The container ID (post ID, term ID, user ID)
     * @return string The HTML output
     */
    public static function renderCarbonField(string $fieldName, string $containerType = 'post_meta', $id = null): string
    {
        // Get the content based on container type
        $markdown = '';

        switch ($containerType) {
            case 'post_meta':
                $markdown = carbon_get_post_meta($id ?? get_the_ID(), $fieldName);
                break;
            case 'term_meta':
                $markdown = carbon_get_term_meta($id, $fieldName);
                break;
            case 'user_meta':
                $markdown = carbon_get_user_meta($id, $fieldName);
                break;
            case 'theme_options':
                $markdown = carbon_get_theme_option($fieldName);
                break;
        }

        // Convert and return
        return self::render($markdown);
    }
}

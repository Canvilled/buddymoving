<?php
namespace App\Utils;

class Helpers {
    public const string TEXT_DOMAIN = 'buddymoving';
    private function __construct() {}

    public static function getHeadingTagsChoice(): array
    {
        return [
            'h1' => __('H1', self::TEXT_DOMAIN),
            'h2' => __('H2', self::TEXT_DOMAIN),
            'h3' => __('H3', self::TEXT_DOMAIN),
            'h4' => __('H4', self::TEXT_DOMAIN),
            'h5' => __('H5', self::TEXT_DOMAIN),
            'h6' => __('H6', self::TEXT_DOMAIN),
            'p' => __('P', self::TEXT_DOMAIN),
            'div' => __('DIV', self::TEXT_DOMAIN),
            'span' => __('SPAN', self::TEXT_DOMAIN),
        ];
    }

    public static function getTextAlignment(): array {
        return [
            'text-left' => __('Left', self::TEXT_DOMAIN),
            'text-center' => __('Center', self::TEXT_DOMAIN),
            'text-right' => __('Right', self::TEXT_DOMAIN),
        ];
    }
}

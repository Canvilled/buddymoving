<?php
namespace App\Utils\Shortcodes;

use App\Utils\Shortcodes\Strategies\ShortcodeStrategy;
use App\Utils\Shortcodes\Strategies\PhoneShortcodeStrategy;
use App\Utils\Shortcodes\Strategies\EmailShortcodeStrategy;

class ShortcodeRegistry
{
    private static array $strategies = [];

    public static function registerStrategy(string $name, ShortcodeStrategy $strategy): void
    {
        self::$strategies[$name] = $strategy;
    }

    public static function getStrategy(string $name): ?ShortcodeStrategy
    {
        return self::$strategies[$name] ?? null;
    }

    public static function getAllStrategies(): array
    {
        return self::$strategies;
    }

    public static function initialize(): void
    {
        self::registerStrategy('phone', new PhoneShortcodeStrategy());
        self::registerStrategy('email', new EmailShortcodeStrategy());
    }
}

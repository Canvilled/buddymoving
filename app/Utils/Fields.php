<?php
namespace App\Utils;

use App\Fields\FieldStrategyInterface;
use Carbon_Fields\Field;
use Exception;

class Fields
{
    /**
     * Prevents instantiation of this utility class
     */
    private function __construct() {}

    /**
     * Path to Fields directory
     */
    private static string $fieldsDirectory = __DIR__ . '/../Fields';

    /**
     * Fields namespace
     */
    private static string $fieldsNamespace = 'App\\Fields';

    /**
     * Initialize and register all field types
     */
    public static function init(): void
    {
        try {
            $fieldClasses = self::discoverFieldClasses();
            self::registerFields($fieldClasses);
        } catch (Exception $e) {
            // Log the error appropriately in your application
            error_log('Field registration error: ' . $e->getMessage());
        }
    }

    /**
     * Discover all field classes implementing FieldStrategyInterface
     *
     * @return array Array of qualified class names
     */
    private static function discoverFieldClasses(): array
    {
        $fieldClasses = [];
        $files = glob(self::$fieldsDirectory . '/*.php');

        foreach ($files as $file) {
            $className = self::$fieldsNamespace . '\\' . pathinfo($file, PATHINFO_FILENAME);

            if (class_exists($className) && is_subclass_of($className, FieldStrategyInterface::class)) {
                $fieldClasses[] = $className;
            }
        }

        return $fieldClasses;
    }

    /**
     * Register all discovered field classes
     *
     * @param array $fieldClasses Array of qualified class names
     */
    private static function registerFields(array $fieldClasses): void
    {
        foreach ($fieldClasses as $className) {
            try {
                $field = new $className();
                $field->register();
            } catch (Exception $e) {
                // Log error but continue with other fields
                error_log("Failed to register field: {$className}. Error: " . $e->getMessage());
            }
        }
    }

    public static function add_control_heading(string $field,string $field_name): array
    {
        return [
            Field::make( 'text', $field, __( $field_name ) )
                 ->set_help_text( 'Use curly braces { } to highlight your word' ),
            Field::make( 'select', $field.'_tag', __( $field_name.' Tag' ) )
                 ->add_options('\App\Utils\Helpers::getHeadingTagsChoice')
        ];
    }
}

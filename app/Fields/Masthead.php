<?php
namespace App\Fields;

use Carbon_Fields\Field;
use Carbon_Fields\Block;

class Masthead implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_masthead_field'] );
    }

    public function attach_masthead_field(): void {
        Block::make( __( 'Masthead' ) )
            ->set_mode('preview')
            ->add_fields(array_merge(
                \App\Utils\Fields::add_control_heading('hero', 'Hero'),
                [
                    Field::make( 'textarea', 'description', 'Description' ),
                    Field::make( 'image', 'hero_image', 'Hero Image' ),
                    Field::make( 'text', 'button_text', 'Button Text' ),
                    Field::make( 'text', 'button_url', 'Button Url' ),
                ]
            ))
            ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                echo view('sections.masthead', [
                    'fields' => $fields,
                    'attributes' => $attributes,
                    'inner_blocks' => $inner_blocks,
                ]);
            });
    }

}

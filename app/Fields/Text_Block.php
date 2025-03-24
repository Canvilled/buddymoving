<?php
namespace App\Fields;

use Carbon_Fields\Field;
use Carbon_Fields\Block;

class Text_Block implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_text_field'] );
    }

    public function attach_text_field(): void {
        Block::make( __( 'Text Block' ) )
             ->add_fields(array_merge(
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
                 [
                     Field::make( 'rich_text', 'description', 'Description' ),
                 ]
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.text-block', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

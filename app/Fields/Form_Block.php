<?php
namespace App\Fields;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class Form_Block implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_form_block_field'] );
    }

    public function attach_form_block_field(): void {
        Block::make( __( 'Form Block' ) )
             ->set_mode('preview')
             ->add_fields(array_merge(
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
                 \App\Utils\Fields::add_control_heading('subtitle', 'Subtitle'),
                 [
                     Field::make( 'text', 'form_shortcode', 'Form Shortcode' ),
                 ]
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.form', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

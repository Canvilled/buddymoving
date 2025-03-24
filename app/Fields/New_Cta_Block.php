<?php
namespace App\Fields;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class New_Cta_Block implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_cta_field'] );
    }

    public function attach_cta_field(): void {
        Block::make( __( 'New CTA Block' ) )
             ->add_fields(array_merge(
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
                 [
                     Field::make( 'text', 'button_left_text', 'Button Left Text' ),
                     Field::make( 'text', 'button_left_url', 'Button Left Url' ),
                     Field::make( 'text', 'button_right_text', 'Button Right Text' ),
                     Field::make( 'text', 'button_right_url', 'Button Right Url' ),
                 ]
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.cta', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

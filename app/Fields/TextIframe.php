<?php
namespace App\Fields;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class TextIframe implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_text_iframe_field'] );
    }

    public function attach_text_iframe_field(): void {
        Block::make( __( 'Text Iframe' ) )
            ->set_mode('preview')
             ->add_fields(array_merge(
                 [
                     Field::make( 'textarea', 'iframe', 'Iframe' ),
                 ],
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
                 [
                     Field::make( 'rich_text', 'description', 'Description' ),
                 ]
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.text-iframe', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

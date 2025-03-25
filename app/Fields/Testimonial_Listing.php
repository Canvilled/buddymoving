<?php
namespace App\Fields;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class Testimonial_Listing implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_testimonial_list_field'] );
    }

    public function attach_testimonial_list_field(): void {
        Block::make( __( 'Testimonials' ) )
            ->set_mode('preview')
             ->add_fields(array_merge(
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.testimonial-list', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

<?php
namespace App\Fields;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class Service_Listing implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_service_list_field'] );
    }

    public function attach_service_list_field(): void {
        Block::make( __( 'Services' ) )
            ->set_mode('preview')
             ->add_fields(array_merge(
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
                 [
                     Field::make( 'complex', 'service_item', __( 'Service List' ) )
                           ->add_fields( array(
                               Field::make( 'text', 'title', __( 'Service Heading' ) ),
                               Field::make( 'rich_text', 'description', __( 'Description' ) ),
                           ) )
                 ]
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.service-list', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

<?php
namespace App\Fields;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

class Location_Listing implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_location_list_field'] );
    }

    public function attach_location_list_field(): void {
        Block::make( __( 'Locations' ) )
             ->add_fields(array_merge(
                 \App\Utils\Fields::add_control_heading('heading', 'Heading'),
                 [
                     Field::make( 'complex', 'location_item', __( 'Location List' ) )
                           ->add_fields( array(
                               Field::make( 'text', 'title', __( 'Location Heading' ) ),
                               Field::make( 'text', 'url', __( 'Location Link' ) )->set_default_value('#'),
                           ) )
                 ]
             ))
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.location-list', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

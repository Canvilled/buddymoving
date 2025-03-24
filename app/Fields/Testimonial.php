<?php

namespace App\Fields;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Testimonial implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [ $this, 'attach_testimonial_field' ] );
    }

    public function attach_testimonial_field(): void {
        Container::make( 'post_meta', __( 'Testimonial Data' ) )
                 ->where( 'post_type', '=', 'testimonial' )
                 ->add_fields( [
                     Field::make( 'text', 'location', 'Location' ),
                 ] );
    }
}

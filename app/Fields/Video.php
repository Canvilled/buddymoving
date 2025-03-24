<?php

namespace App\Fields;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Video implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [ $this, 'attach_video_field' ] );
    }

    public function attach_video_field(): void {
        Container::make( 'post_meta', __( 'Video Data' ) )
                 ->where( 'post_type', '=', 'video' )
                 ->add_fields( [
                     Field::make( 'file', 'video', __( 'File' ) )
                 ] );
    }
}

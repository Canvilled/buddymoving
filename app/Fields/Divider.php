<?php

namespace App\Fields;

use Carbon_Fields\Block;

class Divider implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [ $this, 'attach_divider_field' ] );
    }

    public function attach_divider_field(): void {
        Block::make( __( 'Divider' ) )
             ->add_fields([])
             ->set_mode('preview')
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('components.divider', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }
}

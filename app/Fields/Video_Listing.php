<?php
namespace App\Fields;

use Carbon_Fields\Block;

class Video_Listing implements FieldStrategyInterface {
    public function register(): void {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_video_list_field'] );
    }

    public function attach_video_list_field(): void {
        Block::make( __( 'Videos' ) )
            ->add_fields([])
             ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
                 echo view('sections.video-list', [
                     'fields' => $fields,
                     'attributes' => $attributes,
                     'inner_blocks' => $inner_blocks,
                 ]);
             });
    }

}

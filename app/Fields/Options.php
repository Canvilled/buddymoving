<?php
namespace App\Fields;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class Options implements FieldStrategyInterface

{
    public function __construct(){}

    public function register(): void
    {
        add_action( 'carbon_fields_register_fields', [$this, 'attach_theme_options'] );
    }

    public function attach_theme_options(): void
    {
        Container::make( 'theme_options', __( 'More Settings' ) )
            ->add_tab( __( 'Contact Information' ), [
                Field::make( 'text', 'contact_phone', 'Phone Number' ),
                Field::make( 'text', 'contact_address', 'Address' ),
                Field::make( 'text', 'contact_email', 'Email' ),
                Field::make( 'text', 'contact_working_hours', 'Business Hours' ),
            ])
            ->add_tab( __( 'Social Information' ), [
                Field::make( 'text', 'social_facebook', 'Facebook URL' ),
                Field::make( 'text', 'social_instagram', 'Youtube URL' ),
                Field::make( 'text', 'social_linkedin', 'Linkedin URL' ),
            ])
            ->add_tab( __( 'Header Information' ), [
                Field::make( 'text', 'subheader_text', 'Sub Header Text' ),
                Field::make( 'text', 'header_button_text', 'Header Button Text' ),
                Field::make( 'text', 'header_button_url', 'Header Button Url' ),
            ])
            ->add_tab( __( 'Footer Information' ), [
                Field::make( 'textarea', 'footer_description', 'Footer Description' ),
                Field::make( 'image', 'footer_media', __( 'Footer Certificate' ) ),
                Field::make( 'text', 'footer_copywriter', 'CopyWriter Text' ),
            ]);
    }
}

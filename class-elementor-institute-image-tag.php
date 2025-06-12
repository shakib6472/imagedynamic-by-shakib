<?php
if ( ! defined('ABSPATH') ) exit;

class Elementor_Institute_Image_Tag extends \Elementor\Core\DynamicTags\Data_Tag {

    public function get_name() { 
        return 'institute-image';
    }

    public function get_title() {
        return 'Institute Image';
    }

    public function get_group() {
        return 'post';
    }

    public function get_categories(): array {
        return [ \Elementor\Modules\DynamicTags\Module::IMAGE_CATEGORY ];
    }

    public function get_value( array $options = [] ) {
        $post_id = get_the_ID();
        if ( ! $post_id ) {
            return false;
        }

        $terms = get_the_terms( $post_id, 'institution' );
        if ( ! $terms || is_wp_error($terms) ) {
            return false;
        }

        $term = $terms[0];
        $image_id = get_term_meta( $term->term_id, 'university_image', true );
        if ( ! $image_id || ! get_post( $image_id ) ) {
            return false;
        }

        $size = 'full';
        $image_src = wp_get_attachment_image_src( $image_id, $size );

        if ( ! $image_src || ! isset( $image_src[0] ) ) {
            return false;
        }

        return [
            'id'        => (int) $image_id,
            'url'       => $image_src[0],
            'size'      => $size,
            'dimension' => [
                'width'  => $image_src[1],
                'height' => $image_src[2],
            ],
        ];
    }
}

<?php
/**
 * Plugin Name: websila-categories-elementor-widget
 * Description: A plugin to show sub categories on product archive pages
 * Version:     1.0.0
 * Author:      Alireza Mohammadi
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-addon
 */

function register_websila_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/hello-world-widget-1.php' );
	require_once( __DIR__ . '/widgets/hello-world-widget-2.php' );
	require_once( __DIR__ . '/widgets/websila-categories.php' );

	$widgets_manager->register( new \Elementor_Hello_World_Widget_1() );
	$widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
	$widgets_manager->register( new \Elementor_Websila_Categories() );

}
add_action( 'elementor/widgets/register', 'register_websila_widget' );

// Add ACF fields for the widget
add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}
	acf_add_local_field_group( array(
		'key' => 'group_625d87545766f',
		'title' => 'دسته بندی محصولات',
		'fields' => array(
			array(
				'key' => 'field_659eab5fcfabe',
				'label' => 'دسته های مرتبط',
				'name' => 'related_categories',
				'aria-label' => '',
				'type' => 'taxonomy',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'taxonomy' => 'product_cat',
				'add_term' => 0,
				'save_terms' => 0,
				'load_terms' => 0,
				'return_format' => 'id',
				'field_type' => 'multi_select',
				'allow_null' => 1,
				'bidirectional' => 0,
				'multiple' => 0,
				'bidirectional_target' => array(
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));
});
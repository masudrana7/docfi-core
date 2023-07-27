<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

add_action( 'widgets_init', 'docfi_widgets_init' );
function docfi_widgets_init() {
	// Register Custom Widgets
	register_widget( 'DocfiTheme_About_Widget' );
	register_widget( 'DocfiTheme_Address_Widget' );
	register_widget( 'DocfiTheme_Social_Widget' );
	register_widget( 'DocfiTheme_Post_Box' );
	register_widget( 'DocfiTheme_Post_Tab' );
	register_widget( 'DocfiTheme_Feature_Post' );
	register_widget( 'DocfiTheme_Product_Box' );
	register_widget( 'DocfiTheme_Category_Widget' );
	register_widget( 'DocfiTheme_Download_Widget' );
	register_widget( 'DocfiTheme_Contact_Widget' );
}
<?php

class Khach_Hang extends CPT_Abstract
{
	public function register_post_type($cpt)
	{
		$cpt->set_post_type(array(
			'post_type' 	=> 'ky-thuat',
			'name' 			=> _x( 'Kỹ thuật ứng dụng', 'Post Type General Name', 'shtheme' ),
			'singular_name' => _x( 'Kỹ thuật ứng dụng', 'Post Type Singular Name', 'shtheme' ),
			'supports'		=> [ 'title', 'editor', 'thumbnail', 'excerpt' , 'revisions' ],
			'menu_icon'		=> 'dashicons-admin-generic',
			'rewrite'		=> [ 'slug' => 'ky-thuat'],
			'menu_position'	=> 6
		));
		$cpt->set_no_slug_post_type( 'ky-thuat' );
		//$cpt->set_no_gutenberg_post_types('ky-thuat);
	}
}
new Khach_Hang();
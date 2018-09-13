<?php

if ( ! function_exists( 'pintsandcrafts_edge_like' ) ) {
	/**
	 * Returns PintsAndCraftsPhpClassLike instance
	 *
	 * @return PintsAndCraftsPhpClassLike
	 */
	function pintsandcrafts_edge_like() {
		return PintsAndCraftsPhpClassLike::get_instance();
	}
}

function pintsandcrafts_edge_get_like() {
	
	echo wp_kses( pintsandcrafts_edge_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}
<?php
/**
 * The template for displaying header navigation.
 *
 * @package     Sinatra
 * @author      Sinatra Team <hello@sinatrawp.com>
 * @since       1.0.0
 */

?>

<?php

if ( has_nav_menu( 'sinatra-primary' ) ) {
	wp_nav_menu(
		array(
			'theme_location' => 'sinatra-primary',
			'menu_id'        => 'sinatra-primary-nav',
                        'items_wrap'     => '<div data-test="collapse" id="navbarCollapse3" class="sinatra-nav si-header-element collapse navbar-collapse"><ul id="%1$s" class="%2$s navbar-nav">%3$s</ul></div>',
			'container'      => '',
			'link_before'    => '',
			'link_after'     => '',
		)
	);
} else {
	wp_page_menu(
		array(
			'menu_class'  => 'sinatra-primary-nav',
			'show_home'   => true,
			'container'   => 'ul',
			'before'      => '',
			'after'       => '',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		)
	);
}

?>

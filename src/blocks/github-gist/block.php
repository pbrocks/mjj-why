<?php

// Register the block and server side render
// again, I totally copied this from https://github.com/pantheon-systems/github-gist-gutenberg-block/

function mjj_why_github_gist_init() {

	// you can still use a shortcode for this
	add_shortcode( 'mjj-github-gist', 'mjj_why_github_gist_render' );

	register_block_type( 'mjj-why/github-gist', array(
    	'render_callback' => 'mjj_why_github_gist_render'
	) );
}
add_action( 'init', 'mjj_why_github_gist_init' );

function mjj_why_github_gist_render( $attributes ){

	if ( empty( $attributes['gistUrl'] )
		|| 'gist.github.com' !== parse_url( $attributes['gistUrl'], PHP_URL_HOST ) ) {
			return '';
	}
	return sprintf(
		'<script src="%s"></script>',
		esc_url( rtrim( $attributes['gistUrl'], '/' ) . '.js' )
	);
}
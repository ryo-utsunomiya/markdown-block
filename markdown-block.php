<?php
/**
 * A WordPress plugin for Markdown addicted.
 *
 * @package WordPress
 * @author Ryo Utsunomiya
 * @license GPLv2
 * @link https://github.com/ryo-utsunomiya/markdown-block
 */

/**
 * Register Block JS file.
 */
function markdown_block_enqueue_block_editor_assets() {
	wp_enqueue_script(
		'markdown-block',
		plugins_url( 'index.build.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element' )
	);
}

add_action( 'enqueue_block_editor_assets', 'markdown_block_enqueue_block_editor_assets' );

/**
 * Render Markdown contents.
 *
 * @param array $attributes Block attributes.
 *
 * @return string
 */
function render_markdown( $attributes ) {
	$markdown = '';

	if ( isset( $attributes['content'] ) && is_array( $attributes['content'] ) ) {
		foreach ( $attributes['content'] as $line ) {
			if ( is_string( $line ) ) {
				$markdown .= $line;
			}
			if ( is_array( $line ) ) {
				if ( isset( $line['type'] ) && 'br' === $line['type'] ) {
					$markdown .= "\n";
				}
			}
		}
	}

	// Use GitHub Flavored Markdown(MarkdownExtra).
	$parser = new \cebe\markdown\MarkdownExtra();

	return $parser->parse( $markdown );
}

register_block_type( 'markdown-block/markdown-block', array(
	'render_callback' => 'render_markdown',
) );

<?php
/*
Plugin Name: markdown-block
Plugin URI: https://github.com/ryo-utsunomiya/markdown-block
Description: A WordPress plugin which provides Markdown block for Gutenberg editor.
Version: 1.0.0
Author: Ryo Utsunomiya
Author URI: https://ryo511.info
License: GPLv2
*/

function markdown_block_enqueue_block_editor_assets()
{
    wp_enqueue_script(
        'markdown-block',
        plugins_url('index.build.js', __FILE__),
        array('wp-blocks', 'wp-element')
    );
}

add_action('enqueue_block_editor_assets', 'markdown_block_enqueue_block_editor_assets');

function render_markdown()
{
    return "<div>todo: Convert Markdown to HTML</div>";
}

register_block_type('markdown-block/markdown-block', array(
    'render_callback' => 'render_markdown',
));

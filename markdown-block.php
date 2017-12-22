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

require_once dirname(__FILE__) . '/vendor/autoload.php';

function markdown_block_enqueue_block_editor_assets()
{
    wp_enqueue_script(
        'markdown-block',
        plugins_url('index.build.js', __FILE__),
        array('wp-blocks', 'wp-element')
    );
}

add_action('enqueue_block_editor_assets', 'markdown_block_enqueue_block_editor_assets');

function render_markdown($attributes)
{
    $markdown = '';

    if (isset($attributes['content'])) {
        $content = $attributes['content'];
        // content is array of string
        foreach ($content as $line) {
            if (is_string($line)) {
                $markdown .= $line;
            }
            if (is_array($line)) {
                if (isset($line['type']) && $line['type'] === 'br') {
                    $markdown .= "\n";
                }
            }
        }
    }

    // Use GitHub Flavored Markdown(MarkdownExtra)
    $parser = new \cebe\markdown\MarkdownExtra();

    return $parser->parse($markdown);
}

register_block_type('markdown-block/markdown-block', array(
    'render_callback' => 'render_markdown',
));

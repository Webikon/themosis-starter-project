<?php

namespace App\Theme;

/**
 * Allow SVG upload
 */
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
});

/**
 * Wrap images with figure tag.
 * Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
 */
add_filter('the_content', function ($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure class="media">$1</figure>', $pee);

    return $pee;
}, 50);

/**
 * Customized the output of caption, you can remove the filter to restore back to the WP default output.
 * Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/
 */
add_filter('img_caption_shortcode', function ($output, $attr, $content) {
    /* We're not worried abut captions in feeds, so just return the output here. */
    if (is_feed()) {
        return $output;
    }

    /* Set up the default arguments. */
    $defaults = array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    );
    /* Merge the defaults with user input. */
    $attr = shortcode_atts($defaults, $attr);

    /* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
    if (1 > $attr['width'] || empty($attr['caption'])) {
        return $content;
    }

    /* Set up the attributes for the caption <div>. */
    $attributes = ' class="media ' . esc_attr($attr['align']) . '"';
    /* Open the caption <div>. */
    $output = '<figure' . $attributes . '>';
    /* Allow shortcodes for the content the caption was created for. */
    $output .= do_shortcode($content);
    /* Append the caption text. */
    $output .= '<figcaption class="media__caption">' . $attr['caption'] . '</figcaption>';
    /* Close the caption </div>. */
    $output .= '</figure>';

    /* Return the formatted, clean caption. */
    return $output;
}, 10, 3);

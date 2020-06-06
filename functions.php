<?php

/* 
   Recommended Style Enqueueing from parent:
   https://developer.wordpress.org/themes/advanced-topics/child-themes/ 
*/

add_action( 'wp_enqueue_scripts', 'twentyfourteen_ihr_enqueue_styles' );
function twentyfourteen_ihr_enqueue_styles() {
    $parenthandle = 'twentyfourteen-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}

?>

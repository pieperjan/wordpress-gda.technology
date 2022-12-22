<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementorChild
 */


/**
 * Enqueue styles
*/
function child_enqueue_styles() {
	wp_enqueue_style( 'basic-css', get_stylesheet_directory_uri() . '/Assets/css/basic.css','', '', 'all' );
	wp_enqueue_style( 'theme-css', get_stylesheet_directory_uri() . '/style.css');
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function prefix_footer_code() {
    wp_enqueue_script( 'basic-js', get_stylesheet_directory_uri() . '/Assets/js/basic.js', '', '', true );
}

add_action( 'wp_footer', 'prefix_footer_code' );

// ! Fonts per cdn einbinden Deaktivieren
add_filter( 'elementor/frontend/print_google_fonts', '__return_false' );

// ! wp_generator entfernen
remove_action('wp_head', 'wp_generator');

// !Ab der Version 4.4. steht in WordPress eine API-Schnittstelle zur Verf�gung. Falls du keine externen Tools nutzt, die Daten deines Blogs auslesen, dann deaktiviere diese Funktion:
remove_action( 'wp_head','rest_output_link_wp_head');
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');

// ! Diese Methode wird genutzt, um die Zugriffszeit zu optimieren, und ist recht sinnvoll. Falls du nicht die Ressourcen von wordpress.org nutzt und gerade �berlegst, was das sein sollte, dann kannst du getrost folgenden Code entfernen:
remove_action('wp_head', 'wp_resource_hints', 2);

// ! Falls du mit keinem externen Tool auf deinen Blog zugreifst, wie z. B. Windows Live Writer, dann k�nnen auch die folgenden Eintr�ge ohne Bedenken entfernt werden:
remove_action('wp_head', 'rsd_link'); 
remove_action( 'wp_head', 'wlwmanifest_link' );

// ! Nutzt du keine grafischen Emojis in deinem Blog, dann kannst du durch Entfernen dieser Funktion zus�tzlichen CSS-/JS-Code einsparen und damit auch Requests:
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


// ! Admin Bar ausblenden
add_filter(
    'show_admin_bar',
    '__return_false'
);

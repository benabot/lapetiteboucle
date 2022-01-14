<?php

/***
 *
 * FONCTIONNALITÉS DU SITES SUR LA BOUCLE 'INIT'
 *
 ***/
//** MENUS */
// function lpb_theme_menus()
// {
//     $location = array(
//         'primary' => "Menu principal",
//         'footer' => "Menu du pied de page"
//     );
//     register_nav_menus($location);
// }

// add_action('init', 'lpb_theme_menus');

/***
 *
 * FONCTIONNALITÉS DU SITES SUR LA BOUCLE 'AFTER SETUP'
 *
 ***/
// ** Theme support */
if (!function_exists('lpb_theme_setup')) {
    function lpb_theme_setup()
    {
        //** THEME SUPPORT */        
        add_theme_support('title-tag');
        add_theme_support(
            'custom-logo' // array : on peut personnaliser largeur et longueur ainsi que des tolérances pour le logo
        );
        add_theme_support('post-thumbnails');
        // add_theme_support('custom-background');
        add_theme_support('editor-color-palette');
        add_theme_support('custom-header');
        add_theme_support('automatic-feed-links');

        //** MENUS */
        register_nav_menus(
            array(
                'primary' => __('Primary menu'),
                'footer'  => __('Secondary menu'),
                'member'  => __('Member menu'),
            )
        );
    }

    add_action('after_setup_theme', 'lpb_theme_setup');
}

/***
 *
 * STYLES ET SCRIPTS
 *
 ***/

function lpb_theme_register_scripts() // TODO : 1.penser à minifier pour prod ; 
{
    // ** CSS **//
    //** */
    // Général
    wp_enqueue_style(
        'principal',
        get_template_directory_uri() . "/assets/css/style.css",
        array(),
        '1.0',
        'all'
    );
    // Print
    wp_enqueue_style(
        'print',
        get_template_directory_uri() . "/assets/css/print.css",
        array(),
        '1.0',
        'print'
    );

    //**  JS   **//
    wp_enqueue_script(
        'main',
        get_template_directory_uri() . '/assets/js/script.js',
        array(),
        '1.0',
        true
    );

    //** NETTOYAGE */
    wp_deregister_script('wp-embed');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    wp_dequeue_style('wp-block-library'); // ATTENTION => Gutenberg
    /**
     * Remove dashicons CSS from the page, only load if user is logged in
     */

    // if (!is_user_logged_in()) {
    //     global $wp_styles;
    //     wp_dequeue_style('dashicons');
    //     // wp_deregister_style('dashicons') causes internal PHP errors in WordPress !
    //     $wp_styles->registered['dashicons']->src = '';
    // }
}

add_action('wp_enqueue_scripts', 'lpb_theme_register_scripts');

/***
 *
 * VVIDGETS
 *
 ***/
function lpb_theme_widgets_init()
{

    register_sidebar(
        array(
            'name'          => esc_html__('Footer', 'lpb_theme'),
            'id'            => 'footerbar-1',
            'description'   => esc_html__('Add widgets here to appear in your footer.', 'lpb_theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Barre latérale', 'lpb_theme'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'lpb_theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action('widgets_init', 'lpb_theme_widgets_init');


/***
 *
 * DIVERS
 *
 ***/

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}, 10, 4);

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
add_action('admin_head', 'fix_svg');



/**
 * Add "is-IE" class to body if the user is on Internet Explorer.
 *
 */
function lpb_theme_add_ie_class()
{
?>
    <script>
        if (-1 !== navigator.userAgent.indexOf('MSIE') || -1 !== navigator.appVersion.indexOf('Trident/')) {
            document.body.classList.add('is-IE');
        }
    </script>
<?php
}
add_action('wp_footer', 'lpb_theme_add_ie_class');

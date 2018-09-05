<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * TODO: Import ACF-fields
 */
new \App\Acf\Import();

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    
    if (basename(get_page_template()) != "template-activities.blade.php" && 
        basename(get_page_template()) != "st-template-landing.blade.php" &&
        basename(get_page_template()) != "st-template-all-activities.blade.php") {
        wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
        wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
    }

    if(basename(get_page_template()) == "template-activities.blade.php") {
        wp_enqueue_script('sage/vue.js', asset_path('scripts/vue.js'), null, null, true);
        wp_enqueue_style('sage/vue.css', asset_path('styles/vue.css'), false, null);
    }

    if (basename(get_page_template()) == "st-template-landing.blade.php" ||
        basename(get_page_template()) == "st-template-all-activities.blade.php" ||
        basename(get_page_template()) == "st-template-map.blade.php") {
        wp_enqueue_script('sage/skordetider.js', asset_path('scripts/skordetider.js'), ['jquery'], null, true);
        wp_enqueue_style('sage/skordetider.css', asset_path('styles/skordetider.css'), false, null);
    }

}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');


    /** Removes Emoji and other bloated scripts from WP_HEAD **/
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');


    /** Remove WPML Legacy Dropdown **/

    define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
    define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
    define('ICL_DONT_LOAD_LANGUAGES_JS', true);

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'visithalland'),
        'support_navigation' => __('Support Navigation', 'visithalland'),
        'skordetider_navigation' => __('Skördetider Navigation', 'visithalland')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);




add_action( 'admin_menu', function() {


    // Adds menu group for Custom Post Types
    add_menu_page('Skapa innehåll','Skapa innehåll', 'administrator' , 'create_content', '', 'dashicons-welcome-write-blog' , 10 );

    if (!function_exists('acf_add_options_page')) {
        return false;
    }
    

    // Adds Theme Options Page 

    $themeOptionsCapability = 'administrator';
    $themeOptionsParent = 'themes.php';

    global $submenu;
    
    $submenu[$themeOptionsParent][] = array( 
        '', 
        'read', 
        '', 
        '', 
        'wp-menu-separator'
    );

    acf_add_options_sub_page(array(
        'page_title'    => __('Temainställningar', 'visithalland'),
        'menu_title'    => __('Temainställningar', 'visithalland'),
        'parent_slug'   => $themeOptionsParent,
        'capability'    => $themeOptionsCapability,
        'redirect'      => false
    ));
});

/**
 * Register sidebars
 */
/*add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});*/

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

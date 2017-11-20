<?php

/**
 * Plugin Name: NGINX FastCGI cache purge
 * Version: 0.1
 * Description: Flush NGINX FastCGI cache purge
 * Author: The Shipyard Crew
 * Author URI: https://theshipyard.se/
 * Plugin URI: https://theshipyard.se/
 * Text Domain: nginx-fastcgi-cache-purge
 * @package NGINX FastCGI cache purge
 */

if ( ! defined( 'NGINX_CACHE_PATH' ) ) {
    define( 'NGINX_CACHE_PATH', '/var/run/nginx-cache/' );
}

final class NGINX_FastCGI_cache_purge {

    public static $instance = null;

    private function __construct() {
        add_action( 'edit_post', [ $this, 'purge_cache' ] );
    }


    /**
     * Creates or returns an instance of this class.
     *
     * @return A single instance of this class.
     */
    public static function init() {
        if ( self::$instance === null ) {
            self::$instance = new self;
        }

        return self::$instance;
    }


    /**
     * Purge a page from the NGINX FastCGI cache.
     *
     * @param int $post_id WP_Post ID.
     */
    public function purge_cache() {
        array_map('unlink', glob("/var/run/nginx-cache/*/*/*"));
        array_map('rmdir', glob("/var/run/nginx-cache/*/*"));
        array_map('rmdir', glob("/var/run/nginx-cache/*"));
    }

}

NGINX_FastCGI_cache_purge::init();


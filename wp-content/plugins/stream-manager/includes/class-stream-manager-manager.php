<?php
/**
 * Stream Manager.
 *
 * @package   StreamManagerManager
 * @author    Upstatement
 * @license   GPL-2.0+
 * @link      http://upstatement.com
 * @since     1.1
 * @copyright 2015 Upstatement
 */

class StreamManagerManager {

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Instance of StreamManager.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	public $plugin = null;

	/**
	 * Initialize the plugin
	 *
	 * @since     1.1.0
	 */
	private function __construct() {
		$this->plugin = StreamManager::get_instance();
		$this->plugin_slug    = $this->plugin->get_plugin_slug();
		$this->post_type_slug = $this->plugin->get_post_type_slug();

		// Saving Posts (= updating streams)
		add_action( 'transition_post_status', array( $this, 'on_save_post' ), 10, 3 );
		add_action( 'publish_future_post', function($post_id) {
			$post = get_post($post_id);
			$this->on_save_post('publish', 'future', $post);
		}, 10, 1);

	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.1.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}


	/**
	 * Update streams whenever any post status is changed
	 *
	 * @since     1.1.0
	 *
	 * @param     string  $new   new post status
	 * @param     string  $old   old post status
	 * @param     object  $post  WordPress post object
	 */
	public function on_save_post( $new, $old, $post ) {
		if ( $post->post_type == 'sm_stream' ) return;

		if ( $old == 'publish' && $new != 'publish' ) {
			// Remove from streams
			$streams = $this->plugin->get_streams();
			foreach ( $streams as $stream ) {
				$stream->remove_post( $post->ID );
			}
		}

		if ( $old != 'publish' && $new == 'publish' ) {
			//seems weird, but it's necessary for ACF
			//and potentially other plugins
			//we can't be sure what actions have been added
			//so checking for infinite loop-type bugs isn't possible
			do_action('save_post', $post->ID, $post, true );
			remove_all_actions('save_post');
			// Add to streams
			$streams = $this->plugin->get_streams();
			foreach ( $streams as $stream ) {
				$stream->insert_post( $post->ID );
			}
		}
	}


}

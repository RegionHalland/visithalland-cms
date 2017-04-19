<?php
/**
 * Stream Manager.
 *
 * @package   StreamManagerAjaxHelper
 * @author    Chris Voll + Upstatement
 * @license   GPL-2.0+
 * @link      http://upstatement.com
 * @copyright 2014 Upstatement
 */

/**
 * @package StreamManagerAjaxHelper
 * @author  Chris Voll + Upstatement
 */

class StreamManagerAjaxHelper { 

	/**
	 * Retrieves and compiles templates for from queue
	 *
	 * @since     1.0.0
	 *
	 * @param     array   $queue  postid and position of post to be added
	 *
	 * @return    array   $output post positions, rendered stubs
	 */
	public static function retrieve_posts($queue) {
		$output = array();

		foreach($queue as $i => $item) {
			$post = new TimberPost( $item['id'] );
			if ( !$post ) continue;
			$post->pinned = false;
			$output[ $item['id'] ] = array(
				'position' => $item['position'],
				'object' => Timber::compile('views/stub.twig', array(
					'post' => $post
				))
			);
		}
		return $output;
	}

	/**
	 * Searches posts for 'Add New' autocomplete
	 *
	 * @since     1.0.0
	 *
	 * @param     string   $query  search term
	 * @param 	  int      $stream_id  post id of current stream
	 *
	 * @return    array   $output  posts w/ ids, date, title, human time diff 
	 */
	public static function search_posts( $query, $stream_id ) {
		$defaults = array(
			's' => $query,
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 10
		);
		$stream = new TimberStream($stream_id);
		$args = array_merge( $defaults, $stream->get( 'query' ) );

		$posts = Timber::get_posts( $args );

		$output = array();

		foreach ( $posts as $post ) {
			$output[] = array(
				'id' => $post->ID,
				'title' => $post->title,
				'date' => $post->post_date,
				'human_date' => human_time_diff( strtotime( $post->post_date ) )
			);
		}
		return $output;
	}

}
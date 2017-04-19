<?php
/**
 * Stream Manager.
 *
 * @package   StreamManagerUtilities
 * @author    Chris Voll + Upstatement
 * @license   GPL-2.0+
 * @link      http://upstatement.com
 * @copyright 2014 Upstatement
 */

/**
 * @package StreamManagerUtilities
 * @author  Chris Voll + Upstatement
 */

class StreamManagerUtilities { 
	

	/**
	 * Convert comma-separated list of terms to term IDs
	 *
	 * @since     1.0.0
	 *
	 * @param     string   $taxonomy        taxonomy slug (category, post_tag, etc.)
	 * @param     string   $terms           comma-separated list of term slugs
	 * @param     boolean  $return_objects  return term objects if true, IDs if false
	 *
	 * @return    array   array of term IDs
	 */
	public static function parse_terms( $taxonomy, $terms, $return_objects = false ) {
		if ( !is_array($terms) ) $terms = explode( ",", $terms );

		$output = array();

		foreach ( $terms as &$term ) {
			$term = trim($term);
			$term_object = get_term_by( 'name', $term, $taxonomy );
			if ( !$term_object ) $term_object = get_term_by( 'slug', $term, $taxonomy );
			if ( !$term_object ) continue;
			$output[] = $term_object->term_id;
		}

		return $return_objects ? $terms : $output;
	}

	public static function build_tax_query( $taxonomies ) {
		$output = array('relation' => 'OR');
		foreach ( $taxonomies as $taxonomy => $terms ) {
			if ( !$terms ) continue;

			$terms = is_array($terms) ? $terms : self::parse_terms( $taxonomy, $terms );
			foreach ( $terms as $i => $term ) {
				if ( empty( $term ) ) unset( $terms[$i] );
			}

			if ( !empty($terms) ) {
				$output[] = array(
					'taxonomy' => $taxonomy,
					'field' => 'term_id',
					'terms' => $terms
				);
			}
		}
		return $output;
	}

}
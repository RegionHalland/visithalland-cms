<?php

function register_my_menu() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'secondary-menu' => __( 'Secondary menu' ),
    )
  );
}
add_action( 'init', 'register_my_menu' );

?>
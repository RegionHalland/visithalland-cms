<?php
/* Remove menus not needed */
function remove_menus(){
  remove_menu_page( 'edit.php' ); // Posts
  remove_menu_page( 'edit-comments.php' ); // Comments
  
}
add_action( 'admin_menu', 'remove_menus' );

?>
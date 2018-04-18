<address class="author col-11 mx-auto mt4 mb4">
	<div>
	    <amp-img 
	        src="<?php echo get_field('profile_image', 'user_'. $author_id)["sizes"]["vh_profile@2x"] ?>"
	        alt="<?php _e('Skrivet av', 'visithalland') ?> <?php the_author_meta('display_name') ?>"
			width="50"
			height="50"
	        class="author__img"
	    >
    </div>
    <div class="author__bio ml2">
        <span class="block author__name"><?php the_author_meta('display_name') ?></span>
        <span class="block author__title"><?php echo get_field('role', 'user_'. $author_id) ?></span>
    </div>
</address>
<div class="next-post-link">
    <div id="nextPages" data-all='<?php //echo json_encode(vh_get_next_previous_link()) ?>'></div>
</div>

<!-- Working on infinite scroll feedback -->
<div class="container">
    <!-- <div class="infinite-scroll">

    </div> -->
    <div class="page-load-status">
        <p class="infinite-scroll-request"><?php _e( 'Hämtar nästa artikel', 'visithalland' ); ?></p>
        <p class="infinite-scroll-last"><?php _e( 'Slut på innehåll', 'visithalland' ); ?></p>
        <p class="infinite-scroll-error"><?php _e( 'Kunde inte hitta fler artiklar', 'visithalland' ); ?></p>
    </div>
</div>
 <!--- End Infinite Scroll -->

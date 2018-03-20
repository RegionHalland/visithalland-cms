<div class="next-post-link">
    <div id="nextPages" data-all='{{ json_encode(App::getNextPostLink()) }}'></div>
</div>

<div class="container">
    <!-- <div class="infinite-scroll">

    </div> -->
    <div class="page-load-status">
        <p class="infinite-scroll-request"><?php _e( 'Hämtar nästa artikel', 'visithalland' ); ?></p>
        <p class="infinite-scroll-last"><?php _e( 'Slut på innehåll', 'visithalland' ); ?></p>
        <p class="infinite-scroll-error"><?php _e( 'Kunde inte hitta fler artiklar', 'visithalland' ); ?></p>
    </div>
</div>

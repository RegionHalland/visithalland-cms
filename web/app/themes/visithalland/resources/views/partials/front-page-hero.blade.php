@php
    while ( have_posts() ) : the_post();
    $thumbnail_id = get_post_thumbnail_id();
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
@endphp

    <article class="scrim overflow-hidden aspect-container aspect-1 md-aspect-16x9 relative hiking-biking">
        <picture>
            <source media="(min-width:60em)"
                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-1920x1080.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-1920x1080.jpg 2x"" />
            <source
                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-800x800.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-800x800.jpg 2x"" />
            <img class="absolute left-0 top-0 w-fill lazyload"
                data-src="https://www.visithalland.com/app/uploads/2018/08/B9064260-1920x1080.jpg"
            />
        </picture>
        <div class="z4 absolute container col-12 sm-col-11 md-col-12 flex justify-end flex-column top-0 mx-auto bottom-0 right-0 left-0 px3 md-px0 pb6">
            <div class="">
                <header class="bg-theme rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
                    @php _e( 'Populärt just nu', 'visithalland' ) @endphp
                </header>
            </div>
            <h1 class="text-light text-shadow">Cykla & Vandra i Halland</h1>
            <div>
                <a href="">
                    <div class="px2 py2 bg-theme topographic-pattern-dark rounded items-center inline-flex mt3">
                        <span class="rift-font my2 ml2 bold text-base light">
                            @php _e( 'Gå till', 'visithalland' ); @endphp
                            cykel & vandring
                        </span>
                        <svg class="icon--sm mx2">
                            <use xlink:href="#arrow-right-icon"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </article>
 @endwhile
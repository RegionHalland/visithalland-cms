<div class="concept-sidebar col col-12 lg-col-4">
    {{-- Gets And Loops Happenings Date Descending --}}
    @php $concept_happenings = App::getHappenings(10, $term) @endphp
    @if(is_array($concept_happenings))
        <div class="concept-sidebar__happenings mxn2 mt3 clearfix">
        @foreach($concept_happenings as $key => $happening)
            <article class="happening-list-item col col-12 sm-col-6 lg-col-12 px2 mb3 {{ $happening->terms["terms_default_lang"]->slug }}">
                <a href="{{ get_permalink($happening->ID) }}" title="{{ $happening->post_title }}" class="link-reset">
                    <div class="clearfix">
                        <div class="col col-5 sm-col-4 ">
                            <div class="happening-list-item__img-container topographic-pattern relative">
                                <picture>
                                    <source
                                        data-srcset="{{ get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail@2x' ) . " 2x" }}" />
                                    <img class="happening-list-item__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail' ) }}"
                                        alt="{{ get_field("cover_image")["alt"] }}"
                                    />
                                </picture>
                            </div>
                        </div>
                        <div class="happening-list-item__date">
                            <div class="date-badge">
                                <span class="date-badge__day">{{ $dateobj = date("j", strtotime(get_field("start_date", $happening->ID))) }}</span>
                                <span class="date-badge__month">{{ $dateobj = date("M", strtotime(get_field("start_date", $happening->ID))) }}</span>
                            </div>
                        </div>
                        <div class="happening-list-item__content col col-7 sm-col-8">
                            <span class="happening-list-item__title">{{ $happening->post_title }}</span>
                            <div class="read-more mt3">
                                <span class="read-more__text">
                                    @php _e( 'Läs mer', 'visithalland' ); @endphp
                                </span>
                                <div class="read-more__button">
                                    <svg class="icon read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </article>
        @endforeach
        </div>
    @endif

    {{-- Gets And Loops Navigation Items By Menu Order --}}
    @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
    @if(is_array($primary_navigation_items))
        <div class="concept-sidebar__concepts mxn2 mt3 clearfix">
            @foreach($primary_navigation_items as $key => $navigation_item)
                <div class="concept-thumbnail px2 col col-12 sm-col-6 lg-col-12 mt3 block {{ App::getTermClassName() }}">
                    <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title }}" class="link-reset">
                        <div class="concept-thumbnail__img-container">
                            <div class="concept-thumbnail__icon"></div>
                            <picture>
                                <source
                                    data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] . " 2x" }}" />
                                <img class="concept-thumbnail__img lazyload" data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium_square@2x"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}" />
                            </picture>
                            <div class="concept-thumbnail__inner">
                                <h2 class="concept-thumbnail__title">
                                    {{ $navigation_item->post_title }}
                                </h2>
                                <div class="read-more my3">
                                    <span class="read-more__text light">
                                        @php _e( 'Läs mer', 'visithalland' ); @endphp
                                    </span>
                                    <div class="read-more__button">
                                        <svg class="icon read-more__icon">
                                            <use xlink:href="#arrow-right-icon"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
        </div>
    @endif
</div>

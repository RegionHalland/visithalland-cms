<div class="concept-sidebar col col-12 lg-col-4 mb4">
    {{-- Gets And Loops Happenings Date Descending --}}

    @if(isset($top_lists))
        <header class="bg-blue rift-font text-sm bold px3 py2 mt2 rounded-pill inline-block text-light">
            @php _e( 'Våra tips', 'visithalland' ) @endphp
        </header>
        @foreach($top_lists as $top_list)
            <div class="col col-12 sm-col-6 md-col-12 mt3 mb3">
                @include('partials.components.top-list')
            </div>
        @endforeach
    @endif

    @if(is_array($happenings))
        @foreach($happenings as $key => $happening)
            @include('partials.happening-list-item')
        @endforeach
    @endif

    {{-- Gets And Loops Navigation Items By Menu Order --}}
    @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
    @if(is_array($primary_navigation_items))
        <div class="concept-sidebar__concepts mxn2 mb3 clearfix">
            <header class="section-header block px2 mt2 coastal-living">
                <div class="section-header__icon-wrapper">
                    <svg class="section-header__icon icon">
                        <use xlink:href="#discover-icon"/>
                    </svg>
                </div>
                <div class="section-header__title">
                    @php _e( 'Mer av Halland', 'visithalland' ) @endphp
                </div>
            </header>
            @foreach($primary_navigation_items as $key => $navigation_item)
                <div class="concept-thumbnail px2 col col-12 sm-col-6 lg-col-12 mt3 block {{ $navigation_item->meta_fields['class_name'] }}">
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

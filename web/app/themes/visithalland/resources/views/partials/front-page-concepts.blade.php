{{-- Get Concepts for grid --}}
@php $primary_navigation_items = App::getPrimaryNavigation() @endphp

@if(is_array($primary_navigation_items))

    <section class="mt2 container col-11 md-col-10 lg-col-10 mx-auto">
        <header class="section-header coastal-living block my4">
            <div class="section-header__icon-wrapper">
                <svg class="section-header__icon icon">
                    <use xlink:href="#recommend-icon"/>
                </svg>
            </div>
            <div class="section-header__title">
                @php _e( 'Upptäck det bästa av Halland', 'visithalland' ); @endphp
            </div>
            <div class="section-header__title">
                @php _e( 'Upptäck det bästa av Halland', 'visithalland' ); @endphp
            </div>
        </header>
        <div class="featured-grid clearfix">
            @php $primary_navigation_items = App::getPrimaryNavigation() @endphp
            @foreach($primary_navigation_items as $key => $navigation_item)
                {{-- Gets first item in array --}}
                @if($loop->iteration == 1)
                    <div class="featured-grid__item featured-grid__item--large col col-12 sm-col-12 lg-col-8">
                        <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title }}">
                            <article class="image-blurb {{ $navigation_item->meta_fields['class_name'] }}">
                                <picture>
                                    <source media="(min-width:40em)"
                                        data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large@2x"] . " 2x" }}" />
                                        <source
                                            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium@2x"] . " 2x" }}" />
                                        <img class="image-blurb__img lazyload" data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h2 class="image-blurb__title">{{ $navigation_item->post_title }}</h2>
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
                            </article>
                        </a>
                    </div>

                {{-- Gets second and third item in array --}}
                @elseif($loop->iteration > 1 && $loop->iteration <= 3)
                    <div class="featured-grid__item featured-grid__item--medium col col-12 sm-col-6 lg-col-4">
                        <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title }}">
                            <article class="image-blurb {{ $navigation_item->meta_fields['class_name'] }}">
                                <picture>
                                    <source media="(min-width:40em)"
                                        data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large@2x"] . " 2x" }}" />
                                        <source
                                            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium@2x"] . " 2x" }}" />
                                        <img class="image-blurb__img lazyload" data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h2 class="image-blurb__title">{{ $navigation_item->post_title }}</h2>
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
                            </article>
                        </a>
                    </div>

                {{-- Loops remaining items as small --}}
                @else
                    <div class="featured-grid__item featured-grid__item--small col col-12 sm-col-6 lg-col-4">
                        <a href="{{ $navigation_item->url }}" title="{{ $navigation_item->post_title }}">
                            <article class="image-blurb {{ $navigation_item->meta_fields['class_name'] }}">
                                <picture>
                                    <source media="(min-width:40em)"
                                        data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large@2x"] . " 2x" }}" />
                                        <source
                                            data-srcset="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium"] . " 1x," . $navigation_item->meta_fields["cover_image"]["sizes"]["vh_medium@2x"] . " 2x" }}" />
                                        <img class="image-blurb__img lazyload" data-src="{{ $navigation_item->meta_fields["cover_image"]["sizes"]["vh_large"] }}" alt="{{ $navigation_item->meta_fields["cover_image"]["alt"] }}" />
                                </picture>
                                <div class="image-blurb__content">
                                    <h2 class="image-blurb__title">{{ $navigation_item->post_title }}</h2>
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
                            </article>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endif

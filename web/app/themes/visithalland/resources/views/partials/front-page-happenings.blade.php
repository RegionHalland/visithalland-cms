@php $header_happenings = App::getHappenings(3) @endphp

    @if(is_array($header_happenings))
    <section class="landing-happenings container clearfix mt3 col-11 md-col-10 lg-col-10 mx-auto">
            <div class="landing-happenings__header py3 flex justify-between items-center ">
                <header class="section-header inline-block coastal-living">
                    <div class="section-header__icon-wrapper">
                        <svg class="section-header__icon icon">
                            <use xlink:href="#calendar-icon"/>
                        </svg>
                    </div>
                    <div class="section-header__title">
                        @php _e( 'Kul happenings', 'visithalland' ); @endphp
                    </div>
                </header>
                <a href="{{ get_permalink( apply_filters( 'wpml_object_id', get_page_by_path('happenings')->ID, 'page')) }}" class="btn btn--primary coastal-living inline-block right">@php _e( 'Visa fler', 'visithalland' ); @endphp</a>
            </div>

            @foreach($header_happenings as $key => $happening)
                <div class="col col-12 sm-col-4 mt3">
                    <article class="happening-list-item {{ App::getTerms($happening)["terms_default_lang"]->slug }}">
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
                                <div class="happening-list-item__content col col-7 sm-col-8 pr2">
                                    <h4 class="">{{ $happening->post_title }}</h4>
                                    <div class="read-more mt2">
                                        <span class="read-more__text">
                                            @php _e('Läs mer', 'visithalland') @endphp
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
                </div>
            @endforeach
        </section>
    @endif
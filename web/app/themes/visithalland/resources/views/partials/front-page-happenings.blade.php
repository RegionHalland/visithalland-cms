@php $concept_happenings = App::getHappenings(4) @endphp
@if(is_array($concept_happenings))
    @foreach($concept_happenings as $key => $happening)
        <article class="happening-list-item mb3 {{ $happening->terms["terms_default_lang"]->slug }}">
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
@endif
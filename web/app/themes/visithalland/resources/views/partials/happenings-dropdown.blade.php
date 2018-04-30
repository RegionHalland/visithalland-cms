<div class="header__happenings">
    @php $header_happenings = App::getHappenings() @endphp
    @if(is_array($header_happenings))
        <button class="happenings__dropdown-button has-happenings icon-button">
            <svg class="icon icon-button__icon">
                <use xlink:href="#calendar-icon"/>
            </svg>
        </button>
    <div class="happenings__dropdown">
        <div class="happenings__dropdown-inner p3">
            @foreach($header_happenings as $key => $happening)
                @php 
                    $thumbnail_id = get_post_thumbnail_id($happening->ID);
                @endphp
                <article class="happening-list-item mb3 {{ $happening->terms["terms_default_lang"]->slug }}">
                    <a href="{{ get_permalink($happening->ID) }}" class="link-reset">
                        <div class="clearfix">
                            <div class="col col-5 sm-col-4 ">
                                <div class="happening-list-item__img-container topographic-pattern relative">
                                    <picture>
                                        <source
                                            data-srcset="{{ get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail' ) . " 1x," . get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail@2x' ) . " 2x" }}" />
                                        <img class="happening-list-item__img lazyload"
                                            data-src="{{ get_the_post_thumbnail_url( $happening->ID, 'vh_thumbnail' ) }}"
                                            alt="{{get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true)}}"
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
            @endforeach
            <a href="{{ get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("happenings")->ID, 'page' ) ) }}" class="btn btn--primary block coastal-living center">
                <?php _e( 'Visa fler', 'visithalland' ); ?>
            </a>
        </div>
    </div>
    @endif
</div>

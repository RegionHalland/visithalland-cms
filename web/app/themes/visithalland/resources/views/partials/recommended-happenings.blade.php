<div class="recommended-articles col-11 md-col-10 lg-col-10 mx-auto">
    <div class="clearfix mxn2">
        <h2 class="recommended-articles__title mx-auto mb2 center">@php _e('Fler events vi tror du gillar', 'visithalland') @endphp</h2>
        @php
            $recommended_happenings = App::getHappenings();
        @endphp
        @if(is_array($recommended_happenings))
            @foreach($recommended_happenings as $key => $value)
                <article class="article-medium mt3 px2 col col-12 sm-col-4 md-col-4 {{ $value->terms["terms_default_lang"]->slug }}">
                    <a href="{{ get_permalink($value->ID) }}" class="link-reset">
                        <div class="article-medium__img-container topographic-pattern">
                            <div class="date-badge absolute top-0 left-0 ml2 mt2 z3">
                                <span class="date-badge__day"><?php echo $dateobj = date("j", strtotime(get_field("start_date", $value->ID))); ?></span>
                                <span class="date-badge__month"><?php echo $dateobj = date("M", strtotime(get_field("start_date", $value->ID))); ?></span>
                            </div>
                            <picture>
                                <source
                                    data-srcset="{{ get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) . " 1x," . get_the_post_thumbnail_url( $value->ID, 'vh_medium@2x' ) . " 2x" }}" />
                                <img class="article-medium__img lazyload"
                                        data-src="{{ get_the_post_thumbnail_url( $value->ID, 'vh_medium' ) }}"
                                        alt="{{ get_field("cover_image")["alt"] }}"
                                />
                            </picture>
                        </div>
                        <div class="article-medium__content">
                            <h3 class="article-medium__title mb1 mt3 pt0">{{ $value->post_title }}</h3>
                            <p class="article-medium__excerpt mt2">{{ get_field("excerpt", $value->ID) }}</p>
                            <div class="read-more mt3">
                                <span class="read-more__text">{{ _e( 'Läs mer', 'visithalland' ) }}</span>
                                <div class="read-more__button">
                                    <svg class="icon read-more__icon">
                                        <use xlink:href="#arrow-right-icon"/>
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </a>
                </article>
            @endforeach
        @endif
    </div>
</div>

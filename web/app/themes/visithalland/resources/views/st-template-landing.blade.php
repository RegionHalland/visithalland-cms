{{--
  Template Name: Landing Skordetider
--}}

@extends('layouts.skordetider')

@section('content')

@php($page_id = get_page_by_path('skordetid-i-halland/allt-som-skordetid-i-halland-har-att-erbjuda')->ID)

<header class="st-list__header flex items-center">
	<div class="container col-11 sm-col-8 md-col-7 lg-col-6 mx-auto center relative">
		<img
			class="st-list__title"
			src="@asset('images/st-logo-large.svg')"
			alt="Visithalland.com" />
			<div class="col-12 sm-col-8 md-col-6 flex items-center mx-auto mt5">
				<div class="col col-12 md-col-6">
					<button class="btn block st-cta-button">Se höstens highligts</button>
				</div>
				<div class="col col-12 md-col-6">
					<a href="{{the_permalink($page_id)}}" class="block">
						<div class="read-more my3">
                            <span class="read-more__text light">
                                Utforska allt
                            </span>
                            <div class="read-more__button">
                                <svg class="icon read-more__icon">
                                    <use xlink:href="#arrow-right-icon"/>
                                </svg>
                            </div>
                        </div>
                    </a>
				</div>
			</div>
	</div>
</header>
	
@include('partials.st-carousel')

@foreach (get_field('timeline') as $week)
	@include('partials.st-week')
@endforeach

@endsection
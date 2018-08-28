{{--
  Template Name: Tips & Guider
--}}

@extends('layouts.app')

@section('content')

	@include('partials.page.page-header')

	<div class="container col-11 md-col-10 pb4" role="main" id="main-content">

		<div class="content-grid__container pt4">

			<div class="content-grid__content">
				
				<!-- Insert Featured Articles -->
				<header class="bg-blue rift-font text-sm bold px3 py2 mb3 rounded-pill inline-block text-light">
					@php _e( 'Populära guider', 'visithalland' ) @endphp
				</header>

				<a href="" title="" class="mb3">
                    <article class="scrim overflow-hidden aspect-container aspect-1 sm-aspect-16x9 relative rounded">
                        <picture>
                            <source media="(min-width:40em)"
                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-1920x1080.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-1920x1080.jpg 2x"" />
                            <source
                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-800x800.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-800x800.jpg 2x"" />
                            <img class="absolute left-0 top-0 w-fill lazyload"
                                data-src="https://www.visithalland.com/app/uploads/2018/08/B9064260-1920x1080.jpg"
                            />
                        </picture>
                        <div class="z4 absolute flex justify-end flex-column top-0 bottom-0 right-0 left-0 p3">
                            <h2 class="text-light">En riktigt schysst artikel</h2>
                            <div class="read-more mt3">
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

			<div class="content-grid__sidebar mxn3">
				<div class="col-12 px3">
					<header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
						@php _e( 'Redaktionens tips', 'visithalland' ) @endphp
					</header>
				</div>
				<div class="col col-12 sm-col-6 md-col-12 mt3 mb3 px3">
					@include('partials.components.editor-picks')
				</div>
			</div>

			<div class="content-grid__bottom-content">
				
				<header class="bg-blue rift-font text-sm bold px3 py2 rounded-pill inline-block text-light">
					@php _e( 'Mer innehåll', 'visithalland' ) @endphp
				</header>

				
				<div class="clearfix mxn3">
					<div class="col col-12 sm-col-6 px3 mt3">

						<a href="" title="" class="mb3">
		                    <article class="">
		                    	<div class="overflow-hidden aspect-container aspect-3x2 relative rounded">
			                        <picture>
			                            <source media="(min-width:40em)"
			                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 2x"" />
			                            <source
			                                data-srcset="https://www.visithalland.com/app/uploads/2018/08/B9064260-400x350.jpg 1x, https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg 2x"" />
			                            <img class="absolute left-0 top-0 w-fill lazyload"
			                                data-src="https://www.visithalland.com/app/uploads/2018/08/B9064260-900x600.jpg"
			                            />
			                        </picture>
		                        </div>
		                        <h3 class="mt3">En riktigt schysst artikel</h3>
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
		                    </article>
		                </a>

	                </div>
                </div>
			</div>
		</div>
	</div>




@endsection

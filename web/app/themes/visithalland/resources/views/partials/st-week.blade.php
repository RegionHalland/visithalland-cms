@if(isset($week))
<div class="st-week">
	<header class="st-week-header">
		<div class="container">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col col-12 sm-col-2">
					<div class="st-timeline__badge">
						<div class="date-badge">
							@php
								$dateStart = new DateTime($week['date_start']);
								$dateEnd = new DateTime($week['date_end']);
							@endphp
						    <span class="date-badge__day">{{ $dateStart->format('d') }}-{{ $dateEnd->format('d') }}</span>
						    <span class="date-badge__month">{{ $dateEnd->format('M') }}</span>
						</div>
					</div>
					<div class="st-timeline__line first"></div>
				</div>
				<div class="st-week-header__content  col col-12 sm-col-5">
					<h2 class="h1 mb2">{{ $week['title'] }}</h2>
					<p>{{ $week['description'] }}</p>
				</div>
			</div>
		</div>
	</header>
	<div>
		<div class="container">
			<div class="clearfix flex flex-wrap">
				<div class="st-timeline col col-12 sm-col-2">
					<div class="st-timeline__line"></div>
				</div>
				<div class="col col-12 sm-col-10 mb4 st-week-grid">
					<div class="col col-12 sm-col-6">
						GRID ITEM
					</div>
					<div class="col col-12 sm-col-6">
						GRID ITEM
					</div>
					<div class="col col-12">
						GRID ITEM
					</div>
					<div class="col col-12 sm-col-6">
						GRID ITEM
					</div>
					<div class="col col-12 sm-col-6">
						GRID ITEM
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif
<div class="bg-theme inline-flex px-2 py-1 mb-2 rounded">
    <div>
        <span class="text-white font-rift text-sm font-bold">{{ $start_date_day }}</span>
        <span class="text-white font-rift text-sm font-bold">{{ $start_date_month }}</span>
    </div>
    @if(isset($end_date_day) && $end_date_day !== $start_date_day && $end_date_month !== $start_date_month )
        <span class="mx-2 text-white rift-soft">-</span>
        <div>
            <span class="text-white font-rift text-sm font-bold">{{ $end_date_day }}</span>
            <span class="text-white font-rift text-sm font-bold">{{ $end_date_month }}</span>
        </div>
    @endif
</div>
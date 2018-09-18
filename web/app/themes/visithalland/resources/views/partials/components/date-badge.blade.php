@if(get_field("start_date"))
    <div class="bg-theme inline-flex px2 py1 mb2 rounded absolute top-0 left-0 ml2 mt2 z3">
        <div>
            <span class="text-light rift-font text-base bold">{{ $dateobj = date("j", strtotime(get_field("start_date"))) }}</span>
            <span class="text-light rift-font text-base bold">{{ $dateobj = date("M", strtotime(get_field("start_date"))) }}</span>
        </div>
        <span class="mx1 text-light rift-soft">-</span>
        <div>
            <span class="text-light rift-font text-base bold">{{ $dateobj = date("j", strtotime(get_field("end_date"))) }}</span>
            <span class="text-light rift-font text-base bold">{{ $dateobj = date("M", strtotime(get_field("end_date"))) }}</span>
        </div>
    </div>
@endif
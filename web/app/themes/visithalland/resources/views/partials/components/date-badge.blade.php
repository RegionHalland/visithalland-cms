@if(get_field("start_date"))
    <div class="bg-theme inline-flex px-2 py-1 mb-2 rounded absolute pin-t pin-l ml-2 mt-2 z-30">
        <div>
            <span class="text-white font-rift text-base font-bold">{{ $dateobj = date("j", strtotime(get_field("start_date"))) }}</span>
            <span class="text-white font-rift text-base font-bold">{{ $dateobj = date("M", strtotime(get_field("start_date"))) }}</span>
        </div>
        <span class="mx1 text-white rift-soft">-</span>
        <div>
            <span class="text-white font-rift text-base font-bold">{{ $dateobj = date("j", strtotime(get_field("end_date"))) }}</span>
            <span class="text-white font-rift text-base font-bold">{{ $dateobj = date("M", strtotime(get_field("end_date"))) }}</span>
        </div>
    </div>
@endif
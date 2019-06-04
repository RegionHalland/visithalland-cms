<div class="block mt-6">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full sm:flex-1 px-3 mb-3 sm:mb-0">
            @map(['classes' => 'w-full h-64 sm:h-96'])@endmap
        </div>
        <div>
            <div class="flex sm:flex-col px-3 mb-6 -mt-3">
                @if(get_field("google_information"))
                        <div class="pr-3 sm:pr-0">
                        @button([
                            'title' => 'Visa på karta', 
                            'target' => '_blank',
                            'url' => '', 
                            'classes' => 'bg-blue text-white', 
                            'id' => 'js-map-link', 
                            'icon' => "pin-icon"
                        ])
                        @endbutton
                        </div>
                        @button([
                            'title' => 'Gå till webbplats', 
                            'target' => '_blank',
                            'url' => '', 
                            'id' => 'js-website'
                        ])
                        @endbutton
                @else
                    @button([
                        'title' => 'Visa på karta', 
                        'target' => '_blank',
                        'url' => 'http://www.google.com/maps/place/' . get_field("location")['lat'] . "," . get_field("location")['lng'], 
                        'classes' => 'bg-blue text-white', 
                        'icon' => "pin-icon"
                    ])
                    @endbutton
                    @if(get_field("external_link"))
                        @button([
                            'title' => 'Gå till webbplats', 
                            'target' => '_blank',
                            'url' => get_field("external_link")
                        ]
                        )@endbutton
                    @endif
                @endif
            </div>
            @if(get_field("google_information"))
            <div class="px-3">
                <span class="block font-rift font-bold mb-3">Öppettider</span>
                <table class="text-sm striped-table" id="js-open-hours">
  {{--                   <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Måndag</span></td>
                        <td class="px-2 py-1">Stängt</td>
                    </tr>
                    <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Tisdag</span></td>
                        <td class="px-2 py-1">12:00 – 16:00</td>
                    </tr>
                    <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Onsdag</span></td>
                        <td class="px-2 py-1">12:00 – 16:00</td>
                    </tr>
                    <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Torsdag</span></td>
                        <td class="px-2 py-1">12:00 – 16:00</td>
                    </tr>
                    <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Fredag</span></td>
                        <td class="px-2 py-1">12:00 – 16:00</td>
                    </tr>
                    <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Lördag</span></td>
                        <td class="px-2 py-1">12:00 – 16:00</td>
                    </tr>
                    <tr class="rounded">
                        <td class="pl-2 pr-6 py-1"><span class="font-medium">Söndag</span></td>
                        <td class="px-2 py-1">12:00 – 16:00</td>
                    </tr> --}}
                </table>
            </div>
            @endif
        </div>
    </div>
   {{--  @if (get_field("google_information")) 
        <section class="flex flex-wrap -mx-3">
            <div class="w-6/12 lg:w-4/12 px-3">
                @button(
                    [
                        'title' => 'Visa på karta', 
                        'target' => '_blank',
                        'url' => '', 
                        'classes' => 'bg-blue text-white', 
                        'id' => 'js-map-link', 
                        'icon' => "pin-icon"
                    ]
                )
                @endbutton
            </div>
            <div class="w-6/12 lg:w-4/12 px-3">
                @button([
                    'title' => 'Gå till webbplats', 
                    'target' => '_blank',
                    'url' => '', 
                    'id' => 'js-website'
                ])
                @endbutton
            </div>
            <div class="w-full lg:w-4/12 px-3">
                <ul class="js-open-hours list-reset" id="js-open-hours"></ul>
            </div>
        </section>
    @else
        <section class="flex flex-wrap -mx-3">
            <div class="w-6/12 lg:w-4/12 px-3">
                @button([
                    'title' => 'Visa på karta', 
                    'target' => '_blank',
                    'url' => 'http://www.google.com/maps/place/' . get_field("location")['lat'] . "," . get_field("location")['lng'], 
                    'classes' => 'bg-blue text-white', 
                    'icon' => "pin-icon"
                ])
                @endbutton
            </div>
            @if(get_field("external_link"))
                <div class="w-6/12 lg:w-4/12 px-3">
                    @button(
                        [
                            'title' => 'Gå till webbplats', 
                            'target' => '_blank',
                            'url' => get_field("external_link")
                        ]
                    )
                    @endbutton
                </div>
            @endif
        </section> 
    @endif
    --}}
    {{-- @map(['classes' => 'h-96 my-4'])@endmap --}}
</div>

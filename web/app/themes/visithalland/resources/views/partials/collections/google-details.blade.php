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
                            'anchor_classes' => 'hidden',
                            'url' => '', 
                            'id' => 'js-website'
                        ])
                        @endbutton
                @else
                    <div class="pr-3 sm:pr-0">
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
                        @button([
                            'title' => 'Gå till webbplats', 
                            'target' => '_blank',
                            'url' => get_field("external_link")
                        ])@endbutton
                    @endif
                @endif
            </div>
            @if(get_field("google_information"))
                <div id="open-hours" class="px-3">
                    <span class="block font-rift font-bold mb-3">Öppettider</span>
                    <table class="text-sm striped-table" id="js-open-hours"></table>
                </div>
            @endif
        </div>
    </div>
</div>

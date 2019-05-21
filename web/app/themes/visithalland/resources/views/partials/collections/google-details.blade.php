<div class="block mt-2">
    @if (get_field("google_information")) 
        <section class="flex flex-wrap -mx-3">
            <div class="w-6/12 lg:w-4/12 px-3">
                @button(
                    [
                        'title' => 'Visa på karta', 
                        'url' => '', 
                        'classes' => 'bg-blue text-white', 
                        'id' => 'js-map-link', 
                        'icon' => "pin-icon"
                    ]
                )
                @endbutton
            </div>
            <div class="w-6/12 lg:w-4/12 px-3">
                @button(
                    [
                        'title' => 'Gå till webbplats', 
                        'url' => '', 
                        'id' => 'js-website'
                    ]
                )
                @endbutton
            </div>
            <div class="w-full lg:w-4/12 px-3">
                <ul class="js-open-hours list-reset" id="js-open-hours"></ul>
            </div>
        </section>
    @else
        <section class="flex flex-wrap -mx-3">
            <div class="w-6/12 lg:w-4/12 px-3">
                @button(
                    [
                        'title' => 'Visa på karta', 
                        'url' => 'http://www.google.com/maps/place/' . get_field("location")['lat'] . "," . get_field("location")['lng'], 
                        'classes' => 'bg-blue text-white', 
                        'icon' => "pin-icon"
                    ]
                )
                @endbutton
            </div>
            @if(get_field("external_link"))
                <div class="w-6/12 lg:w-4/12 px-3">
                    @button(
                        [
                            'title' => 'Gå till webbplats', 
                            'url' => get_field("external_link")
                        ]
                    )
                    @endbutton
                </div>
            @endif
        </section>
    @endif
    @map(
        [
            'classes' => 'h-64 my-4'
        ]
    )
    @endmap
</div>

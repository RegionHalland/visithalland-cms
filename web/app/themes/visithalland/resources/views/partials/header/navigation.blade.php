<nav class="nav fill px3 items-center flex">
    <ul class="nav__ul fill">

        <!-- if (menu item === dropdown) -->
        <li class="nav__item">
            <button class="nav__button has-popup rift-font text-light inline-flex items-center nowrap text-base bold" aria-haspopup="true" aria-expanded="false">
                <span>Upplevelser</span>
                <span class="nav__icon inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
                    <svg class="icon--sm">
                        <use xlink:href="#arrow-down-icon"/>
                    </svg>
                </span>
            </button>
            @include('partials.header.navigation-dropdown')
        </li>

        <!-- else -->
        <li class="nav__item">
            <a href="" class="nav__link rift-font text-light inline-flex items-center nowrap text-base bold">
                <span>Events</span>
                <span class="nav__icon inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
                    <svg class="icon--sm">
                        <use xlink:href="#arrow-right-icon"/>
                    </svg>
                </span>
            </a>
        </li>
        <li class="nav__item">
            <a href="" class="nav__link rift-font text-light inline-flex items-center nowrap text-base bold">
                <span>Tips & Guider</span>
                <span class="nav__icon inline-flex justify-center items-center bg-blue-xlight rounded-full ml2">
                    <svg class="icon--sm">
                        <use xlink:href="#arrow-right-icon"/>
                    </svg>
                </span>
            </a>
        </li>
    </ul>
</nav>
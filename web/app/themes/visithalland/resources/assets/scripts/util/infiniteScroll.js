import inf from 'infinite-scroll';
import { initTrip } from '../routes/singleTrip';
import { initHappening } from '../routes/singleHappening';
import { initMeetLocal } from '../routes/singleMeetLocal';

class InfiniteScroll {
    constructor(){
        console.log("Hello from InfiniteScroll");
        initInfiniteScroll();
    }
}

export function initInfiniteScroll() {
    var nextPages = $("#nextPages").data("all");
    var nextPages = ["http://localhost:3000/hiking-biking/editor_tip/cykelhistoria-i-halland/", "http://localhost:3000/camping-friends/meet-a-local/anton-hubner/", "http://localhost:3000/hiking-biking/happening/kungsbackaloppet/", "http://localhost:3000/hiking-biking/happening/kungsbacka-river/", "http://localhost:3000/hiking-biking/spotlight/upptack-hallands-vackra-natur/", "http://localhost:3000/hiking-biking/spotlight/upptack-hallands-vackra-natur/", "http://localhost:3000/hiking-biking/spotlight/upptack-hallands-vackra-natur/", "http://localhost:3000/hiking-biking/spotlight/upptack-hallands-vackra-natur/"];
    var infScroll = new inf('#infinite-container', {
        path: function () {
            return nextPages[this.loadCount];
        },
        append: '#main-content',
        status: '.page-load-status',
        scrollThreshold: 800,
        history: 'replace',
        debug: true
    });

    // Add history event listener for logging pageviews to Analytics.
    infScroll.on('history', function (title, path) {
        console.log("-------history----------", title, path);
        ga('create', 'UA-89278649-4');
        ga('send', {
            hitType: 'pageview',
            path: path.replace(/^.*\/\/[^\/]+/, ''),
        });
    });

    // Add history event listener for logging pageviews to Analytics.
    infScroll.on('append', function (title, path, items) {
        console.log("appended");
        var postType = $(items[1]).data("posttype");
        console.log(postType)

        // Se what post type we got and run that post types init javascript
        switch (postType) {
            case "trip":
                initTrip();
                break;
            case "happening":
                console.log("we have a fucking hap")
                initHappening();
                break;
            case "meet_local":
                console.log("we have a fucking meet a local")
                initMeetLocal();
                break;

            default:
                break;
        }
    });

    return infScroll;
}

export default new InfiniteScroll();

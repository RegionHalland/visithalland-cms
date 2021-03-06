import inf from 'infinite-scroll';
import { initSpotlight } from '../routes/singleSpotlight';
import { initHappening } from '../routes/singleHappening';
import { initEditorTip } from '../routes/singleEditorTip';

class InfiniteScroll {
    constructor(){
        initInfiniteScroll();
    }
}

export function initInfiniteScroll() {
    var nextPages = $("#nextPages").data("all");
    if(nextPages.length == 0) return $('.next-article__container').hide();

    var infScroll = new inf('#infinite-container', {
        path: function () {
            if(this.loadCount < nextPages.length){
                return nextPages[this.loadCount].permalink
            }
        },
        append: '.infinite-item',
        responseType: 'document',
        status: '.page-load-status',
        scrollThreshold: 1000,
        history: 'replace'
    });

    // Add history event listener for logging pageviews to Analytics.
    infScroll.on('history', function (title, path) {
        ga('create', 'UA-89278649-4');
        ga('send', {
            hitType: 'pageview',
            path: path.replace(/^.*\/\/[^\/]+/, ''),
        });
    });

    // Set the first next-article__title to the first element
    document.querySelector('.next-article__title').innerHTML = nextPages[0].post_title;
    document.querySelector('.next-article__img').src = nextPages[0].thumbnailUrl;
    document.querySelector('.next-article__img').alt = nextPages[0].thumbnailAlt;   

    // Add history event listener for logging pageviews to Analytics.
    infScroll.on('append', function (title, path, items) {
        var item = items[0];
        
        if (this.loadCount === nextPages.length) {
            item.querySelector('.next-article__container').remove();
            return
        }

        var postType = $(item).data("posttype");
        var articleTitle = item.querySelector('.next-article__title');
        var articleImg = item.querySelector('.next-article__img');
        articleTitle.innerHTML = nextPages[this.loadCount].post_title;
        articleImg.src = nextPages[this.loadCount].thumbnailUrl;
        articleImg.alt = nextPages[this.loadCount].thumbnailAlt;    

        // Se what post type we got and run that post types init javascript
        switch (postType) {
            case "spotlight":
                initSpotlight();
                break;
            case "happening":
                initHappening();
                break;

            default:
                break;
        }
    });

    return infScroll;
}

export default InfiniteScroll;

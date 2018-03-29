var inf = require('infinite-scroll');

class InfiniteScroll {
    constructor(){
        this.bind();
    }

    bind(){
        var nextPages = $("#nextPages").data("all");
        console.log(nextPages);

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
        infScroll.on('history', function (title, path){
            console.log("history", title, path);
            ga('create', 'UA-89278649-4');
            ga('send', {
                hitType: 'pageview',
                path: path.replace(/^.*\/\/[^\/]+/, ''),
            });
        });
    }

}

export default new InfiniteScroll();

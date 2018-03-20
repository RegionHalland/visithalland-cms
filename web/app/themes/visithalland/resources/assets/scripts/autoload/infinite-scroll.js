class InfiniteScroll {
    // TODO: Test if it works
    constructor(){
        this.bind();
    }

    bind(){
        // TODO: make this work ---->
        //var nextPages = $("#nextPages").data("all");

        var nextPages = [
            "http://localhost:3000/camping-friends/spotlight/en-regnig-dag/",
        ];
        console.log("nextPages", nextPages);

        /*var $container = new InfiniteScroll('#infinite-container', {
        //var $container = $('#infinite-container').infiniteScroll({
            // options
            path: function () {
                return nextPages[0];
            },
            append: '#infinite-container',
            history: 'replace',
            status: '.page-load-status',
            debug: false,
            scrollThreshold: 800
        });

        /*var $container = new InfiniteScroll('.container', {
            // options
            path: function () {
                //this.loadCount
                return nextPages[0];
            },
            append: '#infinite-container',
            history: 'replace',
            status: '.page-load-status',
            debug: true,
            scrollThreshold: 800,
        });*/

        /*$container.on('load.infiniteScroll', function (event, response) {
            var elements = $(response);
        });

        $container.on('history.infiniteScroll', function (event, title, path) {
            ga('create', 'UA-89278649-4');
            ga('send', {
                hitType: 'pageview',
                path: path.replace(/^.*\/\/[^\/]+/, ''),
            });
        });*/
    }

}

export default new InfiniteScroll();

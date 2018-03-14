class InfiniteScroll {
    // TODO: Test if it works
    constructor() {
        this.bind();
    }

    bind() {
        var nextPages = $("#nextPages").data("all");
        var $container = $('#infinite-container').infiniteScroll({
            // options
            path: function () {
                return nextPages[this.loadCount];
            },
            append: '#infinite-container',
            history: 'replace',
            status: '.page-load-status',
            debug: false,
            scrollThreshold: 800
        });

        $container.on('load.infiniteScroll', function (event, response) {
            var elements = $(response);
        });

        $container.on('history.infiniteScroll', function (event, title, path) {
            ga('create', 'UA-89278649-4');
            ga('send', {
                hitType: 'pageview',
                path: path.replace(/^.*\/\/[^\/]+/, '')
            });
        });
    }

}

export default new InfiniteScroll();

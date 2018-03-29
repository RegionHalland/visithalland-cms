var inf = require('infinite-scroll');

class InfiniteScroll {
    // TODO: Test if it works
    constructor(){
        this.bind();
    }


    bind(){
        // TODO: make this work ---->
        var nextPages = $("#nextPages").data("all");
        console.log(nextPages);

        console.log("asd");

        /*var nextPages = [
            "http://localhost:3000/camping-friends/spotlight/en-regnig-dag",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200",
            "https://cdn.syndication.twimg.com/tweets.json?next_version=true&callback=__twttr.callbacks.cb0&ids=804705433739022338&lang=en&suppress_response_codes=true&tz=GMT%2B0200"
        ];*/

        var infScroll = new inf('#infinite-container', {
            path: function () {
                return nextPages[this.loadCount];
            },
            append: '#main-content',
            status: '.page-load-status',
            scrollThreshold: 800,
            debug: true
            //scrollThreshold: false
        });

        //console.log("nextPages", nextPages);

        /*var infScroll = new InfiniteScroll('#infinite-container', {
            //path: "http://localhost:3000/camping-friends/spotlight/en-regnig-dag/"
            //append: '.post',
            status: '.page-load-status',
        });

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

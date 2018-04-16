
<template>
	<div class="card">
	  <header class="card__header">
	     <button class="card__button">
	       Gå bakåt
	     </button>
	     <h2 class="card__title">{{ title }}</h2>
	  </header>
	  <div class="card__content">
        <ul id="example-1">
            <li v-for="item in items">
                <img :src="item.img">
                {{ item.title.rendered }}
            </li>
        </ul>
	  </div>
	</div>
</template>

<script>
import axios from 'axios';

    export default {
        data: function(){
            return {
                title: "Våra rekommendationer",
                items: [
                { title: {
                    rendered: ""
                }, img: "", },
                ]
            }
        },
        created () {
            // fetch the data when the view is created and the data is
            // already being observed
            console.log(this);
            this.fetchData()
        },
        methods: {
            fetchData () {
                /*var vm = this;
                request
                .get('http://visithalland.test/wp-json/wp/v2/activity')
                .redirects(0)
                .end(function(err, res){
                    if (err || !res.ok) {
                    console.log('Oh no! error');
                    } else {
                        console.log('yay got ' + JSON.stringify(res.body));
                        var posts = res.body;
                        posts.map(function(val, key){
                            // Request
                            request
                            .get('http://visithalland.test/wp-json/wp/v2/media/'+val.featured_media)
                            .redirects(0)
                            .end(function(err, res){
                                if (err || !res.ok) {
                                console.log('Oh no! error');
                                } else {
                                    console.log('yay got ' + JSON.stringify(res.body.media_details.sizes.vh_thumbnail.source_url));
                                    val.img = res.body.media_details.sizes.vh_thumbnail.source_url;
                                    // TODO remove this hack
                                    vm.$forceUpdate();
                                }
                            });
                        })
        console.log("posts", posts)
                        vm.items = posts;



                    }
                });*/

                // Fetch data here
                /*setTimeout(() => {
                    console.log("No we have data")
                }, 2000);*/
            }
        }
    }
</script>

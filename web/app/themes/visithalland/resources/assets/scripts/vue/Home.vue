<template>
    <router-link class="btn block center btn--primary" to="/time">Få inspiration</router-link>
</template>

<script>
import axios from 'axios';

    export default {
        data: function(){
            return {
                title: "Få inspiration"
            }
        },
        created(){
            // Make a request for a user with a given ID
            /*axios.get('/')
                .then(function (response) {
                    console.log("ax", response);
                })
                .catch(function (error) {
                    console.log(error);
                });*/
        }
    }
</script>

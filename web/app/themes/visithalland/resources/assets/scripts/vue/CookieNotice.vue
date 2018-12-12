<template>
	<transition name="fade">
        <div class="fixed w-full pin-l pin-r pin-b z-50 p-3 text-white w-full" v-if="showCookie">
            <div class="bg-blue topographic-pattern p-8 relative rounded w-full sm:w-6/12 md:w-4/12" tabindex="1">
                <p class="text-grey-light text-sm">
                    {{cookiePolicy}}
                    <a :href="cookiePageLink" class="underline text-white">
                        {{cookieUserAgreement}}
                    </a>
                </p>
                <button v-on:click="setAcceptCookie" class="h-8 w-8 rounded-full bg-blue-light flex items-center justify-center absolute outline-none pin-t pin-r mr-3 mt-3" id="cookie-accept" :title="cookieCloseButtonText" tabindex="2">
                    <svg class="icon fill-current text-white">
                        <use xlink:href="#close-icon"/>
                    </svg>
                </button>
            </div>
        </div>
	</transition>
</template>

<script>
	import Cookies from 'js-cookie';
	import axios from 'axios';

    export default {
        name: "CookieNotice",
        data() {
            return {
            	cookiePageLink: "",
            	cookiePolicy: "",
            	cookieUserAgreement: "",
            	cookieCloseButtonText: "",
            	styleObject: {},
            	showCookie: false,
            	currentLang: String
            }
        },
        created() {
        	// If cookie consent is not set
        	if (!Cookies.get('cookie_consent')) {
        		// Wait for language detection to init before we continue
        		this.$i18n.i18next.on('initialized', () => {
                    // TODO: make this better, temporary... <-- Hahaha.
                    if(this.$i18n.i18next.language == "sv") {
                        this.currentLang = "";
                    }
                    if(this.$i18n.i18next.language == "sv-SE") {
                        this.currentLang = "";
                    }
                    if(this.$i18n.i18next.language != "sv" && this.$i18n.i18next.language != "sv-SE") {
                        this.currentLang = "en";
                    }
                    
        			return this.getCookieString();
        		})
        	}
        },
        methods: {
        	setAcceptCookie() {
        		this.styleObject = {};
        		this.showCookie = false;
        		Cookies.set('cookie_consent', 'comply', { expires: 5000 });
        	},
        	getCookieString() {
        		// Fetch the cookie policy string and meta-data from the API
        		axios.get('/wp-json/visit/v1/cookie_policy?lang='+this.currentLang)
				.then((response) => {
					var cookieData = response.data;
					this.cookiePolicy = cookieData.cookie_policy;
					this.cookieUserAgreement = cookieData.cookie_user_agreement_text;
					this.cookieCloseButtonText = cookieData.cookie_close_button_text;
					this.cookiePageLink = cookieData.cookie_page_url;
					this.styleObject = { display: 'block'};
					this.showCookie = true;
				})
				.catch((error)=>{
					console.log(error);
				});
        	}
        }
    }
</script>

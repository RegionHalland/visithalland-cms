<template>
	<transition name="fade">
        <div class="cookie-banner fixed fill display-none left-0 right-0 bottom-0 z5 p3 text-light col-12" :style="styleObject" :show="showCookie">
            <div class="cookie-banner__inner bg-blue topographic-pattern p4 relative rounded col-12 sm-col-6 md-col-4" tabindex="1">
                <p class="cookie-banner__policy text-grey-light text-sm">
                    {{cookiePolicy}}
                    <a :href="cookiePageLink" class="cookie-banner__link underline text-light">
                        {{cookieUserAgreement}}
                    </a>
                </p>
                <button v-on:click="setAcceptCookie" class="height-4 width-4 rounded-full bg-blue-light flex items-center justify-center absolute outline-none top-0 right-0 mr3 mt3" id="cookie-accept" :title="cookieCloseButtonText" tabindex="2">
                    <svg class="icon icon-white">
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
					//console.log(error);
				});
        	}
        }
    }
</script>

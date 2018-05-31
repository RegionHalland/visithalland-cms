<template>
	<transition name="fade">
	<div class="cookie-banner col-12" :style="styleObject" :show="showCookie">
	    <div class="cookie-banner__inner col-12 sm-col-6 md-col-4" tabindex="1">
	        <span class="cookie-banner__policy">
	            {{cookiePolicy}}
	            <a :href="cookiePageLink" class="cookie-banner__link">
	                {{cookieUserAgreement}}
	            </a>
	        </span>
	        <button v-on:click="setAcceptCookie" class="cookie-banner__button icon-button" id="cookie-accept" :title="cookieCloseButtonText" tabindex="2">
	            <svg class="icon icon-button__icon">
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
        			this.currentLang = this.$i18n.i18next.language == "sv" ? "" : "en";
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

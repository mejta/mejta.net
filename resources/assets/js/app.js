import Vue from 'vue';

import {
    ContactForm,
    SocialIcons,
    Form as CForm,
    Input as CInput,
} from './components';

import {
    Scroll,
    ScrollClass,
    Navigation,
    Google,
    Axios
} from './plugins';

Vue.use(Scroll, { offset: 60 });

Vue.use(ScrollClass);

Vue.use(Navigation);

Vue.use(Google, {
    recaptcha: process.env.MIX_GOOGLE_RECAPTCHA_SITEKEY,
    maps: process.env.MIX_GOOGLE_MAPS_KEY,
});

Vue.use(Axios, {
    token: document.head.querySelector('meta[name="csrf-token"]'),
    lang: document.documentElement.lang,
});

new Vue({
    el: '#app',
    components: {
        SocialIcons,
        ContactForm,
        CForm,
        CInput,
    }
});

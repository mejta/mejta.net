import axios from 'axios';

export function install (Vue, options) {
    const {
        token,
        lang
    } = options;
    
    if (token) {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
        axios.defaults.headers.common['Content-Language'] = lang;

        Vue.mixin({
            created () {
                this.$axios = axios;
            },
        });
    } else {
        console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
    }
};

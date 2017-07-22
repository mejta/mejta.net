import Gmap from './Gmap';
import GmapMarker from './GmapMarker';
import Grecaptcha from './Grecaptcha';

const randomString = (length) => {
    let text = "";
    const possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for (let i = 0; i < length; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
    }

    return text;
};

const injectScript = (url) => {
    const script = document.createElement('SCRIPT');
    script.setAttribute('src', url);
    script.setAttribute('async', '');
    script.setAttribute('defer', '');
    document.head.appendChild(script);
};

const urlParams = (url, params = {}) => {
    return url + '?' + Object.keys(params)
        .map((key) => encodeURIComponent(key) + '=' + encodeURIComponent(params[key]))
        .join('&');
};

const load = {
    maps: (key) => {
        return new Promise(resolve => {
            const options = {
                callback: 'gmap_' + randomString(16),
                key,
            };
            window[options.callback] = resolve;
            injectScript(urlParams('https://maps.googleapis.com/maps/api/js', options));
        });
    },
    recaptcha: () => {
        return new Promise(resolve => {
            const options = {
                onload: 'grecaptcha_' + randomString(16),
                render: 'explicit',
            };
            window[options.onload] = resolve;
            injectScript(urlParams('https://www.google.com/recaptcha/api.js', options));
        });
    }
};

export function install (Vue, options = {}) {
    const {
        maps,
        recaptcha,
    } = options;

    if(maps) {
        const resolvers = {};

        Vue.component('Gmap', (resolve, reject) => {
            resolvers.Gmap = {
                compoment: Gmap,
                resolve,
            };
        });

        Vue.component('GmapMarker', (resolve, reject) => {
            resolvers.GmapMarker = {
                compoment: GmapMarker,
                resolve,
            };
        });

        load.maps(maps)
        .then(() => {
            for (let name in resolvers) {
                const resolver = resolvers[name];
                resolver.resolve(resolver.compoment);
            }
        });
    }
    
    if(recaptcha) {
        Vue.component('grecaptcha', (resolve, reject) => {
            load.recaptcha()
            .then(() => {
                resolve(Grecaptcha(recaptcha));
            });
        });
    }
};

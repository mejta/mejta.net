const register = (element, limit, className) => {
    const toggle = function() {
        const distanceY = window.pageYOffset || document.documentElement.scrollTop;
        if (distanceY > limit) {
            element.classList.add(className);
        } else {
            element.classList.remove(className);
        }
    };

    let passiveSupported = false;
    try {
        const options = Object.defineProperty({}, 'passive', {
            get: function() { passiveSupported = true; }
        });
        window.addEventListener('test', null, options);
    } catch(err) {}
    var options = passiveSupported ? { passive: true } : false;

    window.addEventListener('scroll', toggle, options);
    window.addEventListener('resize', toggle, options);
    window.addEventListener('load', toggle, options);
};

export function install(Vue, options = {}) {
    const {
        directive = 'scroll-class',
        defaultLimit = 0,
        defaultClass = 'scroll',
    } = options;

    Vue.directive(directive, {
        inserted (el, binding, vnode) {
            const {
                toggle = defaultClass,
                limit = defaultLimit,
            } = binding.value;
            register(el, limit, toggle);
        }
    });
}
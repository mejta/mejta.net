require("smoothscroll-polyfill").polyfill();

const scrollTo = (element, offset) => {
    const position = element.getBoundingClientRect();

    window.scrollBy({
        top: position.top - offset,
        left: 0,
        behavior: "smooth",
    });
};

const getAnchor = (paths) => {
    for(let path in paths) {
        if(paths[path].localName == 'a') {
            return paths[path];
        }
    }
}

export function install (Vue, options) {
    const {
        offset = 0,
        directive = 'scroll',
    } = options;

    Vue.directive(directive, {
        inserted (el, binding, vnode) {
            el.addEventListener('click', event => {
                event.preventDefault();
                const anchor = getAnchor(event.path);
                const target = document.querySelector(anchor.hash);
                scrollTo(target, offset);
            });
        }
    });
};

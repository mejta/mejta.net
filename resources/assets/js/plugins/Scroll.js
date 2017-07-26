require("smoothscroll-polyfill").polyfill();

const scrollTo = (element, offset) => {
    const position = element.getBoundingClientRect();

    window.scrollBy({
        top: position.top - offset,
        left: 0,
        behavior: "smooth",
    });
};

const getAnchor = (element) => {
    let currentElement = element;

    while(currentElement) {
        if(currentElement.tagName.toLowerCase() == 'a') {
            return currentElement;
        }
        currentElement = currentElement.parentElement;
    }
    return element;
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
                const anchor = getAnchor(event.target);
                const target = document.querySelector(anchor.hash);
                scrollTo(target, typeof binding.value === 'number' ? binding.value : offset);
            });
        }
    });
};

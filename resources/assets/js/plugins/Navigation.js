export function install (Vue, options = {}) {
    const {
        directive = 'navigation',
    } = options;

    Vue.directive(directive, {
        inserted (el, binding, vnode) {
            el.addEventListener('click', event => {
                const toggle = document.querySelector(`#${binding.value}`);
                toggle.checked = false;
            });
        }
    });
};

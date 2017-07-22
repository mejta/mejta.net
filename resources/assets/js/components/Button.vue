<template>
    <button v-if="typeButton" type="submit" :class="[defaultClass, yellowClass, turquoiseClass]">
        <slot>Submit</slot>
    </button>
    <a v-else :class="[defaultClass, yellowClass, turquoiseClass, bigClass]">
        <slot>Submit</slot>
    </a>
</template>
<script>
export default {
    props: ['theme', 'type'],
    data() {
        return {
            defaultClass: this.theme == 'default' || !this.theme ? 'button button--default' : 'button',
            yellowClass: this.theme == 'yellow' ? 'button--yellow' : null,
            turquoiseClass: this.theme == 'turquoise' ? 'button--turquoise' : null,
            bigClass: 'button--big',
            typeButton: this.type == 'button',
        }
    },
}
</script>

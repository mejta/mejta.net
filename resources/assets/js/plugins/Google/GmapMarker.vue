<template>
    <div>
        <slot></slot>
    </div>
</template>
<script>
export default {
    props: ['position', 'opened'],
    mounted () {
        const el = this.$el;
        el.parentNode.removeChild(el);

        const info = (this.$slots.default && this.$slots.default.length > 0) ? el.outerHTML : null;
        
        this.$parent.$emit('markerCreated', {
            position: this.position,
            opened: this.opened,
            info
        });
    },
};
</script>
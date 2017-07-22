export default function (sitekey) {
    return {
        props: {
            success: {
                type: Function,
                required: true,
            },
        },
        template: `<div></div>`,
        data () {
            return {
                size: 'invisible',
                sitekey,
                id: null,
            }
        },
        mounted () {
            this.id = grecaptcha.render(this.$el, {
                sitekey: this.sitekey,
                size: this.size,
                callback: this.success,
            });
            this.$emit('mounted', this);
        },
        methods: {
            execute () {
                return grecaptcha.execute(this.id);
            },
            reset () {
                return grecaptcha.reset(this.id);
            }
        },
    }
};

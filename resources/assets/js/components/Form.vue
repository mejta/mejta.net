<template>
    <form class="form" @submit="handleSubmit">
        <slot></slot>

        <grecaptcha v-if="enableRecaptcha" :success="handleValidated" @mounted="handleRecaptchaMounted"></grecaptcha>

        <div class="form__button">
            <c-button type="button" :disabled="isDisabled">
                {{ status == 'submitting' ? submittingButton : submitButton }}
            </c-button>
        </div>

        <div v-if="status == 'success'" @click="handleDismiss" class="form__alert form__alert--success">
            <p>
                {{ successMessage }}
            </p>
        </div>
    </form>
</template>
<script>
import CButton from './Button';

export default {
    props: {
        url: {
            type: String,
            required: true,
        },
        method: {
            type: String,
            default: 'get',
            validator: function(value) {
                return ['post','get','put','delete'].indexOf(value) > -1;
            },
        },
        submitButton: {
            type: String,
            default: 'Submit',
        },
        submittingButton: {
            type: String,
            default: 'Submitting...',
        },
        successMessage: {
            type: String,
            default: 'Form has been successfully submitted. Thank you.'
        },
        enableRecaptcha: {
            type: Boolean,
            default: false,
        }
    },
    data () {
        return {
            status: 'init',
            data: {},
            errors: {},
            recaptcha: null,
        }
    },
    computed: {
        isDisabled () {
            return this.status == 'submitting' || this.hasErrors;
        },
        hasErrors () {
            return Object.keys(this.errors).length > 0;
        },
    },
    created () {
        this.$on('input-mounted', this.handleInputMount);
    },
    methods: {
        clearForm () {
            this.$children.forEach(child => {
                child.$emit('clear');
            });

            this.errors = {};

            if(this.enableRecaptcha) {
                this.recaptcha.reset();
            }
        },
        submitForm () {
            this.$axios[this.method](this.url, this.data)
                .then(this.handleSuccess)
                .catch(this.handleError);
        },
        handleSubmit (event) {
            event.preventDefault();
            this.status = 'submitting';
            
            if(this.enableRecaptcha) {
                this.recaptcha.execute();
            } else {
                this.submitForm();
            }
        },
        handleSuccess (response) {
            this.status = 'success';
            this.clearForm();
        },
        handleDismiss () {
            this.status = 'init';
        },
        handleError (error) {
            this.status = 'error';
            this.errors = error.response.data;

            this.$children
            .map(child => child.tag == 'input' ? child : false)
            .forEach(input => {
                if(this.errors[input.name]) {
                    input.$emit('error', this.errors[input.name]);
                }
            });

            delete this.errors.recaptcha;
            if(this.enableRecaptcha) {
                this.recaptcha.reset();
            }
        },
        handleValidated (response) {
            this.data.recaptcha = response;
            this.submitForm();
        },
        handleRecaptchaMounted (recaptcha) {
            this.recaptcha = recaptcha;
        },
        handleInputMount (input) {
            input.$on('input', this.handleInput);
            this.handleInput(input);
        },
        handleInput (input) {
            this.data[input.name] = input.value;
            this.errors[input.name] = input.errors;

            if(!this.errors[input.name]) {
                delete this.errors[input.name];
            }

            this.errors = Object.assign({}, this.errors);
        },
    },
    components: {
        CButton,
    }
}
</script>

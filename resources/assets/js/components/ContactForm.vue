<template>
    <form class="form" @submit="handleSubmit">
        <c-input
            type="textarea"
            label="Message/Project desc."
            :value="data.message"
            :errors="errors.message"
            @input="value => handleInput('message', value)"
            required
        ></c-input>
        <c-input
            type="text"
            label="Name"
            :value="data.name"
            :errors="errors.name"
            @input="value => handleInput('name', value)"
        ></c-input>
        <c-input
            type="tel"
            label="Phone"
            :value="data.phone"
            :errors="errors.phone"
            @input="value => handleInput('phone', value)"
        ></c-input>
        <c-input
            type="email"
            label="Email"
            :value="data.email"
            :errors="errors.email"
            @input="value => handleInput('email', value)"
            required
        ></c-input>
        <c-input
            type="text"
            label="Budget"
            :value="data.budget"
            :errors="errors.budget"
            @input="value => handleInput('budget', value)"
        ></c-input>
        
        <grecaptcha :success="handleValidated" @mounted="handleRecaptchaMounted"></grecaptcha>
        
        <div class="form__button">
            <c-button type="button" :disabled="isDisabled">
                {{ status == 'sending' ? 'Sending ...' : 'Send' }}
            </c-button>
        </div>
        <div v-if="status == 'success'" @click="handleDismiss" class="form__alert form__alert--success">
            <p>
                Thank you for your message.
            </p>
        </div>
    </form>
</template>

<script>
import CInput from './Input';
import CButton from './Button';

export default {
    props: ['url', 'method'],
    data() {
        return {
            data: {
                message: '',
                name: '',
                phone: '',
                email: '',
                budget: '',
                recaptcha: '',
            },
            errors: {},
            status: 'init',
            isSuccess: false,
            isSending: false,
            recaptcha: null,
        }
    },
    methods: {
        clearForm () {
            for(let item in this.data) {
                this.data[item] = '';
            }
        },
        handleSubmit (event) {
            event.preventDefault();
            this.status = 'sending';
            this.recaptcha.execute();
        },
        handleInput (name, value) {
            this.data[name] = value;
            delete this.errors[name];
            this.errors = Object.assign({}, this.errors);
        },
        handleSuccess (response) {
            this.recaptcha.reset();
            this.status = 'success';
            this.clearForm();
        },
        handleDismiss () {
            this.status = 'init';
        },
        handleError (error) {
            this.recaptcha.reset();
            this.status = 'error';
            this.errors = error.response.data;
            delete this.errors.recaptcha;
        },
        handleValidated (response) {
            this.data.recaptcha = response;
            this.$axios[this.method](this.url, this.data)
                .then(this.handleSuccess)
                .catch(this.handleError)
        },
        handleRecaptchaMounted (recaptcha) {
            this.recaptcha = recaptcha;
        },
    },
    computed: {
        isDisabled () {
            return this.status == 'sending' || Object.keys(this.errors).length > 0;
        }
    },
    components: {
        CInput,
        CButton,
    },
}
</script>

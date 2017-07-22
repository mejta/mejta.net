<template>
    <div :class="[baseClass, activeClass, emptyClass, errorClass]">
        <label>
            <div class="form__label">
                {{ label }}
                <span v-if="required" class="form__asterisk">*</span>
            </div>
            <textarea v-if="type == 'textarea'" ref="textarea"
                class="form__control"
                rows="1"
                :value="value"
                @focus="handleFocused"
                @blur="handleFocused"
                @input="handleInput"
            ></textarea>
            <input v-else
                :type="type"
                class="form__control"
                :value="value"
                @focus="handleFocused"
                @blur="handleFocused"
                @input="handleInput"
            >
            <div v-if="errors" class="form__helper form__helper--error">
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </div>
        </label>
    </div>
</template>

<script>
import autosize from 'autosize';

export default {
    propso: ['type', 'name', 'defaultValue', 'label', 'required'],
    props: {
        type: {
            type: String,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        defaultValue: {
            type: String,
            required: false,
            default: '',
        },
        label: {
            type: String,
            required: true,
        },
        required: {
            type: Boolean,
            required: false,
            default: false,
        }
    },
    data () {
        return {
            tag: 'input',
            value: this.defaultValue,
            errors: null,
            baseClass: 'form__group',
            activeClass: null,
        }
    },
    computed: {
        emptyClass () {
            return this.value && this.value.length > 0 ? null : this.baseClass + '--empty';
        },
        errorClass () {
            return this.errors ? this.baseClass + '--error' : null;
        },
    },
    methods: {
        handleFocused (event) {
            this.activeClass = event.type == 'focus' ? this.baseClass + '--active' : null;
        },
        handleInput (event) {
            this.value = event.target.value.trim();
            autosize.update(this.$refs.textarea);
            this.errors = null,
            this.$emit('input', this);
        },
        handleError(errors) {
            this.errors = errors;
        },
        handleClear() {
            this.value = null;
            this.errors = null;
            this.$emit('input', this);
        }
    },
    created () {
        this.$on('error', this.handleError);
        this.$on('clear', this.handleClear);
    },
    mounted () {
        this.$parent.$emit('input-mounted', this);
        autosize(this.$refs.textarea);
    }
}
</script>

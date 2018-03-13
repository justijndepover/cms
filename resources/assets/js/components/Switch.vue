<template>
    <label class="switch" :for="id">
        <input type="checkbox"
            :id="id"
            :name="name"
            :value="value"
            :class="className"
            :required="required"
            :disabled="disabled"
            @change="onChange"
            :checked="state"
        >
        <span class="slider round"></span>
    </label>
</template>

<script>
export default {
    model: {
        prop: 'modelValue',
        event: 'input'
    },
    props: {
        id: {
            type: String,
            default: function () {
                return 'switch-id-' + this._uid;
            },
        },
        name: {
            type: String,
            default: null,
        },
        value: {
            default: null,
        },
        modelValue: {
            default: undefined,
        },
        className: {
            type: String,
            default: null,
        },
        checked: {
            type: Boolean,
            default: false,
        },
        required: {
            type: Boolean,
            default: false,
        },
        disabled: {
            type: Boolean,
            default: false,
        },
        model: {}
    },
    computed: {
        state() {
            if (this.modelValue === undefined) {
                return this.checked;
            }
            if (Array.isArray(this.modelValue)) {
                return this.modelValue.indexOf(this.value) > -1;
            }
            return !!this.modelValue;
        }
    },
    methods: {
        onChange() {
            this.toggle();
        },
        toggle() {
            let value;
            if (Array.isArray(this.modelValue)) {
                value = this.modelValue.slice(0);
                if (this.state) {
                    value.splice(value.indexOf(this.value), 1);
                } else {
                    value.push(this.value);
                }
            } else {
                value = !this.state;
            }
            this.$emit('input', value);
        }
    },
    watch: {
        checked(newValue) {
            if (newValue !== this.state) {
                this.toggle();
            }
        }
    },
    mounted() {
        if (this.checked && !this.state) {
            this.toggle();
        }
    }
}
</script>

<style>
/* The switch - the box around the slider */
.switch {
    position: relative;
    display: inline-block;
    width: 35px;
    height: 20px;
    margin: 0;
    vertical-align: middle;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 2px;
    bottom: 2px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
    background-color: #30e99c;
}

input:focus + .slider {
    box-shadow: 0 0 1px #30e99c;
}

input:checked + .slider:before {
    -webkit-transform: translateX(15px);
    -ms-transform: translateX(15px);
    transform: translateX(15px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 20px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
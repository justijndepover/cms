<template>
    <label class="checkbox" :for="id">
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
        <span class="checkmark"></span>
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
                    return 'checkbox-id-' + this._uid;
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
.checkbox {
    display: block;
    position: relative;
    cursor: pointer;
    margin: 0;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.checkbox input {
  display: none;
}

/* Create a custom checkbox */
.checkmark {
  display: block;
  height: 15px;
  width: 15px;
  border-radius: 4px;
  border: solid 1px #eee;
  background-color: white;
}

/* On mouse-over, add a grey background color */
.checkbox:hover input ~ .checkmark {
  border-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.checkbox input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.checkbox input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.checkbox .checkmark:after {
  left: 6px;
  top: 3px;
  width: 4px;
  height: 8px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
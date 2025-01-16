<template>
  <div class="custom-input">
    <label :for="id">
      <slot name="label">
        <div class="label" :class="{ required: required }">
          {{ label }}
        </div>
      </slot>
    </label>

    <input :id="id" :type="type" :class="classes" class="mt-4" v-model="inputValue" :required="required" v-bind="{
      pattern: type === 'tel' ? phonePattern : undefined,
    }" autofocus @change="onValueChange($event.target.value)" step="0.1" autocomplete="newPassword" />

    <InputError v-if="message" class="mt-2" :message="message" />
  </div>
</template>

<script setup>
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
const props = defineProps({
  type: {
    type: String,
    default: "text",
  },
  required: {
    type: Boolean,
    default: false,
  },
  message: {
    type: String,
    default: undefined,
  },
  id: {
    type: String,
    default: undefined,
  },
  label: {
    type: String,
    default: undefined,
  },
  classes: {
    type: String,
    default: "mt-1 block w-full",
  },
  modelValue: {
    type: [String, Number],
    default: undefined,
  },
});
const emit = defineEmits(["update:modelValue"]);
const inputValue = ref(props.modelValue);
const phonePattern = "^[0-9]{1,15}$";
function onValueChange(val) {
  emit("update:modelValue", val);
}
</script>

<style lang="scss" scoped>
.custom-input {
  margin: 1rem 0;

  input {
    height: 4rem;
    padding: 0.5rem 1rem;
    border: 1px solid var(--border-color);
    width: 100%;
    border-radius: 0.5rem;
    outline: none;
    color: var(--text-secondary-color);
    box-shadow: 0px 0px 7px 0px var(--box-shadow-color) inset;
    box-sizing: border-box;

    &:focus {
      border: 1px solid var(--theme-primary-color);
      color: var(--theme-primary-color) !important;
    }

    &:invalid {
      //   outline: 2px solid red !important;
      border: 2px solid red !important;
    }

    &[type=tel] {

      &::-webkit-inner-spin-button,
      &::-webkit-outer-spin-button {
        -webkit-appearance: none;
      }

      -moz-appearance: textfield;
    }
  }

  label {
    color: inherit;
    padding: 0.5rem 0rem;
    font-weight: 500;

    &.required {
      &::after {
        display: inline-block;
        color: #f5222d;
        font-size: 1.6rem;
        font-family: SimSun, sans-serif;
        line-height: 1;
        content: "*" !important;
        margin-left: 0.4rem;
        vertical-align: super;
      }

      &::before {
        display: none;
      }
    }
  }
}
</style>

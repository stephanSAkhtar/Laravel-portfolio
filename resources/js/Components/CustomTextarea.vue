<template>
  <div id="custom-textarea">
    <label :for="id" class="label" :class="{ required: required }">{{
      label
    }}</label>

    <textarea
      :id="id"
      :rows="rows"
      :cols="cols * 10"
      :class="classes"
      class="mt-4"
      v-model="inputValue"
      :required="required"
      autofocus
      @change="onValueChange($event.target.value)"
    />

    <InputError v-if="message" class="mt-2" :message="message" />
  </div>
</template>

<script setup>
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
const props = defineProps({
  rows: {
    type: [Number, String],
    default: 5,
  },
  cols: {
    type: [Number, String],
    default: 5,
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
  required: {
    type: Boolean,
    default: false,
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
function onValueChange(val) {
  console.log(val);
  emit("update:modelValue", val);
}
</script>

<style lang="scss" scoped>
#custom-textarea {
  margin: 1rem 0;
  textarea {
    padding: 0.5rem 1rem;
    border: 1px solid var(--border-color);
    border-radius: 0.5rem;
    outline: none;
    color: var(--text-secondary-color);
    box-shadow: 0px 0px 7px 0px var(--box-shadow-color) inset;
    box-sizing: border-box;

    &:focus {
      border: 1px solid var(--theme-primary-color);
      color: var(--theme-primary-color) !important;
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

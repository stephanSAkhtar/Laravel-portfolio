<template>
  <div id="custom-input">
    <InputLabel :for="id" :value="label" />

    <input
      :id="id"
      :type="type"
      :class="classes"
      v-model="inputValue"
      required
      autofocus
      @change="onValueChange($event.target.value)"
      autocomplete="newPassword"
    />

    <InputError v-if="message" class="mt-2" :message="message" />
  </div>
</template>

<script setup>
import { ref } from "vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
const props = defineProps({
  type: {
    type: String,
    default: "text",
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
function onValueChange(val) {
  console.log(val);
  emit("update:modelValue", val);
}
</script>

<style lang="scss" scoped>
#custom-input {
  input {
    height: 3.5rem;
    padding: 0.5rem 1rem;
    border: 1px solid var(--border-color);
    width: 100%;
    border-radius: 0.5rem;
  }
}
</style>

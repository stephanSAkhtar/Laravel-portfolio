<template>
  <div>
    <InputLabel :for="id" :value="label" />

    <TextInput
      :id="id"
      :type="type"
      :class="class"
      v-model="modelValue"
      required
      autofocus
      @change="onValueChange"
      autocomplete="newPassword"
    />

    <InputError v-if="message" class="mt-2" :message="message" />
  </div>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
defineProps({
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
  class: {
    type: String,
    default: "mt-1 block w-full",
  },
  modelValue: {
    type: [String, Number],
    default: undefined,
  },
});
const emit = defineEmits(["update:modelValue"]);
function onValueChange(val) {
    console.log(val)
  emit("update:modelValue", val);
}
</script>

<style lang="scss" scoped></style>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomButton from "@/Components/CustomButton.vue";

import { Head, useForm } from "@inertiajs/vue3";

defineProps({
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
});

const submit = () => {
  form.post(route("password.email"));
};
</script>

<template>
  <GuestLayout>
    <Head title="Forgot Password" />

    <div class="mb-4 text-sm text-gray-600">
      Forgot your password? No problem. Just let us know your email address and
      we will email you a password reset link that will allow you to choose a
      new one.
    </div>

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <CustomInput
          label="Email"
          id="email"
          type="email"
          v-model="form.email"
          :message="form.errors.email"
        />
      </div>

      <div class="mt-4 w-full">
        <CustomButton classes="w-full" :loading="form.processing">
          Email Password Reset Link
        </CustomButton>
      </div>
    </form>
  </GuestLayout>
</template>

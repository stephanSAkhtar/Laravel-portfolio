<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import CustomButton from "@/Components/CustomButton.vue";
import CustomInput from "@/Components/CustomInput.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
  email: {
    type: String,
    required: true,
  },
  token: {
    type: String,
    required: true,
  },
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("password.store"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Reset Password" />

    <form @submit.prevent="submit">
      <div>
        <CustomInput
          label="Email"
          id="email"
          type="email"
          class="mt-1 block w-full"
          v-model="form.email"
          :message="form.errors.email"
        />
      </div>

      <div class="mt-4">
        <CustomInput
          label="Password"
          id="password"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password"
          :message="form.errors.password"
        />
      </div>

      <div class="mt-4">
        <CustomInput
          label="Confirm Password"
          id="password_confirmation"
          type="password"
          class="mt-1 block w-full"
          v-model="form.password_confirmation"
          :message="form.errors.password_confirmation"
        />
      </div>

      <div class="mt-4 flex items-center justify-end">
        <CustomButton :loading="form.processing"> Reset Password </CustomButton>
      </div>
    </form>
  </GuestLayout>
</template>

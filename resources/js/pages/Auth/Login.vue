<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomButton from "@/Components/CustomButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

const form = useForm({
  email: "",
  password: "",
  remember: false,
});

const submit = () => {
  form.post(route("login"), {
    onFinish: () => form.reset("password"),
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Log in" />

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
      {{ status }}
    </div>

    <form @submit.prevent="submit" id="login-form">
      <div>
        <CustomInput
          label="Email"
          id="email"
          type="email"
          v-model="form.email"
          :message="form.errors.email"
        />
      </div>

      <div class="mt-4">
        <CustomInput
          label="Password"
          id="password"
          type="password"
          v-model="form.password"
          :message="form.errors.password"
        />
      </div>

      <div class="mt-4 block">
        <label class="flex items-center">
          <Checkbox name="remember" v-model:checked="form.remember" />
          <span class="text-white">Remember me</span>
        </label>
      </div>

      <div class="mt-4 flex items-center justify-between w-full">
        <Link
          v-if="canResetPassword"
          :href="route('password.request')"
          class="text-white"
        >
          Forgot your password?
        </Link>

        <CustomButton
          class="mt-8"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Log in
        </CustomButton>
      </div>
    </form>
  </GuestLayout>
</template>
<style lang="scss">
#login-form {
  background: #00000023;
  width: 30rem;
  border: 2px solid #0000004f;
  padding: 2rem;
  border-radius: 1rem;
  .label {
    color: #fff !important;
  }
}
</style>

<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import HeroSection from "@components/Sections/HeroSection.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomButton from "@/Components/CustomButton.vue";
import CustomImageUpload from "@/Components/CustomImageUpload.vue";

const form = ref({});
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Hero</h2>
    </template>
    <div class="hero-section">
      <HeroSection class="preview" />
      <div class="actions">
        <form @submit.prevent="submit" id="login-form">
          <div>
            <CustomImageUpload />
          </div>

          <div class="mt-4">
            <CustomInput
              label="Email"
              id="email"
              type="email"
              v-model="form.email"
              :message="form.errors?.email"
            />
          </div>

          <div class="mt-4 w-full">
            <CustomButton
              classes="w-full"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Log in
            </CustomButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style lang="scss">
.hero-section {
  display: flex;
  .preview {
    width: 60%;
  }
  .actions {
    width: 40%;
  }
}
</style>

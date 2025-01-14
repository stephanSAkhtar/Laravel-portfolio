<script setup>
import { ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import HeroSection from "@components/Sections/HeroSection.vue";
import CustomTextarea from "@/Components/CustomTextarea.vue";
import CustomButton from "@/Components/CustomButton.vue";
import CustomImageUpload from "@/Components/CustomImageUpload.vue";

const form = ref({});
function updateImage(param, type) {
  if (type == "user") {
    form.value.userImg = param;
  } else {
    form.value.maskImg = param;
  }
}
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Hero</h2>
    </template>
    <div class="hero-section">
      <HeroSection
        class="preview"
        :maskImage="form.maskImg"
        :userImage="form.userImg"
        :content="form.content"
      />
      <div class="actions">
        <form @submit.prevent="submit">
          <div class="">
            <CustomImageUpload
              classes="w-full"
              label="Upload User Image"
              @update-image="(val) => updateImage(val, 'user')"
            />
          </div>
          <div class="mt-4">
            <CustomImageUpload
              classes="w-full"
              label="Upload background mask"
              @update-image="(val) => updateImage(val, 'mask')"
            />
          </div>
          <div class="mt-4">
            <CustomTextarea
              label="Content"
              id="content"
              type="text"
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
              Update
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

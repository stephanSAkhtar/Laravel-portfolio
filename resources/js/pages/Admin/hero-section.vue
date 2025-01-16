<script setup>
import { reactive, ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import HeroSection from "@components/Sections/HeroSection.vue";
import CustomTextarea from "@/Components/CustomTextarea.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomButton from "@/Components/CustomButton.vue";
import CustomImageUpload from "@/Components/CustomImageUpload.vue";

const form = reactive({
  userImgStyle: {
    width: 44,
    left: 1.8,
    top: -1,
  },
});
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
        :userImgStyle="userImgStyle"
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
            <CustomInput
              label="User Image Width"
              id="width"
              type="number"
              v-model="form.userImgStyle.width"
            />
          </div>
          <div class="mt-4 flex items-center justify-center">
            <CustomInput
            class="mr-8"
              label="User Image Top"
              id="top"
              type="number"
              v-model="form.userImgStyle.top"
            />
            <CustomInput
              label="User Image Left"
              id="left"
              type="number"
              v-model="form.userImgStyle.left"
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

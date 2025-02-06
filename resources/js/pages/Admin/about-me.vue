<script setup>
import { reactive, ref } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AboutMe from "@components/Sections/AboutMe.vue";
import CustomTextarea from "@/Components/CustomTextarea.vue";
import CustomInput from "@/Components/CustomInput.vue";
import CustomButton from "@/Components/CustomButton.vue";
import CustomImageUpload from "@/Components/CustomImageUpload.vue";
import CustomFileUpload from "@/Components/CustomFileUpload.vue";

const form = ref({
  userImgStyle: {
    width: 33,
    left: 1.1,
    top: -6.1,
  },
  maskImageSize: 80,
  summary: "Greetings, I'm Shahzeb Akhtar, a seasoned Frontend Developer with approximately 2 years of hands-on experience. My passion lies in crafting visually striking and user-friendly web applications that leave a lasting impact. Over the course of my professional journey, I've honed a profound understanding of front-end technologies, frameworks, and industry best practices. My expertise extends to successfully spearheading various projects, and navigating them from inception to fruition. I thrive in collaborative environments, working closely with cross-functional teams to ensure the delivery of exceptional user experiences. My forte lies in translating intricate design concepts into pixel-perfect, responsive websites that seamlessly align with both client objectives and overarching business goals. With a commitment to excellence, I bring a blend of creativity and technical proficiency to every project, ensuring a harmonious fusion of aesthetics and functionality.",
  summaryHeading: "Solid Experience in building Vue js responsive web apps."
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
      <h2 class="text-xl font-semibold leading-tight text-gray-800">About</h2>
    </template>
    <div class="about-section">
      <AboutMe class="preview" :maskImage="form.maskImg" :userImage="form.userImg" :summary="form.summary"
        :summaryHeading="form.summaryHeading" :userImgStyle="form.userImgStyle" :maskImageSize="form.maskImageSize" />
      <hr>
      <div class="actions">
        <form @submit.prevent="submit">
          <div class="">
            <CustomImageUpload classes="w-full" label="Upload User Image"
              @update-image="(val) => updateImage(val, 'user')" />
          </div>
          <div class="mt-4">
            <CustomImageUpload classes="w-full" label="Upload background mask"
              @update-image="(val) => updateImage(val, 'mask')" />
          </div>
          <div class="mt-4 flex items-center justify-between">
            <CustomInput label="User Image Width" id="width" type="number" v-model="form.userImgStyle.width" />
            <CustomInput label="Background Image Width" id="width" type="number" v-model="form.maskImageSize" />
          </div>
          <div class="mt-4 flex items-center justify-between">
            <CustomInput label="User Image Top" id="top" type="number" v-model="form.userImgStyle.top" />
            <CustomInput label="User Image Left" id="left" type="number" v-model="form.userImgStyle.left" />
          </div>
          <hr style="border:1px dashed;">
          <div class="mt-4">
            <CustomInput label="Summary Heading" id="summaryHeading" v-model="form.summaryHeading" />
          </div>
          <div class="mt-4">
            <CustomTextarea label="Summary" id="summary" v-model="form.summary" />
          </div>
          <div class="mt-4 w-full">
            <CustomFileUpload label="CV" id="summary" classes="w-full" />
          </div>
          <div class="mt-4 w-full">
            <CustomButton classes="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Update
            </CustomButton>
          </div>
        </form>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<style lang="scss">
.about-section {
  display: block;

  // .preview {
  //   width: 60%;
  //   .poster-wrapper{
  //     width: 100% !important;

  //   }
  //   .title-col{
  //     display: none !important;
  //   }

  // }
  hr {
    margin: 5rem 0;
  }

  .actions {
    width: 50%;
    margin: auto;
  }
}
</style>

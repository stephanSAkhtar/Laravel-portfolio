<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import AboutMe from "@components/Sections/AboutMe.vue";
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">About</h2>
    </template>
    <AboutMe />
  </AuthenticatedLayout>
</template>

<style lang="scss">
.about-me {
  height: 100%;
  .poster-wrapper {
    // width: 48%;

    .poster {
      width: 75%;
      position: relative;
      height: 100%;

      .image-wrapper {
        text-align: center;
        position: relative;
        width: 50rem;
        height: 50rem;
        .image-layer {
          position: absolute;
          left: 0;
          width: 60rem;
          height: 100%;
          overflow: hidden;

          .layer-image {
            position: relative;
            zoom: 1.2;
            top: -4.5rem;
            width: 53%;
            left: 1.1rem;
          }
          &:first-child {
            // mask-image: url('~/assets/images/mask-image.png');
            mask-image: url("@images/splash/mask.png");
            mask-size: contain;
            mask-repeat: no-repeat;
            mask-position: center;
            &::before {
              content: "";
              top: 0;
              left: 0;
              height: 100%;
              width: 100%;
              overflow: hidden !important;
              position: absolute;
              z-index: 1;
              background: var(--theme-gradient-primary-color);
            }
            .layer-image {
              z-index: 2;
            }
          }
          &:last-child {
            height: 20rem;
            overflow: hidden !important;
            .layer-image {
              z-index: 5;
            }
          }
        }
      }
    }
  }
}
</style>

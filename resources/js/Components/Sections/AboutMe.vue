<template>
  <div class="about-me row pt-7"
    :style="{ '--mask-image': `url(${maskImage})`, '--mask-image-size': `${maskImageSize}rem` }">
    <div class="poster-wrapper col-6">
      <div class="poster">
        <div class="image-wrapper">
          <div class="image-layer">
            <img class="layer-image"
              :style="`width:${userImgStyle.width}rem;top:${userImgStyle.top}rem;left:${userImgStyle.left}rem;`"
              :src="userImage" alt="" />
          </div>
          <div class="image-layer">
            <img class="layer-image"
              :style="`width:${userImgStyle.width}rem;top:${userImgStyle.top}rem;left:${userImgStyle.left}rem;`"
              :src="userImage" alt="" />
          </div>
        </div>
      </div>
    </div>
    <div class="title col">
      <div class="text-line">
        <div class="text">About Me</div>
      </div>
    </div>
    <div class="about col-5">
      <div class="description">
        <h1>{{ summaryHeading }}</h1>
        <p>
          {{ summary }}
        </p>
      </div>
      <div class="action text-center">
        <CustomButton @click="downloadCv">Download CV</CustomButton>
      </div>
    </div>
  </div>
</template>

<script setup>
import CustomButton from '../CustomButton.vue'
import maskImageDefault from '@images/splash/mask.png'
import userImageDefault from '@images/pic-3.png'
const defaultSummary="Greetings, I'm Shahzeb Akhtar, a seasoned Frontend Developer with approximately 2 years of hands-on experience. My passion lies in crafting visually striking and user-friendly web applications that leave a lasting impact. Over the course of my professional journey, I've honed a profound understanding of front-end technologies, frameworks, and industry best practices. My expertise extends to successfully spearheading various projects, and navigating them from inception to fruition. I thrive in collaborative environments, working closely with cross-functional teams to ensure the delivery of exceptional user experiences. My forte lies in translating intricate design concepts into pixel-perfect, responsive websites that seamlessly align with both client objectives and overarching business goals. With a commitment to excellence, I bring a blend of creativity and technical proficiency to every project, ensuring a harmonious fusion of aesthetics and functionality."
const props = defineProps({
  maskImage: {
    type: [String, Object],
    default: maskImageDefault,
  },
  userImage: {
    type: [String, File],
    default: userImageDefault,
  },
  maskImageSize: {
    type: [Number, String],
    default: 80
  },
  userImgStyle: {
    type: Object,
    default: () => ({
      width: 33,
      left: 1.1,
      top: -6.1,
    }),
  },
  summary: {
    type: String,
    default: defaultSummary,
  },
  summaryHeading: {
    type: String,
    default: "Solid Experience in building Vue js responsive web apps.",
  },
  resume: {
    type: File,
    default: null,
  },
});
function downloadCv() {
  fetch('/My-Resume.pdf')
    .then((response) => response.blob())
    .then((blob) => {
      const url = window.URL.createObjectURL(blob)
      const link = document.createElement('a')
      link.href = url
      link.setAttribute('download', 'My-Resume.pdf')
      link.click()
    })
}
</script>

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

          }

          &:first-child {
            // mask-image: url('~/assets/images/mask-image.png');
            mask-image: var(--mask-image);
            -webkit-mask-image: var(--mask-image);
            mask-size: var(--mask-image-size);
            mask-size: contain;
            mask-repeat: no-repeat;
            mask-position: center;

            &::before {
              content: '';
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

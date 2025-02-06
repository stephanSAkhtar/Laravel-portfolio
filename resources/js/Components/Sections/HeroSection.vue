<template>
  <div class="hero-wrapper"
    :style="{ '--mask-image': `url(${maskImage})`, '--mask-image-size': `${maskImageSize}rem` }">
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
    <div class="hero-text">{{ content }}</div>
  </div>
</template>

<script setup>
import { ref } from "vue";
import maskImageDefault from "@images/splash/new-mask-3.png";
import userImageDefault from "@images/pic-2.png";

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
      width: 44,
      left: 1.8,
      top: -1,
    }),
  },
  content: {
    type: String,
    default: "Hi, I'm Shahzeb Akhtar, and I am a web developer",
  },
});
</script>

<style lang="scss">
.hero-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 65rem;

  .image-wrapper {
    display: block;
    text-align: center;

    .image-layer {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      // height: 100%;
      overflow: hidden;

      .layer-image {
        position: relative;
      }

      &:first-child {
        // mask-image: url('~/assets/images/mask-image.png');
        mask-image: var(--mask-image);
        -webkit-mask-image: var(--mask-image);
        mask-size: var(--mask-image-size);
        mask-repeat: no-repeat;
        mask-position: center;
        width: -webkit-fill-available;

        @media screen and (max-width: 500px) {
          mask-size: calc(80rem - 33%);
        }

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
        height: 40rem;
        overflow: hidden !important;

        .layer-image {
          z-index: 5;
        }

        @media screen and (max-width: 500px) {}
      }
    }
  }

  .hero-text {
    font-size: 4.8rem;
    position: absolute;
    top: 30rem;
    z-index: 99;
    color: var(--text-white-color);
    font-weight: 900;
    letter-spacing: 0.2rem;
    text-shadow: 0rem 0rem 2rem black;
    text-align: center;
    width: 60rem;
  }
}
</style>

<template>
    <div>
      <div class="layout-header">
        <TheHeader />
        <div id="scrollProgressBar">
          <div class="progress-bar" :style="{ width: `${scrollProgress}%` }"></div>
        </div>
      </div>
      <div class="layout-content">
        <div class="body-wrapper container">
          <NuxtPage />
        </div>
      </div>
      <div>
        <div class="scroll-button" v-if="scroll >= 200">
          <button class="circle-button" @click="scrollToTop">
            <i class="fa-solid fa-up-long"></i>
          </button>
        </div>
        <TheFooter />
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  
  import TheHeader from '@components/Layout/TheHeader';
  import TheFooter from '@components/Layout/TheFooter';
  
  const scroll = ref(0);
  const scrollProgress = ref(0);
  
  const getScroll = () => {
    const content = document.getElementById('__layout');
    const scrollY = window.scrollY;
    scroll.value = scrollY;
    const progress =
      (scrollY / (content.scrollHeight - window.innerHeight)) * 100;
    scrollProgress.value = progress;
  };
  
  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };
  
  onMounted(() => {
    document.addEventListener('scroll', getScroll);
  });
  </script>
  
  <style lang="scss">
  /* General Layout */
  .layout-header {
    line-height: 6.4rem;
    padding: 0;
    height: fit-content;
    background-color: var(--bg-primary-color);
  }
  
  .layout-content {
    background-color: var(--bg-primary-color);
  }
  
  /* Scroll Button */
  .scroll-button {
    position: fixed;
    bottom: 7.5rem;
    right: 4rem;
  
    .circle-button {
      font-size: 2rem;
      height: fit-content;
      width: fit-content;
      padding: 0.5rem 1.5rem;
      border: none;
      border-radius: 50%;
      background: linear-gradient(
        0deg,
        var(--theme-primary-color) 1%,
        transparent 48%
      );
      background-size: 102% 200%;
      background-position: top;
      color: var(--text-primary-color);
      cursor: pointer;
      transition: background-position 0.3s, color 0.3s, border-color 0.3s;
  
      &:hover {
        background-position: bottom;
        color: #fff;
        border-color: var(--theme-primary-color);
      }
    }
  }
  
  /* Scroll Progress Bar */
  #scrollProgressBar {
    .progress-bar {
      transition: 0.1s;
      background: var(--theme-gradient-primary-color);
      height: 0.7rem;
      margin-top: -0.1rem;
      width: 0%;
      border-radius: 0rem 1rem 1rem 0px;
    }
  }
  </style>
  
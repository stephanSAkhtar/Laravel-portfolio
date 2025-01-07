<template>
  <div id="guest-layout">
    <slot></slot>
  </div>
</template>

<script setup></script>

<style lang="scss">
/* Guest Layout */
#guest-layout {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width: 100%;
  background: var(--theme-gradient-primary-color);
}
</style>

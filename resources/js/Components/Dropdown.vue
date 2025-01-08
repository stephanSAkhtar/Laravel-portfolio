<template>
  <div class="dropdown" ref="dropdown" @click="toggleDropdown">
    <div class="dropdown-toggle">
      <slot name="trigger">{{ buttonText }}</slot>
    </div>
    <div v-if="isOpen" class="dropdown-menu">
      <slot name="content">
        <ul class="menu">
          <li><a href="#option1">Option 1</a></li>
          <li><a href="#option2">Option 2</a></li>
          <li><a href="#option3">Option 3</a></li>
        </ul>
      </slot>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from "vue";

// Props
const props = defineProps({
  buttonText: {
    type: String,
    default: "Menu",
  },
});

// Reactive state
const isOpen = ref(false);

// Methods
const toggleDropdown = () => {
  isOpen.value = !isOpen.value;
};
const dropdown = ref(null);
const closeDropdown = (event) => {
  const dropdownElement = dropdown.value;
  if (dropdownElement && !dropdownElement.contains(event.target)) {
    isOpen.value = false;
  }
};

// Lifecycle hooks
onMounted(() => {
  document.addEventListener("click", closeDropdown);
});

onBeforeUnmount(() => {
  document.removeEventListener("click", closeDropdown);
});
</script>

<style lang="scss">
/* Dropdown container */
.dropdown {
  position: relative;
  display: inline-block;
  cursor: pointer;

  .dropdown-toggle {
    background-color: #ffffff;
    color: rgb(56, 56, 56) !important;
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;

    &:hover {
      background-color: #efefef;
    }
  }

  .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-top: 5px;
    min-width: 150px;
    z-index: 10;
    list-style: none;

    ul {
      margin: 0;
      padding: 0;

      li {
        text-align: left;
        padding: 10px 5px;
        border-bottom: 1px solid #f0f0f0;
        list-style-type: none;
        &:hover {
          background-color: #f9f9f9;
        }

        a {
          text-decoration: none;
          color: #333;
        }
      }

      li:last-child {
        border-bottom: none;
      }
    }
  }
}
</style>

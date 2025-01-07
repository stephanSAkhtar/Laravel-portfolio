<script setup>
import CustomButton from "@/Components/CustomButton.vue";
import { ref, onMounted, onUnmounted } from "vue";
import { router, Link } from "@inertiajs/vue3";
const themeMode = ref("dark");
const showLogin = ref(false);
const contextMenuPosition = ref({ x: 0, y: 0 });

defineProps({
  canLogin: {
    type: Boolean,
  },
  canRegister: {
    type: Boolean,
  },
});

// Change theme mode between dark and light
function changeThemeMode() {
  themeMode.value = themeMode.value === "dark" ? "light" : "dark";
  const root = document.querySelector(":root");
  if (themeMode.value === "light") {
    root.style.setProperty("--bg-primary-color", "#efefef");
    root.style.setProperty("--text-primary-color", "#000000");
  } else {
    root.style.setProperty("--bg-primary-color", "#000000");
    root.style.setProperty("--text-primary-color", "#ffffff");
  }
}

// Show login button at the right-click position
function showLoginButton(event) {
  event.preventDefault();
  contextMenuPosition.value = { x: event.clientX, y: event.clientY };
  showLogin.value = true;
}

// Placeholder login function
function login() {
  router.push(route("login"));
  showLogin.value = false; // Close menu after login
}
// Hide the login menu when clicking outside
const loginMenu = ref(null);
function handleClickOutside(event) {
  const menu = loginMenu.value;
  if (menu && !menu.contains(event.target)) {
    showLogin.value = false;
  }
}

onMounted(() => {
  document.addEventListener("click", handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener("click", handleClickOutside);
});
</script>
<template>
  <div
    id="main-header-wrapper"
    class="container"
    @contextmenu="showLoginButton($event)"
  >
    <div class="Header-title">
      <div class="logo">Portfolio</div>
    </div>

    <!-- Menu for Navigation Links -->
    <div class="menu">
      <ul>
        <li><a href="#hero-section">Home</a></li>
        <li><a href="#about-me">About</a></li>
        <li><a href="#my-skill">Skill</a></li>
        <li><a href="#my-work">Portfolio</a></li>
        <li><a href="#contact-info">Contact</a></li>
      </ul>
    </div>

    <div class="actions">
      <div @click="changeThemeMode">
        <CustomButton>
          <div v-if="themeMode === 'dark'" title="Switch to light mode">
            <i class="fa-regular fa-moon"></i>
          </div>
          <div v-else title="Switch to dark mode">
            <i class="fa-regular fa-sun"></i>
          </div>
        </CustomButton>
      </div>
    </div>

    <!-- Custom Context Menu (Login Button) -->
    <div
      v-if="showLogin"
      ref="loginMenu"
      class="login-menu"
      :style="{
        top: contextMenuPosition.y + 'px',
        left: contextMenuPosition.x + 'px',
      }"
    >
      <span class="login-button"
        ><Link :href="route('login')">Log in</Link></span
      >
    </div>
  </div>
</template>

<style lang="scss">
#main-header-wrapper {
  position: relative;
  display: flex;
  justify-content: space-around;
  padding: 0% 1rem;
  align-items: center;

  .Header-title {
    display: flex;
    align-items: center;

    .logo {
      text-transform: uppercase;
      font-weight: 500;
      font-size: 4rem;
      font-family: var(--logo-font-family);
      color: var(--text-primary-color) !important;
    }
  }

  .menu {
    display: inline-block;

    ul {
      padding: 0;
      margin: 0;
      display: flex;
      align-items: center;
      list-style: none;
      gap: 1rem;

      li {
        a {
          padding: 1rem;
          color: var(--text-primary-color);
          font-weight: 700;
          text-decoration: none;
          transition: 0.4s;
          background: linear-gradient(
            0deg,
            var(--theme-primary-color) 1%,
            transparent 48%
          );
          background-size: 102% 200%;
          background-position: top;
          &:hover {
            background-position: bottom;
            color: #fff;
            border-radius: 1rem;
          }
        }
      }
    }
  }

  .actions {
    .primary-btn {
      padding: 1rem 2rem;
      background-size: 290% 200%;
    }
  }
}

// Right-click menu styling for login button
.login-menu {
  display: block;
  position: absolute;
  background-color: white;
  padding: 5px 0;
  width: max-content;
  border-radius: 8px;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  z-index: 10;
  .login-button {
    width: 8rem;
    height: 4rem;
    a {
      padding: 5px 10px;
      width: 100%;
      height: 1rem;
      line-height: 1rem;
      text-decoration: none;
      color: var(--theme-primary-color);
      background-color: #fff;
      &:hover {
        background-color: var(--theme-primary-color);
        color: #fff;
      }
    }
  }
}
</style>

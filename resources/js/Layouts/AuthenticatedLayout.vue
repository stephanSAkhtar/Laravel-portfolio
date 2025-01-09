<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link, router } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);
function handleLogout(params) {
  router.post(route("logout"));
}
</script>

<template>
  <div class="app-container">
    <nav class="navigation-bar">
      <!-- Primary Navigation Menu -->
      <div class="navigation-wrapper">
        <div class="navigation-content">
          <div class="navigation-left">
            <!-- Logo -->
            <ApplicationLogo style="color: black;" />

            <!-- Navigation Links -->
            <div class="nav-links">
              <Link
                :href="route('hero.index')"
                :active="route().current('hero.index')"
              >
                Hero
              </Link>

              <Link
                :href="route('about.index')"
                :active="route().current('about.index')"
              >
                About
              </Link>
              <Link
                :href="route('skills.index')"
                :active="route().current('skills.index')"
              >
                Skills
              </Link>
              <Link
                :href="route('portfolio.index')"
                :active="route().current('portfolio.index')"
              >
                Portfolio
              </Link>
              <Link
                :href="route('contact.index')"
                :active="route().current('contact.index')"
              >
                Contact
              </Link>
            </div>
          </div>

          <div class="navigation-right">
            <Dropdown>
              <template #trigger>
                <div class="flex item-center dropdown-trigger">
                  {{ $page.props.auth.user.name }}

                  <svg
                    class="dropdown-icon"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </div>
              </template>

              <template #content>
                <ul class="menu">
                  <li><Link :href="route('profile.edit')">Profile</Link></li>
                  <li><Link href="#" @click="handleLogout">Log Out</Link></li>
                </ul>
              </template>
            </Dropdown>
          </div>

          <!-- Hamburger -->
          <div class="hamburger-menu">
            <button
              @click="showingNavigationDropdown = !showingNavigationDropdown"
              class="hamburger-button"
            >
              <svg
                class="hamburger-icon"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  :class="{
                    hidden: showingNavigationDropdown,
                    visible: !showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{
                    hidden: !showingNavigationDropdown,
                    visible: showingNavigationDropdown,
                  }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Heading -->
    <header class="page-header" v-if="$slots.header">
      <div class="header-container">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <main class="page-content">
      <slot />
    </main>
  </div>
</template>

<style lang="scss">
.app-container {
  min-height: 100vh;
  background-color: #f3f4f6;
}

.navigation-bar {
  position: sticky;
  top: 0;
  z-index: 999;
  border-bottom: 1px solid #d1d5db;
  background-color: #ffffff;
}

.navigation-wrapper {
  max-width: 112rem;
  margin: 0 auto;
  padding: 0 1rem;
  display: flex;
  justify-content: space-between;
  height: 4rem;
}

.navigation-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  .navigation-left {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 70%;
    .nav-links {
      display: flex;
      gap: 2rem;
      a {
        padding: 1rem 2rem;
        text-decoration: none;
        color: #1f2937;
        &:hover {
          background: #efeeee;
        }
      }
    }
  }
}

.logo-wrapper {
  display: flex;
  align-items: center;
}

.logo {
  height: 2.25rem;
  fill: #1f2937;
}

.navigation-right {
  display: none;
  margin-left: 1.5rem;
  align-items: center;

  @media (min-width: 640px) {
    display: flex;
  }
}

.dropdown-trigger {
  display: flex;
  align-items: center;
  justify-content: space-between;
  svg {
    width: 5rem;
    height: 2.5rem;
  }
}

.dropdown-button {
  display: inline-flex;
  align-items: center;
  background-color: #ffffff;
  padding: 0.5rem 0.75rem;
  font-size: 0.875rem;
  font-weight: 500;
  color: #6b7280;
  transition: color 0.15s ease-in-out;

  &:hover {
    color: #374151;
  }
}

.dropdown-icon {
  height: 1rem;
  width: 1rem;
  margin-left: 0.5rem;
}

.hamburger-menu {
  display: flex;
  align-items: center;

  @media (min-width: 640px) {
    display: none;
  }
}

.hamburger-button {
  display: inline-flex;
  justify-content: center;
  padding: 0.5rem;
  border-radius: 0.375rem;
  color: #9ca3af;

  &:hover {
    background-color: #f3f4f6;
    color: #6b7280;
  }
}

.hamburger-icon {
  height: 1.5rem;
  width: 1.5rem;
}

.responsive-menu {
  display: none;
  flex-direction: column;
  padding: 0.5rem 1rem;
  border-top: 1px solid #e5e7eb;

  &.visible {
    display: flex;
  }
}

.responsive-links {
  padding-top: 0.5rem;
  padding-bottom: 0.75rem;
  display: flex;
  flex-direction: column;
}

.responsive-settings {
  border-top: 1px solid #e5e7eb;
  padding-top: 1rem;
  padding-bottom: 0.25rem;
}

.user-info {
  padding: 0 1rem;
}

.user-name {
  font-size: 1rem;
  font-weight: 500;
  color: #1f2937;
}

.user-email {
  font-size: 0.875rem;
  font-weight: 500;
  color: #6b7280;
}

.responsive-actions {
  margin-top: 0.75rem;
  display: flex;
  flex-direction: column;
}

.page-header {
  background-color: #ffffff;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.header-container {
  max-width: 112rem;
  margin: 0 auto;
  padding: 1.5rem 1rem;
  h2 {
    margin: 0%;
  }
}

.page-content {
  padding: 1rem;
}
</style>

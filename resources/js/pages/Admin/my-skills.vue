
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import MySkills from "@components/Sections/MySkills.vue";

import { ref } from "vue";
//===========icons =========
import Bootstrap from "@images/skill-icon/bootstrap.png";
import ClickUp from "@images/skill-icon/clickup.png";
import CSS3 from "@images/skill-icon/css3.png";
import git from "@images/skill-icon/git.png";
import html5 from "@images/skill-icon/html5.png";
import javascript from "@images/skill-icon/javascript.png";
import jquery from "@images/skill-icon/jquery.png";
import npm from "@images/skill-icon/npm.png";
import sass from "@images/skill-icon/sass.png";
import vsCode from "@images/skill-icon/vs-code.png";
import vueJS from "@images/skill-icon/vue.png";

const skills = ref([
  {
    name: "Bootstrap",
    icon: Bootstrap,
  },
  {
    name: "Click Up",
    icon: ClickUp,
  },
  {
    name: "CSS 3",
    icon: CSS3,
  },
  {
    name: "Git Hub",
    icon: git,
  },
  {
    name: "HTML 5",
    icon: html5,
  },

  {
    name: "JavaScript",
    icon: javascript,
  },
  {
    name: "JQuery",
    icon: jquery,
  },
  {
    name: "NPM",
    icon: npm,
  },
  {
    name: "SASS",
    icon: sass,
  },
  {
    name: "vs code",
    icon: vsCode,
  },
  {
    name: "VUE.js",
    icon: vueJS,
  },
]);
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Skills</h2>
    </template>

    <MySkills />
  </AuthenticatedLayout>
</template>


<style lang="scss">
.skill-tooltip-wrapper {
  .ant-tooltip-inner {
    background: var(--theme-primary-color);
    padding: 0.5rem;
    margin-top: -2rem;
    .tool-tip {
      color: var(--text-white-color);
    }
  }
}
.my-skill {
  height: 100%;

  .skill-icons {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    .skill-icon-item {
      height: fit-content;
      padding: 1.5rem;
      text-align: center;
      background: #fff;
      margin: 1rem;
      border-radius: 1.4rem;
      box-shadow: 0rem 0.4rem 2rem -0.4rem var(--box-shadow-color);
      transition: 0.5s;
      position: relative;
      &:hover {
        margin-top: -0.5rem;
      }
      &:hover .tool-tip {
        display: block;
        position: absolute;
        background: var(--theme-primary-color);
        color: var(--text-white-color);
        padding: 0.5rem;
        top: 0;
        left: -0.58rem;
        margin-top: -7.17rem;
        width: 12rem;
        font-size: 1.6rem;
        line-height: 7.2rem;
      }
      .icon {
        img {
          width: 7rem;
          height: 7rem;
          object-fit: cover;
        }
      }
      .tool-tip {
        display: none;
        mask-image: url("@/assets/images/mask-1.png");
        mask-size: 95%;
        mask-repeat: no-repeat;
        height: 72%;
      }
    }
  }
}
</style>

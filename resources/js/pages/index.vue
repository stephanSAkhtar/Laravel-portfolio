<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import HeroSection from '@components/Sections/HeroSection.vue';
import AboutMe from '@components/Sections/AboutMe.vue';
import MyContact from '@components/Sections/MyContact.vue';
import MySkills from '@components/Sections/MySkills.vue';
import MyWork from '@components/Sections/MyWork.vue';
import TheHeader from '@/Layouts/TheHeader.vue';
import TheFooter from '@/Layouts/TheFooter.vue';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const scroll = ref(0);
const scrollProgress = ref(0);
const getScroll = () => {
    const content = document.getElementById('portfolio');
    const scrollY = window.scrollY;
    scroll.value = scrollY;
    const progress =
        (scrollY / (content.scrollHeight - window.innerHeight)) * 100;
    scrollProgress.value = progress;
};

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
onMounted(() => {
    document.addEventListener('scroll', getScroll);
});
</script>

<template>
    <Head title="Shahzeb Portfolio" />
    <div class="bg-primary-bg" id="portfolio">
        <div class="relative">
            <header class="layout-header">
                <TheHeader />

                <div id="scrollProgressBar">
                    <div
                        class="progress-bar"
                        :style="{ width: `${scrollProgress}%` }"
                    ></div>
                </div>
            </header>

            <main class="layout-content">
                <div class="body-wrapper container">
                    <div class="portfolio-wrapper">
                        <div id="hero-section" ref="triggerElement">
                            <HeroSection />
                        </div>
                        <div id="about-me" ref="animatedElement">
                            <AboutMe />
                        </div>
                        <div id="my-skill">
                            <MySkills />
                        </div>
                        <div id="my-work">
                            <MyWork />
                        </div>
                        <div id="contact-info">
                            <MyContact />
                        </div>
                    </div>
                </div>
            </main>

            <footer>
                <div class="scroll-button" v-if="scroll >= 200">
                    <button class="circle-button" @click="scrollToTop">
                        <i class="fa-solid fa-up-long"></i>
                    </button>
                </div>
                <TheFooter />
            </footer>
        </div>
    </div>
</template>
<style lang="scss">
/* General Layout */
.layout-header {
    position: sticky;
    top: 0;
    line-height: 6.4rem;
    padding: 0;
    height: fit-content;
    background-color: var(--bg-primary-color);
    z-index: 999;
}

.layout-content {
    padding: 2rem;
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
        padding: 1rem 1.5rem;
        border: none;
        border-radius: 50%;
        border: 2px dashed var(--theme-primary-color);
        background: linear-gradient(
            0deg,
            var(--theme-primary-color) 1%,
            transparent 48%
        );
        background-size: 102% 200%;
        background-position: top;
        color: var(--text-primary-color);
        cursor: pointer;
        transition:
            background-position 0.3s,
            color 0.3s,
            border-color 0.3s;

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

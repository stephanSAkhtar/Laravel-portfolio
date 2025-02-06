<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';

const props = defineProps({
    visible: {
        type: Boolean,
        default: true,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);
// const dialog = ref();
// const showSlot = ref(props.visible);

// watch(
//     () => props.visible,
//     () => {
//         if (props.visible) {
//             document.body.style.overflow = 'hidden';
//             showSlot.value = true;
// console.log()
//             dialog.value?.showModal();
//         } else {
//             document.body.style.overflow = '';

//             setTimeout(() => {
//                 dialog.value?.close();
//                 showSlot.value = false;
//             }, 200);
//         }
//     },
// );

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape') {
        e.preventDefault();

        if (props.visible) {
            close();
        }
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);

    document.body.style.overflow = '';
});

const maxWidthClass = computed(() => {
    return {
        sm: 'dialog-max-width-sm',
        md: 'dialog-max-width-md',
        lg: 'dialog-max-width-lg',
        xl: 'dialog-max-width-xl',
        '2xl': 'dialog-max-width-2xl',
    }[props.maxWidth];
});
</script>

<template>
    <div v-show="visible" class="dialog-container" ref="dialog">
        <div class="dialog-backdrop" scroll-region>

            <div v-show="visible" class="dialog-overlay" @click="close">
                <div class="dialog-overlay-background" />
            </div>



            <div class="dialog-content" :class="maxWidthClass">
                <slot />
            </div>

        </div>
    </div>
</template>

<style>
.dialog-container {
    z-index: 50;
    margin: 0;
    min-height: 80vh;
    min-width: 90vw;
    overflow-y: auto;
    background-color: transparent;
    backdrop-filter: blur(4px);
}

.dialog-backdrop {
    position: fixed;
    inset: 0;
    z-index: 50;
    overflow-y: auto;
    padding: 1.5rem 0;
    display: flex;
    justify-content: center;
    align-items: center;
}

.dialog-overlay {
    position: fixed;
    inset: 0;
    transition: all 0.2s ease-in-out;
}

.dialog-overlay-background {
    position: absolute;
    inset: 0;
    background-color: rgba(17, 18, 18, 0.155);
    /* Equivalent to Tailwind's bg-gray-500 opacity-75 */
}

.dialog-content {
    margin-bottom: 1.5rem;
    transform: scale(1);
    overflow: hidden;
    border-radius: 0.5rem;
    background-color: white;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease-in-out;
}

.dialog-max-width-sm {
    max-width: 24rem;
    /* Equivalent to Tailwind's sm:max-w-sm */
}

.dialog-max-width-md {
    max-width: 28rem;
    /* Equivalent to Tailwind's sm:max-w-md */
}

.dialog-max-width-lg {
    max-width: 32rem;
    /* Equivalent to Tailwind's sm:max-w-lg */
}

.dialog-max-width-xl {
    max-width: 36rem;
    /* Equivalent to Tailwind's sm:max-w-xl */
}

.dialog-max-width-2xl {
    max-width: 60rem;
    /* Equivalent to Tailwind's sm:max-w-2xl */
}

/* Transition classes for fade effect */
.transition-fade-enter {
    transition: opacity 0.3s ease-out;
}

.transition-fade-from {
    opacity: 0;
}

.transition-fade-to {
    opacity: 1;
}

.transition-fade-leave {
    transition: opacity 0.2s ease-in;
}

.transition-fade-leave-from {
    opacity: 1;
}

.transition-fade-leave-to {
    opacity: 0;
}

/* Transition classes for scale effect */
.transition-scale-enter {
    transition: transform 0.3s ease-out, opacity 0.3s ease-out;
}

.transition-scale-from {
    opacity: 0;
    transform: translateY(1rem) scale(0.95);
}

.transition-scale-to {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.transition-scale-leave {
    transition: transform 0.2s ease-in, opacity 0.2s ease-in;
}

.transition-scale-leave-from {
    opacity: 1;
    transform: translateY(0) scale(1);
}

.transition-scale-leave-to {
    opacity: 0;
    transform: translateY(1rem) scale(0.95);
}
</style>

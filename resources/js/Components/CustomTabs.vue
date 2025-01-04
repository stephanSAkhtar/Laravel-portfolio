<template>
    <div>
        <div>
            <div id="tabs-wrapper">
                <ul>
                    <li
                        v-for="(tab, index) in tabs"
                        :key="index"
                        :class="{ active: activeTab === tab.key }"
                        @click="setActiveTab(tab.key)"
                    >
                        {{ tab.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
let props = defineProps({
    activeTab: String,
    padding: [String, Number],
    tabs: Array,
    classes: String,
});
let emit = defineEmits(['updateActiveTab']);
const setActiveTab = (tab) => {
    emit('updateActiveTab', tab);
};
</script>
<style lang="scss">
#tabs-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--bg-primary-color);
    ul {
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        list-style: none;
        gap: 1rem;

        li {
            cursor: pointer;
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
            &.active {
                background-position: bottom;
                color: #fff;
                border-radius: 1rem;
            }
        }
    }
}
</style>

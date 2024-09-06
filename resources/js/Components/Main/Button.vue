<script setup>
defineProps(["type", "link", "value", "color"]);
</script>

<template>
    <Link
        v-if="type == 'link'"
        :href="link"
        class="button"
        :style="{ backgroundColor: color }"
    >
        <slot />
        {{ value }}
    </Link>
    <button
        v-else-if="type == 'button'"
        type="button"
        class="button"
        :style="{ backgroundColor: color }"
    >
        <slot />
        {{ value }}
    </button>
    <button
        v-else-if="type == 'submit'"
        type="submit"
        class="button"
        :style="{ backgroundColor: color }"
    >
        <slot />
        {{ value }}
    </button>
</template>

<style scoped>
.button {
    border: none;
    color: white;
    padding: 12px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 7px;
    z-index: 1;
    cursor: pointer;
}
</style>

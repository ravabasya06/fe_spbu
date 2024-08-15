<script setup>
defineProps(["command", "link", "value", "color"]);
</script>

<template>
    <Link v-if="link" :href="link">
        <button class="back-button" :style="{ backgroundColor: color }">
            {{ value }}
        </button>
    </Link>
    <button
        v-else-if="!link"
        class="back-button"
        :style="{ backgroundColor: color }"
    >
        {{ value }}
    </button>
</template>

<style scoped>
.back-button {
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 7px;
    z-index: 1;
}
</style>

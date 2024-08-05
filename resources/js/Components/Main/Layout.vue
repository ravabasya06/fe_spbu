<script setup>
import { watch } from "vue";
import Nav from "./Nav.vue";

const props = defineProps(["title"]);

watch(
    () => props.title,
    (newTitle) => {
        document.title = newTitle;
    },
    { immediate: true },
);
</script>

<template>
    <main>
        <header>
            <Nav />
        </header>
        <article>
            <slot />
        </article>
        <footer>
            <p>&copy; Pertamina 2024</p>
        </footer>
    </main>
</template>

<style scoped>
footer {
    background-color: black;
    bottom: 0;
    width: 100%;
}
footer p {
    margin: 0;
    text-align: center;
}
</style>

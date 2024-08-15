<script setup>
import { watch } from "vue";
import Nav from "./Nav.vue";
import Footer from "./Footer.vue";

const props = defineProps(["title"]);

watch(
    () => props.title,
    (newTitle) => {
        document.title = newTitle;
    },
    { immediate: true }
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
            <Footer />
        </footer>
    </main>
</template>

<style scoped>
article {
    min-height: calc(100vh - 100px);
}
</style>

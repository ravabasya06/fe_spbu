<script>
import navbar from "./nav.vue";

export default {
    components: {
        navbar,
    },
    props: {
        title: String,
    },
    watch: {
        title: {
            immediate: true,
            handler(page) {
                document.title = page;
            },
        },
    },
};
</script>

<template>
    <main>
        <header>
            <navbar />
        </header>
        <article>
            <slot />
        </article>
        <footer>
            <p>&copy; Pertamina 2024</p>
        </footer>
    </main>
</template>

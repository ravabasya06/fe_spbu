<script>
import Layout from "../Shared/Layout.vue";

export default {
    components: {
        Layout,
    },
    props: {
        title: String,
        name: String,
    },
};
</script>

<template>
    <Layout :title="`${title}`">
        <h1>Hello, {{ name }}!</h1>
        <Link href="/about" as="button">About</Link>
    </Layout>
</template>

<style></style>

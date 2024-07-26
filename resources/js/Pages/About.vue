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
        <h1>{{ title }}</h1>
        <p>{{ name }}</p>
    </Layout>
</template>

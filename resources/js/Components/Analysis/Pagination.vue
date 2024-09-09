<script setup>
defineProps(["links"]);
</script>
<template>
    <Link v-if="links" v-for="link in links" :href="link.url">
        {{ link.label }}
    </Link>
</template>
<style scoped></style>

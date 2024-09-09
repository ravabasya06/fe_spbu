<script setup>
defineProps(["links"]);
</script>

<template>
    <div class="page">
        <Link
            v-if="links"
            v-for="link in links"
            :href="link.url"
            :style="{
                backgroundColor: link.active ? 'blue' : 'none',
                borderColor: link.active ? 'blue' : 'none',
            }"
        >
            <span v-html="link.label"></span>
        </Link>
    </div>
</template>

<style scoped>
.page {
    display: flex;
    flex-direction: row;
    gap: 5px;
    justify-content: center;
}
a {
    text-decoration: none;
    color: white;
    border: 1px solid white;
    border-radius: 3px;
    padding: 10px;
}
a:hover {
    border: 1px solid blue;
    background-color: blue;
}
.page a.active {
    border: 1px solid blue;
}
</style>

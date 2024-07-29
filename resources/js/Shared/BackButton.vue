<script>
export default {
    props: {
        to: String,
    },
};
</script>

<template>
    <Link :href="`${to}`">
        <button class="back-button">Back</button>
    </Link>
</template>

<style scoped>
.back-button {
    background-color: blue;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    border-radius: 7px;
    margin-bottom: 15px;
    z-index: 1;
}
</style>

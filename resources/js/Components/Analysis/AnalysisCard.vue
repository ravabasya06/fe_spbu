<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["spbus", "results"]);
</script>
<template>
    <div class="container-cards">
        <Link v-for="spbu in results.data" :href="`/spbu/${spbu.spbu_id}`">
            <div class="card">
                <h3>{{ spbu.name }}</h3>
                <p>{{ spbu.road }}</p>
            </div>
        </Link>
    </div>
</template>
<style scoped>
.container-cards {
    display: grid;
    grid-template-columns: auto auto auto auto;
    flex-wrap: wrap;
    gap: 15px;
    margin: 30px;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    border: solid 1px red;
    border-radius: 5px;
    text-align: center;
    background-color: #121212;
    color: white;
    text-decoration: none;
}
a {
    text-decoration: none;
}
@media only screen and (max-width: 600px) {
    .container-cards {
        display: flex;
        flex-direction: column;
        margin: 50px;
    }
}
</style>

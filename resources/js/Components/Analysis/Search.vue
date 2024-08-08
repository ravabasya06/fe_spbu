<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const query = ref("");

const search = () => {
    const form = useForm({
        search_query: query.value,
    });
    form.get(route("analysis.search"));
};
</script>

<template>
    <div class="search-container">
        <form @submit.prevent="search">
            <input
                v-model="query"
                type="text"
                name="search_query"
                placeholder="Telusuri"
                autocomplete="off"
            />
            <button type="submit">Cari</button>
        </form>
    </div>
</template>

<style scoped>
.search-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.search-container input {
    padding: 10px;
    border-radius: 15px;
    border: none;
    width: 300px;
    margin-right: 5px;
}
.search-container input:focus {
    outline: none;
}
.search-container button {
    padding: 10px 20px;
    border: none;
    border-radius: 15px;
    background-color: blue;
    color: white;
    cursor: pointer;
}
</style>

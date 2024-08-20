<script setup>
import { ref } from "vue";
import { useForm, router } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";

const query = ref("");

const search = () => {
    const form = useForm({
        search_query: query.value,
    });

    if (query.value) {
        form.get(route("analysis.search"));
    } else {
        router.visit("/analysis");
    }
};
</script>

<template>
    <div class="search-container">
        <form class="search-form" @submit.prevent="search">
            <input
                v-model="query"
                type="text"
                name="search_query"
                placeholder="Telusuri"
                autocomplete="off"
            />
            <Button type="submit" value="Cari" color="blue" />
        </form>
    </div>
</template>

<style scoped>
.search-form {
    display: flex;
    gap: 10px;
}
.search-container input {
    padding: 10px;
    border-radius: 7px;
    border: none;
    width: 300px;
}
.search-container input:focus {
    outline: none;
}
</style>

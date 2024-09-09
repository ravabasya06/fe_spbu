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
        form.get(route("analysis.index"));
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
            <Button class="thebutton" type="submit" color="#333">
                <font-awesome-icon icon="magnifying-glass" />
            </Button>
        </form>
    </div>
</template>

<style scoped>
.thebutton {
    border-radius: 0;
    border-top-right-radius: 7px;
    border-bottom-right-radius: 7px;
}
.search-form {
    display: flex;
}
.search-container input {
    padding: 10px;
    border: none;
    border-top-left-radius: 7px;
    border-bottom-left-radius: 7px;
    width: 300px;
}
.search-container input:focus {
    outline: none;
}
@media only screen and (max-width: 500px) {
    .search-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .search-container input {
        width: 150px;
    }
}
@media only screen and (max-width: 400px) {
    .search-container {
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .search-container input {
        width: 100px;
    }
}
</style>

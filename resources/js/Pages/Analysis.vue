<script setup>
import Layout from "../Components/Main/Layout.vue";
import AnalysisCard from "../Components/Analysis/AnalysisCard.vue";
import Pagination from "../Components/Analysis/Pagination.vue";

defineProps(["spbus", "query", "results"]);
</script>

<template>
    <Layout title="Analysis">
        <AnalysisCard :spbus="spbus" :results="results" />
        <Pagination v-if="results.links" :links="results.links" />
    </Layout>
</template>

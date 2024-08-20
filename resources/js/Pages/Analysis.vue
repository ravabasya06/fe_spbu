<script setup>
import Layout from "../Components/Main/Layout.vue";
import AnalysisCard from "../Components/Analysis/AnalysisCard.vue";

defineProps(["spbus", "query", "results"]);
</script>

<template>
    <Layout title="Analysis">
        <AnalysisCard :spbus="spbus" :results="results" />
    </Layout>
</template>

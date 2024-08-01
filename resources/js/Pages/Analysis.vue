<script>
import Search from "../Components/Analysis/Search.vue";
import BackButton from "../Components/Main/BackButton.vue";
import Layout from "../Components/Main/Layout.vue";
import AnalysisCard from "../Components/Analysis/AnalysisCard.vue";

export default {
    components: {
        Search,
        BackButton,
        Layout,
        AnalysisCard,
    },
    props: {
        spbus: Array,
    },
};
</script>

<template>
    <Layout title="Analysis">
        <div class="search-wrapper">
            <Search />
        </div>
        <div class="list">
            <AnalysisCard :spbus="spbus" />
        </div>
    </Layout>
</template>

<style scoped>
.search-wrapper {
    display: flex;
    justify-content: center;
}
.navigation {
    position: absolute;
    padding: 10px;
    border-radius: 5px;
    z-index: 10;
    color: white;
    text-decoration: none;
}
</style>

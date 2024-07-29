<script setup>
import navView from "../Shared/nav.vue";
import Search from "../Shared/Search.vue";
import BackButton from "../Shared/BackButton.vue";
import AnalysisData from "../Shared/AnalysisData.vue";
</script>

<template>
    <nav>
        <navView />
    </nav>
    <div class="search-wrapper">
        <Search />
    </div>
    <div class="navigation">
        <BackButton to="/" />
    </div>
    <div class="list">
        <AnalysisData />
    </div>
</template>

<style scoped>
.search-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(50vh - 50px);
}
.navigation {
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-40%, -50%);
    padding: 10px;
    border-radius: 5px;
    z-index: 10;
    color: white;
    text-decoration: none;
}
</style>

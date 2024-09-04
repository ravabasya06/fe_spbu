<script setup>
import Layout from "../Components/Main/Layout.vue";
import DashboardData from "../Components/Dashboard/DashboardData.vue";
import Button from "../Components/Main/Button.vue";
import Map from "../Components/Dashboard/Map.vue";
defineProps(["islands", "provinces", "spbus"]);
</script>

<template>
    <Layout title="Dashboard">
        <div class="map-container">
            <Map :spbus="spbus" />
        </div>
        <div class="navigation">
            <Button type="link" href="/" value="Back" color="blue" />
        </div>
        <DashboardData :islands="islands" :provinces="provinces" />
    </Layout>
</template>

<style scoped>
.navigation {
    position: absolute;
    top: 90%;
    left: 50%;
    transform: translate(-40%, -50%);
    padding: 10px;
    border-radius: 5px;
    z-index: 5;
    color: white;
    text-decoration: none;
}

.container {
    text-align: center;
}

.map-container {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.map {
    width: 100%;
    height: auto;
}
</style>

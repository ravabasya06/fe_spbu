<script setup>
import Layout from "../Components/Main/Layout.vue";
import DashboardData from "../Components/Dashboard/DashboardData.vue";
import Button from "../Components/Main/Button.vue";
</script>

<template>
    <Layout title="Dashboard">
        <div class="map-container">
            <img
                src="../../../public/images/map.jpg"
                alt="Map of Indonesia"
                class="map"
            />
        </div>
        <div class="navigation">
            <Button href="/" value="Back" color="blue" />
        </div>
        <DashboardData />
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
    z-index: 10;
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

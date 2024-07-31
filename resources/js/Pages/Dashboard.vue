<script setup>
import Layout from "../Shared/Layout.vue";
import dashboardData from "../Shared/DashboardData.vue";
import BackButton from "../Shared/BackButton.vue";
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
            <BackButton href="/" />
        </div>
        <dashboardData />
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

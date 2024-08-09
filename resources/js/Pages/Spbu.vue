<script setup>
import BackButton from "../Components/Main/BackButton.vue";
import Layout from "../Components/Main/Layout.vue";
import SpbuSidebar1 from "../Components/Spbu/SpbuSidebar1.vue";
import SpbuSidebar2 from "../Components/Spbu/SpbuSidebar2.vue";

defineProps([
    "spbu",
    "cctvs",
    "dispensers",
    "fireDetections",
    "fraudDetections",
    "objectDetections",
    "vehicles",
    "totalWoman",
    "totalMan",
    "totalMotor",
    "totalCar",
    "totalBus",
    "totalTruck",
]);
</script>

<template>
    <Layout title="Profile SPBU">
        <main class="spbu">
            <SpbuSidebar1
                :spbu="spbu"
                :dispensers="dispensers"
                :vehicles="vehicles"
                :totalMotor="totalMotor"
                :totalCar="totalCar"
                :totalBus="totalBus"
                :totalTruck="totalTruck"
                :fireDetections="fireDetections"
                :fraudDetections="fraudDetections"
                :objectDetections="objectDetections"
            />
            <div class="main-content">
                <h1>{{ spbu.name }}</h1>
                <img
                    src="../../../public/images/spbu.png"
                    alt="SPBU Image"
                    class="station-image"
                />
                <div class="button">
                    <BackButton href="/analysis" />
                </div>
            </div>
            <SpbuSidebar2
                :cctvs="cctvs"
                :totalWoman="totalWoman"
                :totalMan="totalMan"
            />
        </main>
    </Layout>
</template>

<style scoped>
.spbu {
    display: flex;
    flex: 1;
}
.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 100px;
}
.station-image {
    width: 80%;
    max-width: 500px;
}
</style>

<script setup>
import BackButton from "../Components/Main/BackButton.vue";
import Layout from "../Components/Main/Layout.vue";
import SpbuSidebar1 from "../Components/Spbu/SpbuSidebar1.vue";
import SpbuSidebar2 from "../Components/Spbu/SpbuSidebar2.vue";
</script>
<script>
export default {
    components: {
        Layout,
        BackButton,
    },
    props: {
        spbu: Object,
        cctvs: Object,
        dispensers: Object,
        fireDetections: Object,
        fraudDetections: Object,
        objectDetections: Object,
        vehicles: Object,

        totalWoman: Number,
        totalMan: Number,
        grandTotal: Number,

        totalFire: Number,
        totalFraud: Number,
        totalObject: Number,

        totalMotor: Number,
        totalCar: Number,
        totalBus: Number,
        totalTruck: Number,
        totalVehicle: Number,
    },
};
</script>

<template>
    <Layout title="Profile SPBU">
        <main class="spbu">
            <SpbuSidebar1
                :dispensers="dispensers"
                :totalFire="totalFire"
                :totalFraud="totalFraud"
                :totalObject="totalObject"
                :totalMotor="totalMotor"
                :totalCar="totalCar"
                :totalBus="totalBus"
                :totalTruck="totalTruck"
                :totalVehicle="totalVehicle"
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
                :grandTotal="grandTotal"
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

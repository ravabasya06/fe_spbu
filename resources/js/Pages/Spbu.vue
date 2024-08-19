<script setup>
import Button from "../Components/Main/Button.vue";
import Layout from "../Components/Main/Layout.vue";
import SpbuSidebar1 from "../Components/Spbu/SpbuSidebar1.vue";
import SpbuSidebar2 from "../Components/Spbu/SpbuSidebar2.vue";

defineProps([
    "user",
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

// const deleteSpbu = () => {
//     if (confirm("Delete this spbu?")) {
//         Inertia.delete(`/spbu/${spbu.spbu_id}`);
//     }
// };
</script>

<script>
export default {
    methods: {
        deleteSpbu() {
            if (confirm("Delete this spbu?")) {
                this.$inertia.delete("/spbu/" + this.spbu.spbu_id);
            }
        },
    },
};
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
                <div class="buttons">
                    <Button
                        type="link"
                        v-if="user.isAdmin"
                        :href="`/spbu/${spbu.spbu_id}/edit`"
                        value="Edit"
                        color="green"
                    />
                    <Button
                        type="link"
                        href="/analysis"
                        value="Back"
                        color="blue"
                    />
                    <form v-if="user.isAdmin" @submit.prevent="deleteSpbu">
                        <Button type="submit" color="red" value="Delete" />
                    </form>
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
.main-content h1 {
    font-size: 35px;
}
.station-image {
    width: 80%;
    max-width: 500px;
}
.buttons {
    display: flex;
    text-align: center;
    gap: 25px;
}
</style>

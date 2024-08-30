<script setup>
import { ref } from "vue";
import VehicleButton from "../Button/VehicleButton.vue";
import CarEdit from "./VehicleEdit.vue";
const currentVehicle = ref("Motor");
const updateVehicle = (layout) => {
    currentVehicle.value = layout;
};

defineProps([
    "spbu",
    "motorVehicles",
    "carVehicles",
    "busVehicles",
    "truckVehicles",
]);
</script>

<template>
    <div class="Detection-Edit">
        <div class="container">
            <VehicleButton @update-vehicle="updateVehicle" />
            <CarEdit
                v-if="currentVehicle == 'Motor'"
                :spbu="spbu"
                :title="currentVehicle"
                :vehicles="motorVehicles"
            />
            <CarEdit
                v-if="currentVehicle == 'Mobil'"
                :spbu="spbu"
                :title="currentVehicle"
                :vehicles="carVehicles"
            />
            <CarEdit
                v-if="currentVehicle == 'Bis'"
                :spbu="spbu"
                :title="currentVehicle"
                :vehicles="busVehicles"
            />
            <CarEdit
                v-if="currentVehicle == 'Truk'"
                :spbu="spbu"
                :title="currentVehicle"
                :vehicles="truckVehicles"
            />
        </div>
    </div>
</template>
<style scoped>
.Detection-Edit {
    display: flex;
    justify-content: center;
}

.container {
    border: 1px solid #ffffff;
    max-width: 750px;
    width: 100%;
    margin: 20px;
    background: #000000;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    color: #fff;
}
</style>

<script setup>
import { ref } from "vue";
import VehicleButton from "../Button/VehicleButton.vue";
import CarEdit from "./Vehicles/CarEdit.vue";
import MotorEdit from "./Vehicles/MotorEdit.vue";
import BusEdit from "./Vehicles/BusEdit.vue";
import TruckEdit from "./Vehicles/TruckEdit.vue";
const currentVehicle = ref("mobil");
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
                v-if="currentVehicle == 'mobil'"
                :spbu="spbu"
                :carVehicles="carVehicles"
            />
            <MotorEdit
                v-if="currentVehicle == 'motor'"
                :spbu="spbu"
                :motorVehicles="motorVehicles"
            />
            <BusEdit
                v-if="currentVehicle == 'bus'"
                :spbu="spbu"
                :busVehicles="busVehicles"
            />
            <TruckEdit
                v-if="currentVehicle == 'truck'"
                :spbu="spbu"
                :truckVehicles="truckVehicles"
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

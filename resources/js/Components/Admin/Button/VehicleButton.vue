<script setup>
import Button from "../../../Components/Main/Button.vue";
import { ref } from "vue";
const emit = defineEmits(["update-vehicle"]);
const currentVehicle = ref("mobil");
const showVehicle = (layout) => {
    currentVehicle.value = layout;
    emit("update-vehicle", layout);
};
</script>
<template>
    <div class="buttons">
        <Button
            type="button"
            @click="showVehicle('mobil')"
            value="Mobil"
            color="blue"
        />
        <Button
            type="button"
            @click="showVehicle('motor')"
            value="Motor"
            color="blue"
        />
        <Button
            type="button"
            @click="showVehicle('bus')"
            value="Bus"
            color="blue"
        />
        <Button
            type="button"
            @click="showVehicle('truck')"
            value="Truck"
            color="blue"
        />
    </div>
</template>
<style scoped>
.buttons {
    display: flex;
    text-align: center;
    gap: 25px;
    margin-bottom: 10px;
}
</style>

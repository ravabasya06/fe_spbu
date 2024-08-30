<script setup>
import Button from "../../../Components/Main/Button.vue";
import { ref } from "vue";
const emit = defineEmits(["update-vehicle"]);
const currentVehicle = ref("Motor");
const showVehicle = (layout) => {
    currentVehicle.value = layout;
    emit("update-vehicle", layout);
};
</script>
<template>
    <div class="buttons">
        <Button
            type="button"
            @click="showVehicle('Motor')"
            value="Motor"
            color="blue"
        />
        <Button
            type="button"
            @click="showVehicle('Mobil')"
            value="Mobil"
            color="blue"
        />
        <Button
            type="button"
            @click="showVehicle('Bis')"
            value="Bis"
            color="blue"
        />
        <Button
            type="button"
            @click="showVehicle('Truk')"
            value="Truk"
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

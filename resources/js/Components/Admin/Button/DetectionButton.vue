<script setup>
import Button from "../../../Components/Main/Button.vue";
import { ref } from "vue";
const emit = defineEmits(["update-detection"]);
const currentDetection = ref("Fire");
const showDetection = (layout) => {
    currentDetection.value = layout;
    emit("update-detection", layout);
};
</script>
<template>
    <div class="buttons">
        <Button
            type="button"
            @click="showDetection('Fire')"
            value="Fire"
            color="blue"
        />
        <Button
            type="button"
            @click="showDetection('Fraud')"
            value="Fraud"
            color="blue"
        />
        <Button
            type="button"
            @click="showDetection('Object')"
            value="Object"
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

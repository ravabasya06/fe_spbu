<script setup>
import Button from "../../../Components/Main/Button.vue";
import { ref } from "vue";
const emit = defineEmits(["update-detection"]);
const currentDetection = ref("fire");
const showDetection = (layout) => {
    currentDetection.value = layout;
    emit("update-detection", layout);
};
</script>
<template>
    <div class="buttons">
        <Button
            type="button"
            @click="showDetection('fire')"
            value="Fire"
            color="blue"
        />
        <Button
            type="button"
            @click="showDetection('fraud')"
            value="Fraud"
            color="blue"
        />
        <Button
            type="button"
            @click="showDetection('object')"
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

<script setup>
import { ref } from "vue";
import DetectionButton from "../Button/DetectionButton.vue";
import FireEdit from "./FireEdit.vue";
import FraudEdit from "./FraudEdit.vue";
import ObjectEdit from "./ObjectEdit.vue";

const currentDetection = ref("fire");
const updateDetection = (layout) => {
    currentDetection.value = layout;
};
</script>

<template>
    <div class="Detection-Edit">
        <div class="container">
            <DetectionButton @update-detection="updateDetection" />
            <FireEdit v-if="currentDetection == 'fire'" />
            <FraudEdit v-if="currentDetection == 'fraud'" />
            <ObjectEdit v-if="currentDetection == 'object'" />
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

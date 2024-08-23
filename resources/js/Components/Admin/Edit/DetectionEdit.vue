<script setup>
import { ref } from "vue";
import DetectionButton from "../Button/DetectionButton.vue";
import FireEdit from "./Detections/FireEdit.vue";
import FraudEdit from "./Detections/FraudEdit.vue";
import ObjectEdit from "./Detections/ObjectEdit.vue";

const currentDetection = ref("fire");
const updateDetection = (layout) => {
    currentDetection.value = layout;
};

defineProps(["fireDetections", "fraudDetections", "objectDetections"]);
</script>

<template>
    <div class="Detection-Edit">
        <div class="container">
            <DetectionButton @update-detection="updateDetection" />
            <FireEdit
                v-if="currentDetection == 'fire'"
                :fireDetections="fireDetections"
            />
            <FraudEdit
                v-if="currentDetection == 'fraud'"
                :fraudDetections="fraudDetections"
            />
            <ObjectEdit
                v-if="currentDetection == 'object'"
                :objectDetections="objectDetections"
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

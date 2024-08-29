<script setup>
import { ref } from "vue";
import DetectionButton from "../Button/DetectionButton.vue";
import DetectionEdit from "./DetectionEdit.vue";

const currentDetection = ref("Fire");
const updateDetection = (layout) => {
    currentDetection.value = layout;
};

defineProps(["fireDetections", "fraudDetections", "objectDetections"]);
</script>

<template>
    <div class="Detection-Edit">
        <div class="container">
            <DetectionButton @update-detection="updateDetection" />
            <DetectionEdit
                v-if="currentDetection == 'Fire'"
                :title="currentDetection"
                :detections="fireDetections"
            />
            <DetectionEdit
                v-if="currentDetection == 'Fraud'"
                :title="currentDetection"
                :detections="fraudDetections"
            />
            <DetectionEdit
                v-if="currentDetection == 'Object'"
                :title="currentDetection"
                :detections="objectDetections"
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

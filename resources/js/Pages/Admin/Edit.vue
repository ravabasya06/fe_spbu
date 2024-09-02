<script setup>
import { ref } from "vue";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import FormLayoutButton from "../../Components/Admin/Button/FormLayoutButton.vue";
import SpbuForm from "../../Components/Admin/Form/SpbuForm.vue";
import DispenserList from "../../Components/Admin/Edit/DispenserList.vue";
import CCTVList from "../../Components/Admin/Edit/CCTVList.vue";
import DetectionList from "../../Components/Admin/Edit/DetectionList.vue";
import VehicleList from "../../Components/Admin/Edit/VehicleList.vue";

const currentLayout = ref("spbu");
const updateLayout = (layout) => {
    currentLayout.value = layout;
};

defineProps([
    "islands",
    "provinces",

    "spbu",
    "dispensers",
    "cctvs",

    "fireDetections",
    "fraudDetections",
    "objectDetections",

    "motorVehicles",
    "carVehicles",
    "busVehicles",
    "truckVehicles",
]);
</script>

<template>
    <Layout title="Edit SPBU">
        <FormLayoutButton @update-layout="updateLayout" />
        <SpbuForm
            v-if="currentLayout == 'spbu'"
            :spbu="spbu"
            :islands="islands"
            :provinces="provinces"
        />
        <DispenserList
            v-if="currentLayout == 'dispenser'"
            :spbu="spbu"
            :dispensers="dispensers"
        />
        <CCTVList v-if="currentLayout == 'cctv'" :spbu="spbu" :cctvs="cctvs" />
        <DetectionList
            v-if="currentLayout == 'detection'"
            :spbu="spbu"
            :fireDetections="fireDetections"
            :fraudDetections="fraudDetections"
            :objectDetections="objectDetections"
        />
        <VehicleList
            v-if="currentLayout == 'vehicle'"
            :spbu="spbu"
            :motorVehicles="motorVehicles"
            :carVehicles="carVehicles"
            :busVehicles="busVehicles"
            :truckVehicles="truckVehicles"
        />
        <div class="back-button">
            <Button
                type="link"
                :href="`/spbu/${spbu.spbu_id}`"
                value="Back"
                color="blue"
            />
        </div>
    </Layout>
</template>
<style scoped>
.back-button {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}
</style>

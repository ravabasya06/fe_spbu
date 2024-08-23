<script setup>
import { ref } from "vue";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import FormLayoutButton from "../../Components/Admin/Button/FormLayoutButton.vue";
import SpbuForm from "../../Components/Admin/SpbuForm.vue";
import DispenserList from "../../Components/Admin/Edit/DispenserEdit.vue";
import CCTVEdit from "../../Components/Admin/Edit/CCTVEdit.vue";
import DetectionEdit from "../../Components/Admin/Edit/DetectionEdit.vue";
import VehcileEdit from "../../Components/Admin/Edit/VehicleEdit.vue";

const currentLayout = ref("spbu");
const updateLayout = (layout) => {
    currentLayout.value = layout;
};

defineProps(["spbu", "dispensers"]);
</script>

<template>
    <Layout title="Edit SPBU">
        <FormLayoutButton @update-layout="updateLayout" />
        <SpbuForm v-if="currentLayout == 'spbu'" :spbu="spbu" />
        <DispenserList
            v-if="currentLayout == 'dispenser'"
            :spbu="spbu"
            :dispensers="dispensers"
        />
        <CCTVEdit v-if="currentLayout == 'cctv'" :spbu="spbu" />
        <DetectionEdit v-if="currentLayout == 'detection'" :spbu="spbu" />
        <VehcileEdit v-if="currentLayout == 'vehicle'" />
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

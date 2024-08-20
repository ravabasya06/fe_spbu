<script setup>
import { ref } from "vue";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import FormLayoutButton from "../../Components/Admin/FormLayoutButton.vue";
import SpbuEdit from "../../Components/Admin/SpbuEdit.vue";
import DispenserEdit from "../../Components/Admin/DispenserEdit.vue";
import CCTVEdit from "../../Components/Admin/CCTVEdit.vue";
import DetectionEdit from "../../Components/Admin/DetectionEdit.vue";

const currentLayout = ref("spbu");
const updateLayout = (layout) => {
    currentLayout.value = layout;
};

defineProps(["spbu"]);
</script>

<template>
    <Layout title="Edit">
        <FormLayoutButton @update-layout="updateLayout" />
        <SpbuEdit v-if="currentLayout == 'spbu'" :spbu="spbu" />
        <DispenserEdit v-if="currentLayout == 'dispenser'" :spbu="spbu" />
        <CCTVEdit v-if="currentLayout == 'cctv'" :spbu="spbu" />
        <DetectionEdit v-if="currentLayout == 'detection'" :spbu="spbu" />
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

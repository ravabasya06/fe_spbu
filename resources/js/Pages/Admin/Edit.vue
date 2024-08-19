<script setup>
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import SpbuEdit from "../../Components/Admin/SpbuEdit.vue";
import DispenserEdit from "../../Components/Admin/DispenserEdit.vue";
import CCTVEdit from "../../Components/Admin/CCTVEdit.vue";
import { ref } from "vue";
const currentLayout = ref("spbu");
const showLayout = (layout) => {
    currentLayout.value = layout;
};

defineProps(["spbu"]);
</script>

<template>
    <Layout title="Edit">
        <div class="buttons">
            <Button
                type="button"
                @click="showLayout('spbu')"
                value="Spbu"
                color="green"
            />
            <Button
                type="button"
                @click="showLayout('dispenser')"
                value="Dispenser"
                color="blue"
            />
            <Button
                type="button"
                @click="showLayout('cctv')"
                value="CCTV"
                color="red"
            />
        </div>
        <SpbuEdit v-if="currentLayout == 'spbu'" :spbu="spbu" />
        <DispenserEdit v-if="currentLayout == 'dispenser'" :spbu="spbu" />
        <CCTVEdit v-if="currentLayout == 'cctv'" :spbu="spbu" />
        <Button
            type="link"
            :href="`/spbu/${spbu.spbu_id}`"
            value="Back"
            color="blue"
        />
    </Layout>
</template>
<style scoped>
.buttons {
    display: flex;
    text-align: center;
    gap: 25px;
    justify-content: center;
    margin-top: 10px;
}
</style>

<script setup>
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import SpbuPost from "../../Components/Admin/SpbuPost.vue";

import { ref } from "vue";
const currentLayout = ref("spbu");
const showLayout = (layout) => {
    currentLayout.value = layout;
};

defineProps(["spbu"]);
</script>

<template>
    <Layout title="Admin">
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
        <SpbuPost v-if="currentLayout == 'spbu'" :spbu="spbu" />
        <Button type="link" href="/" value="Back" color="blue" />
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

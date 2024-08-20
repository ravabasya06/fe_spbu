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
                color="blue"
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
                color="blue"
            />
        </div>
        <SpbuPost v-if="currentLayout == 'spbu'" :spbu="spbu" />
        <div class="back-button">
            <Button type="link" href="/" value="Back" color="blue" />
        </div>
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
.back-button {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}
</style>

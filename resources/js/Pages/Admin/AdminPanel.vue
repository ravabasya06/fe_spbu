<script setup>
import { ref } from "vue";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import FormLayoutButton from "../../Components/Admin/FormLayoutButton.vue";
import SpbuPost from "../../Components/Admin/SpbuPost.vue";

const currentLayout = ref("spbu");
const updateLayout = (layout) => {
    currentLayout.value = layout;
};

defineProps(["spbu"]);
</script>

<template>
    <Layout title="Admin">
        <FormLayoutButton @update-layout="updateLayout" />
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

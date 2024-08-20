<script setup>
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import SpbuForm from "../../Components/Admin/SpbuForm.vue";

defineProps(["spbu"]);
</script>

<template>
    <Layout title="Admin">
        <SpbuForm />
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

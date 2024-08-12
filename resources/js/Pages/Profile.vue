<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../Components/Main/Layout.vue";

const props = defineProps(["user"]);

const logoutForm = useForm({});

const logout = () => {
    console.log("Logging out");
    logoutForm.post(route("logout"));
};
</script>

<template>
    <Layout title="Profile">
        <div class="profile">
            <div class="profile-container">
                <h1>Welcome, {{ user.name }}</h1>
                <form @submit.prevent="logout">
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.profile {
    height: 85vh;
    align-content: center;
}
.profile-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #000000;
}

button {
    background-color: #c32130;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #b71c25;
}
</style>

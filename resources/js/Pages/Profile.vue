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
                <p>
                    Created At: {{ user.created_at }} <br />
                    Updated At: {{ user.updated_at }}
                </p>

                <form @submit.prevent="logout">
                    <button type="submit">Logout</button>
                </form>
                <Link href="/changepassword">Change Password</Link>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.profile {
    height: 85vh;
    align-content: center;
}
a {
    color: white;
    font-size: 13px;
    text-decoration: none;
    text-align: left;
    max-width: fit-content;
}
a:hover {
    text-decoration: underline;
}
.profile-container {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #000000;
    gap: 10px;
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

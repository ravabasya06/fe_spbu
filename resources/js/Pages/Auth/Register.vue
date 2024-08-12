<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";

const form = useForm({
    name: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"));
};
</script>

<template>
    <div class="auth-container">
        <h2>Register</h2>
        <form @submit.prevent="submit">
            <div>
                <label for="name">Name</label>
                <input id="name" v-model="form.name" type="text" required />
            </div>
            <div>
                <label for="password">Password</label>
                <input
                    id="password"
                    v-model="form.password"
                    type="password"
                    required
                />
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    required
                />
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<style scoped>
.auth-container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #000000;
}

.auth-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.auth-container form div {
    margin-bottom: 15px;
}

.auth-container label {
    display: block;
    margin-bottom: 5px;
}

.auth-container input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.auth-container button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.auth-container button:hover {
    background-color: #0056b3;
}
</style>

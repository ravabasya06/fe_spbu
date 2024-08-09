<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";

defineProps(["errors"]);

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    form.post(route("login"));
};
</script>

<template>
    <Layout title="Login">
        <div class="login-container">
            <h2>Login</h2>
            <form @submit.prevent="submit">
                <div>
                    <label for="email">Email</label>
                    <input
                        v-model="form.email"
                        id="email"
                        type="email"
                        required
                        autofocus
                    />
                    <span v-if="errors.email">{{ errors.email }}</span>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input
                        v-model="form.password"
                        id="password"
                        type="password"
                        required
                    />
                    <span v-if="errors.password">{{ errors.password }}</span>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </Layout>
</template>

<style scoped>
.login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #000000;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:disabled {
    background-color: #aaa;
}

span {
    color: red;
    font-size: 0.9em;
}
</style>

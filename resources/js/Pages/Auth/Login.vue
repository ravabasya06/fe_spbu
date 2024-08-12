<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    password: "",
});

const submit = () => {
    form.post(route("login"));
};
</script>

<template>
    <div class="login">
        <div class="login-container">
            <h2>Login</h2>
            <form @submit.prevent="submit">
                <div>
                    <label for="name">Name</label>
                    <input
                        v-model="form.name"
                        id="name"
                        type="text"
                        required
                        autocomplete="off"
                        autofocus
                    />
                    <span
                        v-if="form.errors.name"
                        style="color: red; text-align: center"
                        >{{ form.errors.name }}</span
                    >
                </div>
                <div>
                    <label for="password">Password</label>
                    <input
                        v-model="form.password"
                        id="password"
                        type="password"
                        required
                    />
                    <span
                        v-if="form.errors.password"
                        style="color: red; text-align: center"
                        >{{ form.errors.password }}</span
                    >
                </div>
                <button type="submit" :disabled="form.processing">Login</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.login {
    height: 85vh;
    align-content: center;
}
.login-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #000000; /* Adjusted to be lighter */
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
input:focus {
    outline: none;
}
</style>

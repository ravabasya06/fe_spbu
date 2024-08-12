<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";

// Define props to receive errors
const props = defineProps({
    errors: Object,
});

const form = useForm({
    name: "",
    password: "",
});

const submit = () => {
    form.post(route("login"));
};
</script>

<template>
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
                    autofocus
                />
                <span v-if="props.errors.name">{{ props.errors.name }}</span>
            </div>
            <div>
                <label for="password">Password</label>
                <input
                    v-model="form.password"
                    id="password"
                    type="password"
                    required
                />
                <span v-if="props.errors.password">{{
                    props.errors.password
                }}</span>
            </div>
            <button type="submit" :disabled="form.processing">Login</button>
        </form>
    </div>
</template>

<style scoped>
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
</style>

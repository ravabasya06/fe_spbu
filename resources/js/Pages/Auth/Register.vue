<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";

const form = useForm({
    name: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
            }
            if (form.errors.password_confirmation) {
                form.reset("password_confirmation");
            }
        },
    });
};
</script>

<template>
    <Layout title="Register">
        <div class="auth">
            <div class="auth-container">
                <h2>Register</h2>
                <form @submit.prevent="submit">
                    <div>
                        <label for="name">Name</label>
                        <input
                            id="name"
                            v-model="form.name"
                            type="text"
                            autocomplete="off"
                            required
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
                            id="password"
                            v-model="form.password"
                            type="password"
                            autocomplete="off"
                            required
                        />
                        <span
                            v-if="form.errors.password"
                            style="color: red; text-align: center"
                            >{{ form.errors.password }}</span
                        >
                    </div>
                    <div>
                        <label for="password_confirmation"
                            >Confirm Password</label
                        >
                        <input
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            required
                        />
                        <span
                            v-if="form.errors.password_confirmation"
                            style="color: red; text-align: center"
                            >{{ form.errors.password_confirmation }}</span
                        >
                    </div>
                    <Button type="submit" value="Register" color="blue" />
                </form>
            </div>
        </div>
        <div class="back-button">
            <Button type="link" :href="`/`" value="Back" color="blue" />
        </div>
    </Layout>
</template>

<style scoped>
.auth {
    height: 75vh;
    align-content: center;
}
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
}
.back-button {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}
</style>

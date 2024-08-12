<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";
import { ref } from "vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
            }
            if (form.errors.current_password) {
                form.reset("current_password");
            }
        },
    });
};
</script>

<template>
    <Layout title="Change Password">
        <div class="change">
            <div class="change-container">
                <h2>Change Password</h2>
                <form @submit.prevent="submit">
                    <div>
                        <label for="current_password">Current Password</label>
                        <input
                            id="current_password"
                            ref="currentPasswordInput"
                            v-model="form.current_password"
                            type="password"
                            autocomplete="off"
                            required
                        />
                        <span
                            v-if="form.errors.current_password"
                            style="color: red; text-align: center"
                            >{{ form.errors.current_password }}</span
                        >
                    </div>
                    <div>
                        <label for="password">New Password</label>
                        <input
                            id="password"
                            ref="passwordInput"
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
                    <button type="submit">Save</button>
                    <p
                        v-if="form.recentlySuccessful"
                        style="color: lightgreen; text-align: center"
                    >
                        Password updated successfully
                    </p>
                </form>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.change {
    height: 85vh;
    align-content: center;
}
.change-container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    background-color: #000000;
}

.change-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.change-container form div {
    margin-bottom: 15px;
}

.change-container label {
    display: block;
    margin-bottom: 5px;
}

.change-container input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.change-container button {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.change-container button:hover {
    background-color: #0056b3;
}
</style>

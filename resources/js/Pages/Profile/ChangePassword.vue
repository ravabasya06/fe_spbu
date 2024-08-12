<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";
const form = useForm({
    current_password: "",
    new_password: "",
    confirm_password: "",
});

const submit = () => {
    form.post(route("password"));
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
                            id="password"
                            v-model="form.current_password"
                            type="password"
                            autocomplete="off"
                            required
                        />
                    </div>
                    <div>
                        <label for="new_password">New Password</label>
                        <input
                            id="password"
                            v-model="form.new_password"
                            type="password"
                            autocomplete="off"
                            required
                        />
                    </div>
                    <div>
                        <label for="confirm_password">Confirm Password</label>
                        <input
                            id="password"
                            v-model="form.confirm_password"
                            type="password"
                            required
                        />
                    </div>
                    <button type="submit">Save</button>
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

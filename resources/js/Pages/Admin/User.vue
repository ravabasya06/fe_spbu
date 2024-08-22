<script setup>
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";

// const form = useForm({
//     id: user.id,
//     name: user.name,
//     isAdmin: user.isAdmin,
//     created_at: user.created_at,
//     updated_at: user.updated_at,
// });

// const update = () => {
//     form.put(`/users/${form.id}`, {
//         preserveScroll: true,
//         onSuccess: () => form.reset(),
//     });
// };

// defineProps(["user"]);
</script>

<template>
    <Layout title="Edit User">
        <div class="auth-container">
            <h2>Edit User</h2>
            <form class="form" @submit.prevent="update">
                <fieldset disabled="disabled">
                    <label for="id">User ID</label>
                    <input id="id" type="text" autocomplete="off" required />
                </fieldset>
                <fieldset>
                    <label for="name">Name</label>
                    <input id="name" type="text" autocomplete="off" required />
                </fieldset>
                <fieldset>
                    <label for="Admin">Admin</label>
                    <input id="admin" type="number" min="0" max="1" required />
                </fieldset>
                <fieldset disabled="disabled">
                    <label for="created_at">Created At</label>
                    <input
                        id="created_at"
                        type="date"
                        min="0"
                        max="1"
                        required
                    />
                </fieldset>
                <fieldset disabled="disabled">
                    <label for="updated_at">Updated At</label>
                    <input
                        id="updated_at"
                        type="date"
                        min="0"
                        max="1"
                        required
                    />
                </fieldset>
                <Button type="submit" value="Update" color="blue" />
            </form>
        </div>
        <div class="back-button">
            <Button type="link" :href="`/`" value="Back" color="blue" />
        </div>
    </Layout>
</template>

<style scoped>
.form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 20px;
}
.auth-container {
    display: flex;
    justify-content: center;
    flex-direction: column;
    border: 1px solid #ffffff;
    max-width: 750px;
    width: 100%;
    margin: 20px;
    background: #000000;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    color: #fff;
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

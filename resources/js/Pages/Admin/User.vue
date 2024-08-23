<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";

const AdminCheck = ref(["0", "1"]);

const props = defineProps({
    theuser: {
        type: Object,
        required: true,
    },
    user: {
        type: Object,
    },
});

const form = useForm({
    id: props.theuser.id,
    name: props.theuser.name,
    isAdmin: props.theuser.isAdmin,
    created_at: props.theuser.created_at,
    updated_at: props.theuser.updated_at,
});
const update = () => {
    form.put(route("user.update", { id: form.id }), {
        preserveScroll: true,
    });
};
</script>

<template>
    <Layout title="Edit User">
        <div class="auth-container">
            <h2>Edit User</h2>
            <form class="form" @submit.prevent="update">
                <fieldset disabled="disabled">
                    <label for="id">User ID</label>
                    <input
                        v-model="form.id"
                        id="id"
                        type="text"
                        autocomplete="off"
                        required
                    />
                </fieldset>
                <fieldset>
                    <label for="name">Name</label>
                    <input
                        v-model="form.name"
                        id="name"
                        type="text"
                        autocomplete="off"
                        required
                    />
                </fieldset>
                <fieldset v-if="user.id !== theuser.id">
                    <label for="Admin">Admin</label>
                    <select
                        v-model="form.isAdmin"
                        name="admin"
                        id="admin"
                        required
                    >
                        <option
                            v-for="admin in AdminCheck"
                            :key="admin"
                            :value="admin"
                        >
                            {{ admin }}
                        </option>
                    </select>
                </fieldset>
                <fieldset v-else disabled>
                    <label for="Admin">Admin</label>
                    <select name="admin" id="admin" required>
                        <option>
                            Anda tidak dapat mengubah akses milik anda sendiri
                        </option>
                        <option>
                            Changing the field set wont do anything...
                        </option>
                    </select>
                </fieldset>
                <fieldset disabled="disabled">
                    <label for="created_at">Created At</label>
                    <input
                        v-model="form.created_at"
                        id="created_at"
                        type="text"
                        required
                    />
                </fieldset>
                <fieldset disabled="disabled">
                    <label for="updated_at">Updated At</label>
                    <input
                        v-model="form.updated_at"
                        id="updated_at"
                        type="text"
                        required
                    />
                </fieldset>
                <Button type="submit" value="Update" color="blue" />
            </form>
        </div>
        <div class="back-button">
            <Button type="link" :href="`/users`" value="Back" color="blue" />
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
    flex-direction: column;
    align-self: center;
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

<script setup>
import { router } from "@inertiajs/vue3";
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
defineProps(["users"]);

const deleteUser = (user) => {
    router.delete(`/users/${user.id}`, {
        onBefore: () =>
            confirm(`Are you sure you want to delete user ${user.name}?`),
    });
};
</script>
<template>
    <Layout title="User Manager">
        <div class="User-Manager">
            <div class="container">
                <form>
                    <h2>User Manager</h2>
                    <table id="userTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Admin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users" :key="index">
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.isAdmin ? "Yes" : "No" }}</td>
                                <td class="action-container">
                                    <Link href="">Edit</Link>
                                    <form @submit.prevent="deleteUser(user)">
                                        <button
                                            type="submit"
                                            class="delete-button"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Button
                        type="link"
                        href="/register"
                        color="blue"
                        value="Tambah"
                    />
                </form>
            </div>
        </div>
    </Layout>
</template>
<style scoped>
.User-Manager {
    display: flex;
    justify-content: center;
}

.container {
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
.action-container {
    display: flex;
    gap: 25px;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    text-decoration: none;
}
.action-container a {
    text-decoration: none;
}
.action-container a:hover {
    text-decoration: underline;
}
.delete-button {
    border: none;
    background-color: black;
    color: red;
}
.delete-button:hover {
    text-decoration: underline;
}
h2 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 20px;
}
form {
    display: flex;
    flex-direction: column;
}
label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.2em;
}
input[type="number"] {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1.1em;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    font-size: 1.1em;
}

table th,
table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

table th {
    background-color: #2b2b2b;
}
.button-group {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
}
</style>

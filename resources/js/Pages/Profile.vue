<script setup>
import { useForm, router } from "@inertiajs/vue3";
import Layout from "../Components/Main/Layout.vue";
import Button from "../Components/Main/Button.vue";
defineProps(["user"]);

const logoutForm = useForm({});
const logout = () => {
    console.log("Logging out");
    logoutForm.post(route("logout"));
};

const deleteUser = (user) => {
    router.delete(`/profile/${user.id}`, {
        onBefore: () =>
            confirm("Are you sure you want to delete your account?"),
    });
};
</script>

<template>
    <Layout title="Profile">
        <div class="profile">
            <div class="profile-container">
                <h1>Welcome, {{ user.name }}</h1>
                <p>
                    Created At: {{ user.created_at }} <br />
                    Updated At: {{ user.updated_at }}
                </p>
                <p v-if="user.isAdmin">You're an Admin!</p>

                <form @submit.prevent="logout">
                    <Button type="submit" value="Logout" color="red" />
                </form>
                <form
                    class="action-container"
                    @submit.prevent="deleteUser(user)"
                >
                    <Link href="/password">Change Password</Link>
                    <button type="submit" class="delete-button">
                        Delete Account
                    </button>
                </form>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.profile {
    height: 85vh;
    align-content: center;
}
a {
    color: white;
    font-size: 13px;
    text-decoration: none;
}
a:hover {
    text-decoration: underline;
}
.profile-container {
    display: flex;
    flex-direction: column;
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #000000;
    gap: 10px;
}
.action-container {
    display: flex;
    justify-content: space-between;
}
.delete-button {
    border: none;
    background-color: black;
    font-size: 13px;
}
.delete-button:hover {
    text-decoration: underline;
}
</style>

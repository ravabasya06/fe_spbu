<script>
import Layout from "../../Components/Main/Layout.vue";
export default {
    components: {
        Layout,
    },
    props: {
        title: String,
        errors: Object,
    },
    data() {
        return {
            user: {
                name: "",
                email: "",
                password: "",
            },
        };
    },
    methods: {
        register() {
            this.$inertia.post("/users/" + this.user);
        },
    },
};
</script>
<template>
    <Layout v-bind:title="`${title}`">
        <h1>{{ title }}</h1>
        <!-- bisa pake v-on:submit atau @submit -->
        <form @submit.prevent="register">
            <div class="form-group">
                <label>Name</label>
                <input type="text" v-model="user.name" />
                <p v-if="errors.name" class="error">{{ errors.name }}</p>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" v-model="user.email" />
                <p v-if="errors.email" class="error">{{ errors.email }}</p>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" v-model="user.password" />
                <p v-if="errors.password" class="error">
                    {{ errors.password }}
                </p>
            </div>

            <button type="submit">Register</button>
        </form>
    </Layout>
</template>
<style>
.form-group {
    margin: 5px;
}
.error {
    color: red;
}
</style>

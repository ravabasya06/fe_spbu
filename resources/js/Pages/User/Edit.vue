<script>
import Layout from "../../Components/Main/Layout.vue";
export default {
    components: {
        Layout,
    },
    props: {
        title: String,
        errors: Object,
        user: Object,
    },
    data() {
        return {
            form: {
                name: this.user.name,
                email: this.user.email,
            },
        };
    },
    methods: {
        update() {
            this.$inertia.put("/users/" + this.user.id, this.form);
        },
    },
};
</script>
<template>
    <Layout v-bind:title="`${title}`">
        <h1>{{ title }}</h1>
        <!-- bisa pake v-on:submit atau @submit -->
        <form @submit.prevent="update">
            <div class="form-group">
                <label>Name</label>
                <input type="text" v-model="form.name" />
                <p v-if="errors.name" class="error">{{ errors.name }}</p>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" v-model="form.email" />
                <p v-if="errors.email" class="error">{{ errors.email }}</p>
            </div>

            <button type="submit">Update</button>
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

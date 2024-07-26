<script>
import Layout from "../../Shared/Layout.vue";
export default {
    components: {
        Layout,
    },
    props: {
        title: String,
        user: Object,
    },
    methods: {
        deleteuser() {
            if (confirm("Delete this user?")) {
                this.$inertia.delete("/users/" + this.user.id);
            } else {
                return false;
            }
        },
    },
};
</script>

<template>
    <Layout :title="`Profile ${user.name}`">
        <h1>Daftar {{ title }}</h1>
        <ul>
            <li>
                <h3>{{ user.name }}</h3>
                <p>Email : {{ user.email }}</p>
                <p>{{ user.created_at }}</p>
                <Link href="/users">Kembali</Link>
                <Link :href="`/users/${user.id}/edit`">Edit</Link>
                <Link href="" @click.prevent="deleteuser">Delete</Link>
            </li>
        </ul>
    </Layout>
</template>

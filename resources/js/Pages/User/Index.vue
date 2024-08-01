<script>
import Layout from "../../Components/Main/Layout.vue";
export default {
    components: {
        Layout,
    },
    props: {
        title: String,
        users: Array,
    },
};
</script>

<template>
    <Layout title="Daftar User">
        <h1>Daftar {{ title }}</h1>
        <Link href="/users/register">Registrasi</Link>
        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>
        <ul>
            <li v-for="user in users">
                <p>{{ user.name }}</p>
                <Link :href="`/users/${user.id}`">Lihat user</Link>
            </li>
        </ul>
    </Layout>
</template>

<script>
import Search from "../Shared/Search.vue";
import BackButton from "../Shared/BackButton.vue";
import Layout from "../Shared/Layout.vue";

export default {
    components: {
        Search,
        BackButton,
        Layout,
    },
    props: {
        spbus: Array,
    },
};
</script>

<template>
    <Layout title="Analysis">
        <div class="search-wrapper">
            <Search />
        </div>
        <div class="list">
            <div class="container-cards">
                <Link v-for="spbu in spbus" :href="`/spbu/${spbu.spbu_id}`">
                    <div class="card">
                        <h3>{{ spbu.name }}</h3>
                        <p>{{ spbu.road }}</p>
                    </div>
                </Link>
            </div>
            <div class="navigation">
                <BackButton href="/" />
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.search-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
}
.navigation {
    position: absolute;
    padding: 10px;
    border-radius: 5px;
    z-index: 10;
    color: white;
    text-decoration: none;
}
.container-cards {
    display: flex;
    gap: 15px;
    margin: 30px;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
    border: solid 1px red;
    border-radius: 5px;
    text-align: center;
    background-color: #121212;
    color: white;
    font-family: "Lexend Deca", "sans-serif";
}
.card h3,
.card p {
    text-decoration: none;
}
</style>

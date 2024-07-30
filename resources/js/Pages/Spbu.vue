<!-- spbuview.vue -->
<script setup>
import BackButton from "../Shared/BackButton.vue";
import SpbuData from "../Shared/spbudata1.vue";
import SidebarRight from "../Shared/spbudata2.vue";
import Layout from "../Shared/Layout.vue";
</script>

<template>
    <Layout title="SPBU">
        <main>
            <div class="sidebar sidebar-left">
                <SpbuData />
            </div>
            <div class="main-content">
                <h1>Nama SPBU</h1>
                <img
                    src="../../../public/images/spbu.png"
                    alt="SPBU Image"
                    class="station-image"
                />
                <div class="button">
                    <BackButton href="/analysis" />
                </div>
            </div>
            <div class="sidebar sidebar-right">
                <SidebarRight />
            </div>
        </main>
    </Layout>
</template>

<style scoped>
main {
    display: flex;
    width: 100%;
    height: 100vh; /* Ensure it takes the full height of the viewport */
    justify-content: space-between;
}
.sidebar {
    width: 25%;
    height: auto;
    background-color: #000000aa;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.main-content {
    flex: 1;
    display: flex;
    color: white;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.main-content h1 {
    margin-bottom: 80px;
}
.station-image {
    width: 80%;
    max-width: 500px;
}
.button {
    margin-top: 150px;
}
</style>

<script setup>
import Layout from "../Shared/Layout.vue";
import dashboardData from "../Shared/DashboardData.vue";
import BackButton from "../Shared/BackButton.vue";
</script>

<template>
    <Layout title="Dashboard">
        <div class="map-container">
            <img
                src="../../../public/images/map.jpg"
                alt="Map of Indonesia"
                class="map"
            />
        </div>
        <div class="navigation">
            <BackButton href="/" />
        </div>
        <dashboardData />
    </Layout>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");
body {
    font-family: "Lexend Deca", "sans-serif";
    background-color: #212121;
    color: #fff;
    margin: 0;
}
.navigation {
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-40%, -50%);
    padding: 10px;
    border-radius: 5px;
    z-index: 10;
    color: white;
    text-decoration: none;
}

.container {
    text-align: center;
}

.map-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    margin-top: 40px;
}

.map {
    width: 100%;
    height: auto;
}
</style>

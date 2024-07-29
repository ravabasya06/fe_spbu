<script setup>
import { RouterLink, RouterView } from "vue-router";
import navView from "../Shared/nav.vue";
</script>

<template>
    <nav>
        <navView />
    </nav>
    <div class="contents">
        <div class="card-container">
            <RouterLink to="/Dashboard">
                <div class="card">
                    <img
                        src="../../../public/images/earth.png"
                        alt="Earth image"
                        id="earth"
                    />
                    <p>DASHBOARD</p>
                </div>
            </RouterLink>
            <RouterLink to="/analysis">
                <div class="card">
                    <img
                        src="../../../public/images/cctv.png"
                        alt="CCTV image"
                        id="cctv"
                    />
                    <p>VIDEO CONTENT ANALYSIS</p>
                </div>
            </RouterLink>
        </div>
        <RouterView />
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap");
body {
    margin: 0;
    font-family: "Lexend Deca", "sans-serif";
    background-color: #000000;
    background-image: linear-gradient(to right, #ed1b3042, black, #006bb84b);
}

nav {
    text-align: center;
}
a {
    color: white;
    text-decoration: none;
}
#cctv {
    width: 135px;
    height: 105px;
}
#earth {
    width: 180px;
}
#nav {
    width: 100%;
}
.contents {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.card-container {
    display: flex;
    gap: 100px;
    align-items: center;
    justify-content: center;
}

.card {
    color: rgb(89, 88, 88);
    align-items: center;
    justify-content: center;
    text-decoration: none;
    text-align: center;
    margin: 0;
    padding: 10px;
    background: transparent;
}
.card img {
    width: 200px;
}
</style>

<script setup>
import Layout from "../Components/Main/Layout.vue";
</script>

<template>
    <Layout title="Home">
        <div class="contents">
            <div class="card-container">
                <Link href="/dashboard">
                    <div class="card">
                        <img
                            src="../../../public/images/earth.png"
                            alt="Earth image"
                            id="earth"
                        />
                        <p>DASHBOARD</p>
                    </div>
                </Link>
                <Link href="/analysis">
                    <div class="card">
                        <img
                            src="../../../public/images/cctv.png"
                            alt="CCTV image"
                            id="cctv"
                        />
                        <p>VIDEO CONTENT ANALYSIS</p>
                    </div>
                </Link>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
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
.contents {
    height: 95vh;
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

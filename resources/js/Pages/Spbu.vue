<script setup>
import BackButton from "../Components/Main/BackButton.vue";
import Layout from "../Components/Main/Layout.vue";
import { onMounted } from "vue";
import Alert from "../Components/alert.vue";
import CCTVModal from "../Components/Spbu/CCTVModal.vue";
import SpbuSidebar1 from "../Components/Spbu/SpbuSidebar1.vue";
import SpbuSidebar2 from "../Components/Spbu/SpbuSidebar2.vue";

let myModal;
let ModalCCTV;

onMounted(() => {
    myModal = new bootstrap.Modal(document.getElementById("alertpopup"));
    ModalCCTV = new bootstrap.Modal(document.getElementById("cctvpopup"));
});

const showPopup = () => {
    myModal.show();
};
const showcctv = () => {
    ModalCCTV.show();
};
</script>
<script>
export default {
    components: {
        Layout,
    },
    props: {
        spbu: Object,
        cctvs: Object,
        dispensers: Object,

        totalWoman: Number,
        totalMan: Number,
        grandTotal: Number,

        totalFire: Number,
        totalFraud: Number,
        totalObject: Number,

        totalVehicle: Number,
    },
};
</script>

<template>
    <Layout title="Profile SPBU">
        <main class="spbu">
            <SpbuSidebar1 :spbus="spbus" />
            <div class="main-content">
                <h1>{{ spbu.name }}</h1>
                <img
                    src="../../../public/images/spbu.png"
                    alt="SPBU Image"
                    class="station-image"
                />
                <div class="button">
                    <BackButton href="/analysis" />
                </div>
            </div>
            <SpbuSidebar2 />
        </main>
    </Layout>
</template>

<style scoped>
.spbu {
    display: flex;
    flex: 1;
}
.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 100px;
}
.station-image {
    width: 80%;
    max-width: 500px;
}
</style>

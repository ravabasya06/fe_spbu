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
.sidebar-left,
table {
    border-collapse: collapse;
    font-size: 15px;
}
tr {
    text-align: left;
}
th,
td {
    padding: 10px;
    border: 1px solid #ffffff;
    border: none;
}

td.show {
    cursor: pointer;
}
td.show:hover {
    text-decoration: underline;
}
.table-container {
    display: flex;
    flex-direction: column;
    max-height: 100%;
}
.table-container table {
    width: 100%;
    border-collapse: collapse;
}
.cctv-item thead {
    background-color: #2b2b2b;
    color: white;
}
.table-container th,
.table-container td {
    padding: 10px;
}
.table-container th.pria-col,
.table-container th.wanita-col {
    text-align: center;
}
.table-container td.pria-col,
.table-container td.wanita-col,
.table-container td.jumlah-antrian {
    text-align: center;
}
.table-container td:first-child {
    width: 30%;
}
.table-container td:not(:first-child) {
    width: 35%;
}
.table-body-wrapper {
    max-height: 200px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
}
.table-body-wrapper table {
    width: 100%;
}
.gender img {
    width: 30px;
}
.gender {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 20px;
    gap: 10px;
}
.gender-text p {
    margin: 0px;
}
</style>

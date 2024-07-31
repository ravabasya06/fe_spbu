<script setup>
import BackButton from "../Shared/BackButton.vue";
import Layout from "../Shared/Layout.vue";
import { onMounted } from "vue";
import Alert from "../Shared/alert.vue";
let myModal;

onMounted(() => {
    myModal = new bootstrap.Modal(document.getElementById("alertpopup"));
});

const showPopup = () => {
    myModal.show();
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
            <div class="sidebar-queue">
                <div class="queue">
                    <h2>ANTRIAN SPBU</h2>
                    <table class="dispenser-table">
                        <thead>
                            <tr>
                                <th>Jenis Dispenser</th>
                                <th>Jumlah Antrian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(dispenser, index) in dispensers">
                                <td>DISPENSER {{ index + 1 }}</td>
                                <td class="jumlah-antrian">
                                    {{ dispenser.queue }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="detection">
                    <div class="detection-item" @click="showPopup">
                        <img
                            src="../../../public/images/fire.png"
                            alt="Fire Detection"
                        />
                        <div class="detection-text">
                            <p>FIRE DETECTION</p>
                            <p>{{ totalFire }}</p>
                        </div>
                    </div>
                    <div class="detection-item" @click="showPopup">
                        <img
                            src="../../../public/images/fraud.png"
                            alt="Fraud Detection"
                        />
                        <div class="detection-text">
                            <p>FRAUD DETECTION</p>
                            <p>{{ totalFraud }}</p>
                        </div>
                    </div>
                    <div class="detection-item" @click="showPopup">
                        <img
                            src="../../../public/images/object.png"
                            alt="Object Detection"
                        />
                        <div class="detection-text">
                            <p>OBJECT DETECTION</p>
                            <p>{{ totalObject }}</p>
                        </div>
                    </div>
                    <div class="detection-item" @click="showPopup">
                        <img src="../../../public/images/car.png" alt="Mobil" />
                        <div class="detection-text">
                            <p>TOTAL KENDARAAN</p>
                            <p>{{ totalVehicle }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <Alert />
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
            <div class="sidebar-right">
                <div class="face-recognition">
                    <h2>Face Recognition</h2>
                    <h2>{{ grandTotal }}</h2>
                    <div class="gender">
                        <img src="../../../public/images/pria.png" alt="pria" />
                        <div class="gender-text">
                            <h1>Pria</h1>
                            <h1>{{ totalMan }}</h1>
                        </div>
                    </div>
                    <div class="gender">
                        <img
                            src="../../../public/images/wanita.png"
                            alt="wanita"
                        />
                        <div class="gender-text">
                            <h1>Wanita</h1>
                            <h1>{{ totalWoman }}</h1>
                        </div>
                    </div>
                </div>
                <div class="cctv">
                    <h2>CCTV CROWD CONTROL</h2>
                    <div class="cctv-item">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th>CCTV</th>
                                        <th class="pria-col">Pria</th>
                                        <th class="wanita-col">Wanita</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="table-body-wrapper">
                                <table>
                                    <tbody>
                                        <tr v-for="(cctv, index) in cctvs">
                                            <td @click="showPopup" class="show">
                                                CCTV {{ index + 1 }}
                                            </td>
                                            <td class="pria-col">
                                                {{ cctv.man }}
                                            </td>
                                            <td class="wanita-col">
                                                {{ cctv.woman }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </Layout>
</template>

<style scoped>
a {
    text-decoration: none;
    color: white;
}

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
.spbu-data {
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
}
.sidebar-queue,
.sidebar-right {
    width: 25%;
    height: auto;
    background-color: #000000aa;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.queue,
.detection {
    margin-bottom: 20px;
    margin-top: 20px;
}
.detection-item {
    display: flex;
    align-items: center;
    margin: 10px 0;
    gap: 10px;
    cursor: pointer; /* Add cursor pointer for clickable items */
}
.detection-item img {
    width: 40px;
    margin: 10px;
}
.detection-text {
    display: flex;
    flex-direction: column;
    margin: 5px;
}
.detection-item p {
    margin: 0;
    font-weight: bold;
}
.detection-item span {
    font-weight: bold;
    font-size: 18px;
}
.dispenser-table {
    width: 100%;
}
.dispenser-table th,
.dispenser-table td {
    text-align: left; /* Default text alignment for header and data cells */
}
.dispenser-table td.jumlah-antrian {
    text-align: center; /* Center align the text in jumlah-antrian column */
}
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
.face-recognition,
.cctv {
    margin-bottom: 20px;
    margin-top: 20px;
    font-size: 15px;
}
.face-recognition h1,
h2 {
    font-size: 20px;
}
.cctv {
    flex: 1;
}
.cctv h2 {
    font-size: 20px;
}
.cctv-item {
    display: flex;
    flex-direction: column;
    margin: 10px 0;
    border-radius: 5px;
    overflow: hidden;
    flex: 1;
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
.table-container thead {
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
.table-container td.wanita-col {
    text-align: center;
}
.table-container td:first-child {
    width: 30%;
}
.table-container td:not(:first-child) {
    width: 35%;
}
.table-body-wrapper {
    max-height: 200px;
    overflow-y: auto;
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

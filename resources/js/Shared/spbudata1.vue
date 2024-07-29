<script setup>
import { onMounted } from "vue";
import Alert from "./alert.vue";
let myModal;

onMounted(() => {
    myModal = new bootstrap.Modal(document.getElementById("alertpopup"));
});

const showPopup = () => {
    myModal.show();
};
</script>

<template>
    <div class="spbu-data">
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
                        <tr>
                            <td>DISPENSER 1</td>
                            <td class="jumlah-antrian">10</td>
                        </tr>
                        <tr>
                            <td>DISPENSER 2</td>
                            <td class="jumlah-antrian">10</td>
                        </tr>
                        <tr>
                            <td>DISPENSER 3</td>
                            <td class="jumlah-antrian">1</td>
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
                        <p>1</p>
                    </div>
                </div>
                <div class="detection-item" @click="showPopup">
                    <img
                        src="../../../public/images/object.png"
                        alt="Object Detection"
                    />
                    <div class="detection-text">
                        <p>OBJECT DETECTION</p>
                        <p>0</p>
                    </div>
                </div>
                <div class="detection-item" @click="showPopup">
                    <img
                        src="../../../public/images/fraud.png"
                        alt="Fraud Detection"
                    />
                    <div class="detection-text">
                        <p>FRAUD DETECTION</p>
                        <p>0</p>
                    </div>
                </div>
                <div class="detection-item" @click="showPopup">
                    <img src="../../../public/images/car.png" alt="Mobil" />
                    <div class="detection-text">
                        <p>TOTAL KENDARAAN</p>
                        <p>40</p>
                    </div>
                </div>
            </div>
        </div>
        <Alert />
    </div>
</template>

<style scoped>
a {
    text-decoration: none;
}
.spbu-data {
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: 100%;
}
.sidebar-queue {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.queue,
.detection {
    margin-bottom: 20px;
}
h2 {
    font-size: 18px;
    margin: 10px 0;
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
</style>

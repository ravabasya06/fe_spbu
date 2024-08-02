<script setup>
import { onMounted } from "vue";
import Alert from "../alert.vue";
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
    props: {
        dispensers: Object,
        fireDetections: Object,
        fraudDetections: Object,
        objectDetections: Object,

        totalFire: Number,
        totalFraud: Number,
        totalObject: Number,

        totalVehicle: Number,
    },
};
</script>

<template>
    <div class="sidebar-left">
        <div class="queue">
            <h2>ANTRIAN SPBU</h2>
            <div class="dispenser-item">
                <div class="table-container">
                    <table class="dispenser-table">
                        <thead>
                            <tr>
                                <th>Jenis Dispenser</th>
                                <th>Jumlah Antrian</th>
                            </tr>
                        </thead>
                    </table>
                    <div class="table-body-wrapper">
                        <table>
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
                </div>
            </div>
        </div>
        <div class="detection">
            <div class="detection-item" @click="showPopup">
                <img
                    src="../../../../public/images/fire.png"
                    alt="Fire Detection"
                />
                <div class="detection-text">
                    <p>FIRE DETECTION</p>
                    <p>{{ totalFire }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showPopup">
                <img
                    src="../../../../public/images/fraud.png"
                    alt="Fraud Detection"
                />
                <div class="detection-text">
                    <p>FRAUD DETECTION</p>
                    <p>{{ totalFraud }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showPopup">
                <img
                    src="../../../../public/images/object.png"
                    alt="Object Detection"
                />
                <div class="detection-text">
                    <p>OBJECT DETECTION</p>
                    <p>{{ totalObject }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showPopup">
                <img src="../../../../public/images/car.png" alt="Mobil" />
                <div class="detection-text">
                    <p>TOTAL KENDARAAN</p>
                    <p>{{ totalVehicle }}</p>
                </div>
            </div>
        </div>
    </div>
    <Alert />
</template>

<style scoped>
.sidebar-left {
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
.dispenser-table th {
    background-color: transparent;
    text-align: left; /* Default text alignment for header and data cells */
}
.table-container td.jumlah-antrian {
    text-align: center; /* Center align the text in jumlah-antrian column */
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
.table-container {
    display: flex;
    flex-direction: column;
    max-height: 100%;
}
.table-container table {
    width: 100%;
    border-collapse: collapse;
}
.table-container th,
.table-container td {
    padding: 10px;
}
.table-container {
    display: flex;
    flex-direction: column;
    max-height: 100%;
}
.table-body-wrapper {
    max-height: 200px; /* Adjust the height as needed */
    overflow-y: auto; /* Enable vertical scrolling */
}
.table-body-wrapper table {
    width: 100%;
}
</style>

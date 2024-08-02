<script setup>
import { ref } from "vue";

const showModal = ref(false);
const modalType = ref(""); // To track which modal to show

const showPopup = (type) => {
    modalType.value = type;
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
    modalType.value = "";
};
</script>

<script>
export default {
    props: {
        spbu: Object,
        dispensers: Array,
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
                        <tbody>
                            <tr
                                v-for="(dispenser, index) in dispensers"
                                :key="index"
                            >
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
        <div class="detection">
            <div class="detection-item" @click="showPopup('fire')">
                <img
                    src="../../../../public/images/fire.png"
                    alt="Fire Detection"
                />
                <div class="detection-text">
                    <p>FIRE DETECTION</p>
                    <p>{{ totalFire }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showPopup('fraud')">
                <img
                    src="../../../../public/images/fraud.png"
                    alt="Fraud Detection"
                />
                <div class="detection-text">
                    <p>FRAUD DETECTION</p>
                    <p>{{ totalFraud }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showPopup('object')">
                <img
                    src="../../../../public/images/object.png"
                    alt="Object Detection"
                />
                <div class="detection-text">
                    <p>OBJECT DETECTION</p>
                    <p>{{ totalObject }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showPopup('vehicle')">
                <img src="../../../../public/images/car.png" alt="Vehicle" />
                <div class="detection-text">
                    <p>TOTAL KENDARAAN</p>
                    <p>{{ totalVehicle }}</p>
                </div>
            </div>
        </div>
    </div>

    <div v-if="showModal" class="custom-modal" @click="closeModal">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h5>DETECTION DETAILS</h5>
                <button @click="closeModal" class="close-button">
                    &times;
                </button>
            </div>
            <div class="custom-modal-body">
                <div v-if="modalType === 'fire'">
                    <h2>Fire Detection Details</h2>
                    <p>Total Fire Detections: {{ totalFire }}</p>
                    <div class="detection">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="no">NO</th>
                                        <th class="date-time">DATE TIME</th>
                                        <th class="cctv">CCTV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your fire detection rows here -->
                                    <tr>
                                        <td class="no">1</td>
                                        <td class="date-time">01:20</td>
                                        <td class="cctv">CCTV 1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div v-if="modalType === 'fraud'">
                    <h2>Fraud Detection Details</h2>
                    <p>Total Fraud Detections: {{ totalFraud }}</p>
                    <div class="detection">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="no">NO</th>
                                        <th class="date-time">DATE TIME</th>
                                        <th class="cctv">CCTV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your fraud detection rows here -->
                                    <tr>
                                        <td class="no">1</td>
                                        <td class="date-time">01:30</td>
                                        <td class="cctv">CCTV 2</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div v-if="modalType === 'object'">
                    <h2>Object Detection Details</h2>
                    <p>Total Object Detections: {{ totalObject }}</p>
                    <div class="detection">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="no">NO</th>
                                        <th class="date-time">DATE TIME</th>
                                        <th class="cctv">CCTV</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add your object detection rows here -->
                                    <tr>
                                        <td class="no">1</td>
                                        <td class="date-time">01:40</td>
                                        <td class="cctv">CCTV 3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div v-if="modalType === 'vehicle'">
                    <h2>Vehicle Detection Details</h2>
                    <p>Total Vehicle Detections: {{ totalVehicle }}</p>
                    <div class="detection-modal">
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="car"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="motorcycle"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="bus"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="truck"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
}
tr {
    text-align: left;
}
th,
td {
    padding: 10px;
    font-size: 13px;
    border: none;
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

/* Custom Modal Styles */
.custom-modal {
    position: fixed;
    color: black;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
    animation: fadeIn 0.5s ease-in-out;
}

.custom-modal-content {
    background: white;
    border-radius: 5px;
    width: 100%;
    max-width: 500px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transform: translateY(-100%);
    animation: slideIn 0.5s ease-in-out forwards;
    transition: opacity 0.3s ease-in-out;
}

@keyframes slideIn {
    from {
        transform: translateY(-100%);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 5px 5px 0 0;
    background-color: #c32130;
    padding-bottom: 10px;
}

.custom-modal-body {
    margin-top: 20px;
}

.close-button {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
}

.detection-modal {
    display: flex;
    justify-content: center;
    gap: 50px;
}

.vehicle-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.vehicle-item p {
    margin-top: 10px;
}
</style>

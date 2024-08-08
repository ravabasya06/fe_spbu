<script setup>
import DetectionModal from "./DetectionModal.vue";
import VehicleModal from "./VehicleModal.vue";
import { onMounted, ref } from "vue";
let detectionModal;
let vehicleModal;
const selectedType = ref("");
const titleType = ref("");

onMounted(() => {
    detectionModal = new bootstrap.Modal(
        document.getElementById("detectionpopup")
    );
    vehicleModal = new bootstrap.Modal(document.getElementById("vehiclepopup"));
});

const showdetection = (type, title) => {
    selectedType.value = type;
    titleType.value = title;
    myModal.show();
};
const showvehicle = () => {
    vemodal.show();
};

defineProps([
    "spbu",
    "dispensers",
    "fireDetections",
    "fraudDetections",
    "objectDetections",
    "totalFire",
    "totalFraud",
    "totalObject",
    "totalMotor",
    "totalCar",
    "totalBus",
    "totalTruck",
    "totalVehicle",
]);
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
        </div>
        <div class="detection">
            <div
                class="detection-item"
                @click="showdetection(fireDetections, 'Fire')"
            >
                <img
                    src="../../../../public/images/fire.png"
                    alt="Fire Detection"
                />
                <div class="detection-text">
                    <p>FIRE DETECTION</p>
                    <p>{{ totalFire }}</p>
                </div>
            </div>
            <div
                class="detection-item"
                @click="showdetection(fraudDetections, 'Fraud')"
            >
                <img
                    src="../../../../public/images/fraud.png"
                    alt="Fraud Detection"
                />
                <div class="detection-text">
                    <p>FRAUD DETECTION</p>
                    <p>{{ totalFraud }}</p>
                </div>
            </div>
            <div
                class="detection-item"
                @click="showdetection(objectDetections, 'Object')"
            >
                <img
                    src="../../../../public/images/object.png"
                    alt="Object Detection"
                />
                <div class="detection-text">
                    <p>OBJECT DETECTION</p>
                    <p>{{ totalObject }}</p>
                </div>
            </div>
            <div class="detection-item" @click="showvehicle">
                <img src="../../../../public/images/car.png" alt="Vehicle" />
                <div class="detection-text">
                    <p>TOTAL KENDARAAN</p>
                    <p>{{ totalVehicle }}</p>
                </div>
            </div>
        </div>
        <DetectionModal
            :titleType="`${titleType}`"
            :detections="selectedType"
            :spbu="spbu"
        />
        <VehicleModal />
    </div>
    <!-- <div v-if="modalType === 'vehicle'">
        <div class="body-title">
            <h2>Vehicle Detection Details</h2>
            <p>Total Vehicle Detections: {{ totalVehicle }}</p>
        </div>
        <div class="detection-modal">
            <div class="vehicle-item">
                <font-awesome-icon
                    icon="motorcycle"
                    class="fa-2xl"
                    style="color: #000"
                />
                <p>{{ totalMotor }}</p>
            </div>
            <div class="vehicle-item">
                <font-awesome-icon
                    icon="car"
                    class="fa-2xl"
                    style="color: #000"
                />
                <p>{{ totalCar }}</p>
            </div>
            <div class="vehicle-item">
                <font-awesome-icon
                    icon="bus"
                    class="fa-2xl"
                    style="color: #000"
                />
                <p>{{ totalBus }}</p>
            </div>
            <div class="vehicle-item">
                <font-awesome-icon
                    icon="truck"
                    class="fa-2xl"
                    style="color: #000"
                />
                <p>{{ totalTruck }}</p>
            </div>
        </div>
    </div> -->
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
    padding-left: 10px;
}

.custom-modal-body {
    margin-top: 20px;
}
.body-title p,
.body-title h2 {
    padding-left: 10px;
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

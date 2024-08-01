<script setup>
import CCTVModal from "./CCTVModal.vue";
import { onMounted } from "vue";
let myModal;

onMounted(() => {
    myModal = new bootstrap.Modal(document.getElementById("cctvpopup"));
});

const showcctv = () => {
    myModal.show();
};
</script>
<template>
    <div class="sidebar-right">
        <div class="face-recognition">
            <h2>Face Recognition</h2>
            <h2>{{ grandTotal }}</h2>
            <div class="gender">
                <img src="../../../../public/images/pria.png" alt="pria" />
                <div class="gender-text">
                    <h1>Pria</h1>
                    <h1>{{ totalMan }}</h1>
                </div>
            </div>
            <div class="gender">
                <img src="../../../../public/images/wanita.png" alt="wanita" />
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
                                <tr v-for="(cctv, index) in cctvs" :key="index">
                                    <td @click="showcctv" class="show">
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
    <CCTVModal />
</template>

<style scoped>
a {
    text-decoration: none;
    color: white;
}
.sidebar-right {
    width: 25%;
    height: auto;
    background-color: #000000aa;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
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
.table-container th,
.table-container td {
    padding: 10px;
}
.cctv-item thead {
    background-color: #2b2b2b;
    color: white;
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

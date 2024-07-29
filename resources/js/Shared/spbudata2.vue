<script setup>
import CCTVModal from "../Shared/CCTVModal.vue";
import { onMounted } from "vue";
let myModal;

onMounted(() => {
    myModal = new bootstrap.Modal(document.getElementById("cctvpopup"));
});

const showPopup = () => {
    myModal.show();
};
</script>
<template>
    <div class="sidebar-right">
        <div class="face-recognition">
            <h2>Face recognition</h2>
            <h2>1.500</h2>
            <div class="gender">
                <img src="../../../public/images/pria.png" alt="pria" />
                <div class="gender-text">
                    <h1>pria</h1>
                    <h1>750</h1>
                </div>
            </div>
            <div class="gender">
                <img src="../../../public/images/wanita.png" alt="wanita" />
                <div class="gender-text">
                    <h1>wanita</h1>
                    <h1>650</h1>
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
                                <tr>
                                    <td @click="showPopup" class="show">
                                        CCTV A
                                    </td>
                                    <td class="pria-col">1</td>
                                    <td class="wanita-col">1</td>
                                </tr>
                                <!-- tambahin row -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal CCTV -->
        <CCTVModal />
    </div>
</template>

<style scoped>
.sidebar-right {
    color: white;
    height: 100vh;
    display: flex;
    flex-direction: column;
    font-size: 20px;
    padding-right: 0;
    overflow: hidden;
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

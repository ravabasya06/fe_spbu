<script setup>
import { ref } from "vue";
const CCTVRows = ref([{ name: "CCTV 1", count: 0 }]);
const maxCCTVRows = 10;
const addCCTVRow = () => {
    if (CCTVRows.value.length < maxCCTVRows) {
        const newRow = {
            name: `CCTV ${CCTVRows.value.length + 1}`,
            count: 0,
        };
        CCTVRows.value.push(newRow);
    }
};
const deleteLastCCTVRow = () => {
    if (CCTVRows.value.length > 1) {
        CCTVRows.value.pop();
    }
};

defineProps(["spbu"]);
</script>
<template>
    <div class="CCTV-Edit">
        <div class="container">
            <form>
                <h2>CCTV Crowd Control</h2>
                <table id="CCTVTable">
                    <thead>
                        <tr>
                            <th>CCTV</th>
                            <th>Pria</th>
                            <th>Wanita</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in CCTVRows" :key="index">
                            <td>{{ row.name }}</td>
                            <td>
                                <input
                                    class="CCTV-Number"
                                    type="number"
                                    v-model="row.count"
                                    min="0"
                                />
                            </td>
                            <td>
                                <input
                                    class="CCTV-Number"
                                    type="number"
                                    v-model="row.count"
                                    min="0"
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="button-group">
                    <button class="Add-CCTV" type="button" @click="addCCTVRow">
                        Tambah CCTV
                    </button>
                    <button
                        class="Delete-CCTV"
                        type="button"
                        @click="deleteLastCCTVRow"
                        :disabled="CCTVRows.length <= 1"
                    >
                        Hapus Dispenser
                    </button>
                </div>
                <button class="submit-button" type="submit">Update</button>
            </form>
        </div>
    </div>
</template>
<style scoped>
.CCTV-Edit {
    display: flex;
    justify-content: center;
}

.container {
    border: 1px solid #ffffff;
    max-width: 750px;
    width: 100%;
    margin: 20px;
    background: #000000;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    color: #fff;
}
h2 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 20px;
}
form {
    display: flex;
    flex-direction: column;
}
label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.2em;
}
input[type="number"] {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1.1em;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    font-size: 1.1em;
}

table th,
table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

table th {
    background-color: #f8f8f8;
    color: #000000;
}
.submit-button {
    background-color: #4caf50;
    color: white;
    padding: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    font-size: 1.2em;
}

.submit-button:hover {
    background-color: #45a049;
}
.button-group {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
}
.Add-CCTV {
    width: 20%;
    padding: 0;
    background-color: #3e4fb8;
    border: none;
}
.Add-CCTV:hover {
    background-color: #0220e2;
}
.Delete-CCTV {
    width: 20%;
    padding: 0;
    background-color: #f44336;
    border: none;
    color: white;
}
.Delete-CCTV:disabled {
    cursor: not-allowed;
}
.Delete-CCTV:hover {
    background-color: #94140b;
}
</style>

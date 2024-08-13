<script setup>
import Layout from "../../Components/Main/Layout.vue";
import { ref } from "vue";

const pulauOptions = ref([
    "Jawa",
    "Papua",
    "Kalimantan",
    "Sulawesi",
    "Sumatera",
]);
const provinsiOptions = ref([
    "Jawa Barat",
    "Jawa Timur",
    "Jawa Tengah",
    "DKI Jakarta",
    "Banten",
    "Papua Barat",
    "Papua Selatan",
    "Papua Tengah",
    "Papua Pegunungan",
    "Papua Barat Daya",
    "Kalimantan Tengah",
    "Kalimantan Timur",
    "Kalimantan Utara",
    "Kalimantan Selatan",
    "Kalimantan Barat",
    "Sulawesi Barat",
    "Sulawesi Utara",
    "Sulawesi Tengah",
    "Sulawesi Selatan",
    "Gorontalo",
    "Lampung",
    "Sumatera Selatan",
    "Sumatera Barat",
    "Sumatera Utara",
    "Riau",
]);
// Initialize the dispenser rows with one default row
const dispenserRows = ref([{ name: "Dispenser 1", count: 0 }]);

const maxDispenserRows = 10;

// Function to add a new dispenser row
const addDispenserRow = () => {
    if (dispenserRows.value.length < maxDispenserRows) {
        const newRow = {
            name: `Dispenser ${dispenserRows.value.length + 1}`,
            count: 0,
        };
        dispenserRows.value.push(newRow);
    }
};
const deleteLastDispenserRow = () => {
    if (dispenserRows.value.length > 1) {
        dispenserRows.value.pop();
    }
};
</script>

<template>
    <Layout title="Admin Panel">
        <div class="Admin-Panel">
            <div class="container">
                <h1>Admin Panel</h1>
                <form id="adminForm">
                    <div class="form-group">
                        <label for="branchName">ID SPBU:</label>
                        <input
                            type="text"
                            id="branchName"
                            name="branchName"
                            placeholder="Masukkan ID"
                        />
                        <label for="branchName">Nama Cabang:</label>
                        <input
                            type="text"
                            id="branchName"
                            name="branchName"
                            placeholder="Masukkan Nama Cabang"
                        />
                        <label for="streetName">Nama Jalan:</label>
                        <input
                            type="text"
                            id="streetName"
                            name="streetName"
                            placeholder="Masukkan Nama Jalan"
                        />
                        <label for="city">Kota:</label>
                        <input
                            type="text"
                            id="city"
                            name="city"
                            placeholder="Masukkan Nama Kota"
                        />
                        <label for="island">Pulau:</label>
                        <select
                            name="pulau"
                            id="pulau"
                            width="100"
                            style="width: 100px"
                        >
                            <option>Pulau</option>
                            <option
                                v-for="pulau in pulauOptions"
                                :key="pulau"
                                :value="pulau"
                            >
                                {{ pulau }}
                            </option>
                        </select>

                        <label for="provinceSelect">Provinsi:</label>
                        <select
                            name="provinsi"
                            id="provinsi"
                            width="100"
                            style="width: 150px"
                        >
                            <option>Nama Provinsi</option>
                            <option
                                v-for="provinsi in provinsiOptions"
                                :key="provinsi"
                                :value="provinsi"
                            >
                                {{ provinsi }}
                            </option>
                        </select>
                    </div>
                    <h2>Antrian Dispenser SPBU</h2>
                    <table id="dispenserTable">
                        <thead>
                            <tr>
                                <th>Jenis Dispenser</th>
                                <th>Jumlah Antrian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(row, index) in dispenserRows"
                                :key="index"
                            >
                                <td>{{ row.name }}</td>
                                <td>
                                    <input type="number" v-model="row.count" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="button-group">
                        <button
                            class="Add-Dispenser"
                            type="button"
                            @click="addDispenserRow"
                        >
                            Tambah Dispenser
                        </button>
                        <button
                            class="Delete-Dispenser"
                            type="button"
                            @click="deleteLastDispenserRow"
                            :disabled="dispenserRows.length <= 1"
                        >
                            Hapus Dispenser
                        </button>
                    </div>
                    <h2>Total Jenis Kendaraan</h2>
                    <table id="dispenserTable">
                        <thead>
                            <tr>
                                <th>Jenis Kendaraan</th>
                                <th>Jumlah Kendaraan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mobil</td>
                                <td>
                                    <input type="number" value="0" min="0" />
                                </td>
                            </tr>
                            <tr>
                                <td>Motor</td>
                                <td>
                                    <input type="number" value="0" min="0" />
                                </td>
                            </tr>
                            <tr>
                                <td>Truck</td>
                                <td>
                                    <input type="number" value="0" min="0" />
                                </td>
                            </tr>
                            <tr>
                                <td>Bis</td>
                                <td>
                                    <input type="number" value="0" min="0" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit">Save</button>
                </form>
            </div>
        </div>
    </Layout>
</template>

<style scoped>
.Admin-Panel {
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

h1,
h2 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 30px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.2em;
}

input[type="text"],
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

button {
    background-color: #4caf50;
    color: white;
    padding: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    font-size: 1.2em;
}

button:hover {
    background-color: #45a049;
}
.Add-Dispenser {
    width: 20%;
    padding: 0;
}
.Add-Dispenser {
    width: 20%;
    padding: 0;
}

.Delete-Dispenser {
    width: 20%;
    padding: 0;
    margin-left: 10px;
    background-color: #f44336;
}

.Delete-Dispenser:disabled {
    cursor: not-allowed;
}
.Delete-Dispenser:hover {
    background-color: #94140b;
}
.button-group {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 20px;
}
</style>

<script setup>
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
import { ref } from "vue";
const currentLayout = ref("spbu");
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
const dispenserRows = ref([{ name: "Dispenser 1", count: 0 }]);
const CCTVRows = ref([{ name: "CCTV 1", count: 0 }]);
const maxDispenserRows = 10;
const maxCCTVRows = 10;
const showLayout = (layout) => {
    currentLayout.value = layout;
};

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

<script>
export default {
    data() {
        return {
            form: {
                spbu_id: this.spbu.spbu_id,
                name: this.spbu.name,
                road: this.spbu.road,
                city: this.spbu.city,
                province: this.spbu.province,
                island: this.spbu.island,
            },
        };
    },
    methods: {
        update() {
            this.$inertia.put("/spbu/" + this.spbu.spbu_id, this.form);
        },
    },
};
</script>

<template>
    <Layout v-if="currentLayout == 'spbu'" title="Spbu-Edit">
        <div class="buttons">
            <Button @click="showLayout('spbu')" value="Spbu" color="green" />
            <button @click="showLayout('dispenser')" color="blue">
                Dispenser
            </button>
            <button @click="showLayout('CCTV')" color="red">CCTV</button>
        </div>
        <div class="Admin-Panel">
            <div class="container">
                <h1>Edit</h1>

                <form id="adminForm" @submit.prevent="update">
                    <div class="form-group">
                        <fieldset disabled="disabled">
                            <label for="idSpbu">ID SPBU:</label>
                            <input
                                type="text"
                                id="idSpbu"
                                name="idSpbu"
                                placeholder="Masukkan ID"
                                v-model="form.spbu_id"
                            />
                        </fieldset>
                        <label for="branchName">Nama Cabang:</label>
                        <input
                            type="text"
                            id="branchName"
                            name="branchName"
                            placeholder="Masukkan Nama Cabang"
                            v-model="form.name"
                            required
                        />
                        <label for="streetName">Nama Jalan:</label>
                        <input
                            type="text"
                            id="streetName"
                            name="streetName"
                            placeholder="Masukkan Nama Jalan"
                            v-model="form.road"
                            required
                        />
                        <label for="city">Kota:</label>
                        <input
                            type="text"
                            id="city"
                            name="city"
                            placeholder="Masukkan Nama Kota"
                            v-model="form.city"
                            required
                        />

                        <label for="provinceSelect">Provinsi:</label>
                        <select
                            name="provinsi"
                            id="provinsi"
                            width="100"
                            style="width: 150px"
                            v-model="form.province"
                        >
                            <option disabled>Nama Provinsi</option>
                            <option
                                v-for="provinsi in provinsiOptions"
                                :key="provinsi"
                                :value="provinsi"
                            >
                                {{ provinsi }}
                            </option>
                        </select>
                        <label for="island">Pulau:</label>
                        <select
                            name="pulau"
                            id="pulau"
                            width="100"
                            style="width: 100px"
                            v-model="form.island"
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
                    </div>
                    <button class="submit-button" type="submit">Update</button>
                </form>
            </div>
        </div>
        <div class="back-button">
            <Button :href="`/spbu/${spbu.spbu_id}`" value="Back" color="blue" />
        </div>
    </Layout>
    <Layout title="Dispenser Edit" v-if="currentLayout == 'dispenser'">
        <div class="buttons">
            <Button @click="showLayout('spbu')" value="Spbu" color="green" />
            <button @click="showLayout('dispenser')" color="blue">
                Dispenser
            </button>
            <button @click="showLayout('CCTV')" color="red">CCTV</button>
        </div>
        <div class="Dispenser-Edit">
            <div class="container">
                <form>
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
                                    <input
                                        type="number"
                                        v-model="row.count"
                                        min="0"
                                    />
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
                    <button class="submit-button" type="submit">Update</button>
                </form>
            </div>
        </div>
        <div class="back-button">
            <Button :href="`/spbu/${spbu.spbu_id}`" value="Back" color="blue" />
        </div>
    </Layout>
    <Layout title="CCTV Edit" v-if="currentLayout == 'CCTV'">
        <div class="buttons">
            <Button @click="showLayout('spbu')" value="Spbu" color="green" />
            <button @click="showLayout('dispenser')" color="blue">
                Dispenser
            </button>
            <button @click="showLayout('CCTV')" color="red">CCTV</button>
        </div>
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
                        <button
                            class="Add-CCTV"
                            type="button"
                            @click="addCCTVRow"
                        >
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
        <div class="back-button">
            <Button :href="`/spbu/${spbu.spbu_id}`" value="Back" color="blue" />
        </div>
    </Layout>
</template>
<style scoped>
.Admin-Panel,
.Dispenser-Edit,
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
.buttons {
    display: flex;
    text-align: center;
    gap: 25px;
    justify-content: center;
    margin-top: 10px;
}

/* ini buat button yang ada di dispenser */
.button-group {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
}
.Add-Dispenser,
.Add-CCTV {
    width: 20%;
    padding: 0;
    background-color: #3e4fb8;
    border: none;
}
.Add-Dispenser:hover,
.Add-CCTV:hover {
    background-color: #0220e2;
}
.Delete-Dispenser,
.Delete-CCTV {
    width: 20%;
    padding: 0;
    background-color: #f44336;
    border: none;
    color: white;
}

.Delete-Dispenser:disabled,
.Delete-CCTV:disabled {
    cursor: not-allowed;
}
.Delete-Dispenser:hover,
.Delete-CCTV:hover {
    background-color: #94140b;
}
</style>

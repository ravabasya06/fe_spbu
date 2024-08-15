<script setup>
import Layout from "../../Components/Main/Layout.vue";
import Button from "../../Components/Main/Button.vue";
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
    <Layout title="Admin Panel">
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
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
        <Button :href="`/spbu/${spbu.spbu_id}`" value="Back" color="blue" />
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
.button-group {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 20px;
}
</style>

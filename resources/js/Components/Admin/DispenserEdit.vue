<script setup>
import { ref } from "vue";
import Button from "../../Components/Main/Button.vue";
const dispenserRows = ref([{ name: "Dispenser 1", count: 0 }]);
const maxDispenserRows = 10;
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

defineProps(["spbu"]);
</script>
<template>
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
                        <tr v-for="(row, index) in dispenserRows" :key="index">
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
                    <Button
                        type="button"
                        @click="addDispenserRow"
                        value="Tambah Dispenser"
                        color="green"
                    />
                    <Button
                        type="button"
                        @click="deleteLastDispenserRow"
                        :disabled="dispenserRows.length <= 1"
                        value="Hapus Dispenser"
                        color="red"
                    />
                </div>
                <Button type="submit" color="blue" value="Update" />
            </form>
        </div>
    </div>
</template>
<style scoped>
.Dispenser-Edit {
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
.button-group {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
}
</style>

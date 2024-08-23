<script setup>
import Button from "../../../Components/Main/Button.vue";
defineProps(["spbu", "dispensers"]);
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(dispenser, index) in dispensers"
                            :key="index"
                        >
                            <td>Dispenser {{ index + 1 }}</td>
                            <td>{{ dispenser.queue }}</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>
                                <Link href="" style="color: red">Delete</Link>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
.action-container {
    display: flex;
    gap: 25px;
    justify-content: center;
}
.action-container a {
    text-decoration: none;
}
.action-container a:hover {
    text-decoration: underline;
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
    background-color: #2b2b2b;
}
.button-group {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
}
.delete-button:disabled {
    cursor: not-allowed;
}
</style>

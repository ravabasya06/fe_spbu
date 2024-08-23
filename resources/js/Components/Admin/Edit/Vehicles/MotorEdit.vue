<script setup>
import Button from "../../../../Components/Main/Button.vue";

defineProps(["motorVehicles"]);
</script>

<template>
    <form>
        <h2>Kendaraan Motor</h2>
        <div class="table-container">
            <div class="table-body-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th class="column-no">No</th>
                            <th class="column-updated">Waktu</th>
                            <th class="column-action">Aksi</th>
                        </tr>
                    </thead>
                </table>
                <table>
                    <tbody>
                        <tr v-for="(motor, index) in motorVehicles">
                            <td>{{ index + 1 }}</td>

                            <td>{{ motor.created_at }}</td>
                            <td>
                                <form
                                    @submit.prevent=""
                                    class="action-container"
                                >
                                    <Link href="">Edit</Link>
                                    <button type="submit" class="delete-button">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Button type="submit" value="Update" color="blue" />
    </form>
</template>

<style scoped>
h2 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 20px;
}
form {
    display: flex;
    flex-direction: column;
}

.table-container {
    display: flex;
    flex-direction: column;
    max-height: 100%;
    margin-bottom: 10px;
}
.table-container table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed; /* Add this to fix the column width */
}
.table-container th,
.table-container td {
    padding: 10px;
    text-align: center;
    border: 1px solid white;
    width: 33%; /* Ensure all columns are equal width */
}
.table-container thead {
    background-color: #2b2b2b;
    color: white;
}
.table-body-wrapper {
    max-height: 200px;
    overflow-y: auto;
}
.table-body-wrapper table {
    width: 100%;
}
.action-container a {
    text-decoration: none;
}
.action-container a:hover {
    text-decoration: underline;
}
.action-container {
    display: flex;
    gap: 25px;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    text-decoration: none;
}
.delete-button {
    padding: 0;
    border: none;
    background-color: black;
    color: red;
}
.delete-button:hover {
    text-decoration: underline;
}
</style>

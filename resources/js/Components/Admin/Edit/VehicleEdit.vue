<script setup>
import { router } from "@inertiajs/vue3";
import Button from "../../../Components/Main/Button.vue";
defineProps(["spbu", "vehicles", "title"]);

const deleteVehicle = (vehicle) => {
    router.delete(`/vehicle/${vehicle.vehicle_id}`, {
        onBefore: () =>
            confirm("Are you sure you want to delete this Vehicle?"),
    });
};
</script>

<template>
    <form>
        <h2>Kendaraan {{ title }}</h2>
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
                        <tr
                            v-for="(vehicle, index) in vehicles"
                            :key="vehicles.vehicle_id"
                        >
                            <td>{{ index + 1 }}</td>

                            <td>{{ vehicle.created_at }}</td>
                            <td>
                                <form
                                    @submit.prevent="deleteVehicle(vehicle)"
                                    class="action-container"
                                >
                                    <Link
                                        :href="`/vehicle/${vehicle.vehicle_id}/edit`"
                                        >Edit</Link
                                    >
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
        <Button
            type="link"
            :href="`/spbu/${spbu.spbu_id}/vehicle`"
            value="Tambah"
            color="blue"
        />
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
@media only screen and (max-width: 600px) {
    .action-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
}
</style>

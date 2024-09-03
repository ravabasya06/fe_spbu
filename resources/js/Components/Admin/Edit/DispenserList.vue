<script setup>
import { router } from "@inertiajs/vue3";
import Button from "../../../Components/Main/Button.vue";
defineProps(["spbu", "dispensers"]);

const deleteDispenser = (dispenser) => {
    router.delete(`/dispenser/${dispenser.dispenser_id}`, {
        onBefore: () =>
            confirm("Are you sure you want to delete this dispenser?"),
    });
};
</script>
<template>
    <div class="Dispenser-Edit">
        <div class="container">
            <form>
                <h2>Antrian Dispenser SPBU</h2>
                <div class="table-body-wrapper">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Jenis Dispenser</th>
                                    <th>Jumlah Antrian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                        <table>
                            <tbody>
                                <tr
                                    v-for="dispenser in dispensers"
                                    :key="dispenser.dispenser_number"
                                >
                                    <td>
                                        Dispenser
                                        {{ dispenser.dispenser_number }}
                                    </td>
                                    <td>{{ dispenser.queue }}</td>
                                    <td>
                                        <form
                                            @submit.prevent="
                                                deleteDispenser(dispenser)
                                            "
                                            class="action-container"
                                        >
                                            <Link
                                                :href="`/dispenser/${dispenser.dispenser_id}/edit`"
                                                >Edit</Link
                                            >
                                            <button
                                                type="submit"
                                                class="delete-button"
                                            >
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
                    :href="`/spbu/${spbu.spbu_id}/dispenser`"
                    value="Tambah"
                    color="blue"
                />
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
.button-group {
    display: flex;
    gap: 25px;
    margin-bottom: 20px;
}
.delete-button:disabled {
    cursor: not-allowed;
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
    .table-container th,
    .table-container td {
        padding: 7px;
        border: 1px solid white;
    }
}
</style>

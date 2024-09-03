<script setup>
import { router } from "@inertiajs/vue3";
import Button from "../../../Components/Main/Button.vue";
defineProps(["spbu", "cctvs"]);

const deleteCctv = (cctv) => {
    router.delete(`/cctv/${cctv.cctv_id}`, {
        onBefore: () => confirm("Are you sure you want to delete this CCTV?"),
    });
};
</script>
<template>
    <div class="CCTV-Edit">
        <div class="container">
            <form>
                <h2>CCTV Crowd Control</h2>
                <div class="table-container">
                    <div class="table-body-wrapper">
                        <table>
                            <thead>
                                <tr>
                                    <th>CCTV</th>
                                    <th>Status</th>
                                    <th>Pria</th>
                                    <th>Wanita</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                        <table>
                            <tbody>
                                <tr
                                    v-for="cctv in cctvs"
                                    :key="cctv.cctv_number"
                                >
                                    <td>CCTV {{ cctv.cctv_number }}</td>
                                    <td>
                                        {{
                                            cctv.status ? "Active" : "Inactive"
                                        }}
                                    </td>
                                    <td>{{ cctv.man }}</td>
                                    <td>{{ cctv.woman }}</td>
                                    <td>
                                        <form
                                            @submit.prevent="deleteCctv(cctv)"
                                            class="action-container"
                                        >
                                            <Link
                                                :href="`/cctv/${cctv.cctv_id}/edit`"
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
                    :href="`/spbu/${spbu.spbu_id}/cctv`"
                    value="Tambah"
                    color="blue"
                />
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
    }
}
</style>

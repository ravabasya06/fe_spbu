<script setup>
import { router } from "@inertiajs/vue3";
import Button from "../../../Components/Main/Button.vue";
defineProps(["spbu", "detections", "title"]);

const deleteDetection = (detection) => {
    router.delete(`/detection/${detection.detection_id}`, {
        onBefore: () =>
            confirm("Are you sure you want to delete this Detection?"),
    });
};
</script>

<template>
    <form>
        <h2>{{ title }} Detection</h2>
        <div class="table-container">
            <div class="table-body-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>CCTV</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
                <table>
                    <tbody>
                        <tr
                            v-for="(detection, index) in detections"
                            :key="detection.detection_id"
                        >
                            <td>{{ index + 1 }}</td>
                            <td>CCTV {{ detection.cctv_number }}</td>
                            <td>{{ detection.created_at }}</td>
                            <td>
                                <form
                                    @submit.prevent="deleteDetection(detection)"
                                    class="action-container"
                                >
                                    <Link
                                        :href="`/detection/${detection.detection_id}/edit`"
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
            :href="`/spbu/${spbu.spbu_id}/detection`"
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
.action-container {
    display: flex;
    gap: 25px;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    text-decoration: none;
}
.action-container a {
    text-decoration: none;
}
.action-container a:hover {
    text-decoration: underline;
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

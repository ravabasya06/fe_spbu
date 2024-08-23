<script setup>
import { Link } from "@inertiajs/vue3";
import Button from "../../../Components/Main/Button.vue";
defineProps(["spbu", "cctvs"]);
</script>
<template>
    <div class="CCTV-Edit">
        <div class="container">
            <form>
                <h2>CCTV Crowd Control</h2>
                <div class="table-container">
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
                    <div class="table-body-wrapper">
                        <table>
                            <tbody>
                                <tr v-for="(cctv, index) in cctvs">
                                    <td>CCTV {{ index + 1 }}</td>
                                    <td>
                                        {{
                                            cctv.status ? "Active" : "Inactive"
                                        }}
                                    </td>
                                    <td>{{ cctv.man }}</td>
                                    <td>{{ cctv.woman }}</td>
                                    <td>
                                        <form
                                            @submit.prevent=""
                                            class="action-container"
                                        >
                                            <Link href="">Edit</Link>
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
                <Button type="submit" value="Update" color="blue" />
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
</style>

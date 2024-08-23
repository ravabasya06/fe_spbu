<script setup>
import Button from "../../../Components/Main/Button.vue";
</script>

<template>
    <form>
        <h2>Object Detection</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th class="column-no">No</th>
                        <th class="column-cctv">CCTV</th>
                        <th class="column-updated">Updated At</th>
                        <th class="column-action">Aksi</th>
                    </tr>
                </thead>
            </table>
            <div class="table-body-wrapper">
                <table>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CCTV 1</td>
                            <td>2024-10-20</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>&nbsp;
                                <Link href="" style="color: red">Delete</Link>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CCTV 1</td>
                            <td>2024-10-20</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>&nbsp;
                                <Link href="" style="color: red">Delete</Link>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CCTV 1</td>
                            <td>2024-10-20</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>&nbsp;
                                <Link href="" style="color: red">Delete</Link>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>CCTV 1</td>
                            <td>2024-10-20</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>&nbsp;
                                <Link href="" style="color: red">Delete</Link>
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
    table-layout: fixed;
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

.action-container a {
    text-decoration: none;
}
.action-container a:hover {
    text-decoration: underline;
}
</style>

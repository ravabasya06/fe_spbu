<script setup>
import Button from "../../Components/Main/Button.vue";
defineProps(["spbu"]);
</script>
<template>
    <div class="CCTV-Edit">
        <div class="container">
            <form>
                <h2>CCTV Crowd Control</h2>
                <table id="CCTVTable">
                    <thead>
                        <tr>
                            <th>CCTV</th>
                            <th>Status</th>
                            <th>Pria</th>
                            <th>Wanita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CCTV 1</td>
                            <td>On</td>
                            <td>0</td>
                            <td>0</td>
                            <td>
                                <a href="">Edit </a>
                                <br />
                                <a href="" style="color: red">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
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

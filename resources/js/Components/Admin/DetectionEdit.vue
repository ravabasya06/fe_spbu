<script setup>
import Button from "../../Components/Main/Button.vue";
</script>

<template>
    <div class="Dispenser-Edit">
        <div class="container">
            <form>
                <h2>Total Detection</h2>
                <table id="CCTVTable">
                    <thead>
                        <tr>
                            <th>Jenis Deteksi</th>
                            <th>Total</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fire Detection</td>
                            <td>0</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>
                            </td>
                        </tr>
                        <tr>
                            <td>Fraud Detection</td>
                            <td>0</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>
                            </td>
                        </tr>
                        <tr>
                            <td>Object Detection</td>
                            <td>0</td>
                            <td class="action-container">
                                <Link href="">Edit</Link>
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
    background-color: #2b2b2b;
}
.action-container a {
    text-decoration: none;
}
.action-container a:hover {
    text-decoration: underline;
}
</style>

<script setup>
import Button from "../../Components/Main/Button.vue";
import Layout from "../../Components/Main/Layout.vue";
</script>

<template>
    <Layout class="User-Manage-Layout">
        <div class="User-Manage">
            <div class="container">
                <form>
                    <h2>User Manage</h2>
                    <table id="UserTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Admin Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Contoh nama</td>
                                <td>NO</td>
                                <td class="aksi">
                                    <a href="">Edit </a>
                                    <a href="" style="color: red">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <Button
                        type="link"
                        href="/register"
                        value="Tambah"
                        color="blue"
                    />
                </form>
            </div>
        </div>
        <div class="back-button">
            <Button type="link" :href="`/`" value="Back" color="blue" />
        </div>
    </Layout>
</template>
<style scoped>
.User-Manage {
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
.aksi {
    display: flex;
    gap: 10px;
    justify-content: center;
}
.back-button {
    display: flex;
    justify-content: center;
}
</style>

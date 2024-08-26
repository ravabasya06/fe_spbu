<script setup>
import { ref } from "vue";
import Button from "../../../Components/Main/Button.vue";
const statusOptions = ref(["On", "Off"]);
</script>

<template>
    <div class="CCTV-Form">
        <div class="container">
            <h2>Edit CCTV</h2>

            <form id="adminForm">
                <div class="form-group">
                    <fieldset disabled="disabled">
                        <label for="idCCTV">ID CCTV:</label>
                        <input
                            type="text"
                            id="idCCTV"
                            name="idCCTV"
                            placeholder="Masukkan ID"
                        />
                    </fieldset>
                    <label for="provinceSelect">Status:</label>
                    <select name="status" id="status" required>
                        <option disabled>Status</option>
                        <option
                            v-for="status in statusOptions"
                            :key="status"
                            :value="status"
                        >
                            {{ status }}
                        </option>
                    </select>
                    <label for="queue">Pria</label>
                    <input
                        type="number"
                        id="queue"
                        name="queue"
                        min="0"
                        value="0"
                        required
                    />
                    <label for="queue">Wanita</label>
                    <input
                        type="number"
                        id="queue"
                        name="queue"
                        min="0"
                        value="0"
                        required
                    />
                </div>
                <Button type="submit" value="Update" color="blue" />
            </form>
        </div>
    </div>
</template>
<style scoped>
.CCTV-Form {
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
.form-group {
    margin-bottom: 30px;
}
label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.2em;
}
input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1.1em;
}
</style>

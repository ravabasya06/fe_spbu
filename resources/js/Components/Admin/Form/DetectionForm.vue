<script setup>
import { ref } from "vue";
import Button from "../../../Components/Main/Button.vue";
const detectionOptions = ref(["fire", "fraud", "object"]);
const CCTVOptions = ref("CCTV 1", "CCTV 2", "CCTV 3");
// pass data cctv options nya ya
</script>

<template>
    <div class="Detection-Form">
        <div class="container">
            <h2>Detection Form</h2>
            <form id="adminForm">
                <div class="form-group">
                    <label for="CCTV">Pilih CCTV:</label>
                    <select name="CCTV" id="CCTV" required>
                        <option disabled>CCTV</option>
                        <option
                            v-for="cctv in CCTVOptions"
                            :key="cctv"
                            :value="cctv"
                        >
                            {{ cctv }}
                        </option>
                    </select>
                    <label for="provinceSelect">Detection Type:</label>
                    <select name="detection" id="detection" required>
                        <option disabled>Type</option>
                        <option
                            v-for="detection in detectionOptions"
                            :key="detection"
                            :value="detection"
                        >
                            {{ detection }}
                        </option>
                    </select>
                </div>
                <Button type="submit" value="Update" color="blue" />
            </form>
        </div>
    </div>
</template>
<style scoped>
.Detection-Form {
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
/* input[type="text"] {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1.1em;
} */
</style>

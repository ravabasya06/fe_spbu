<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";
const detectionOptions = ref(["Fire", "Fraud", "Object"]);
const CCTVOptions = ref(["CCTV 1", "CCTV 2", "CCTV 3"]);

const props = defineProps({
    detection: {
        type: Object,
        default: null,
    },
    spbu_id: {
        type: Number,
    },
});

const form = useForm({
    detection_id: props.detection?.detection_id ?? "",
    spbu_id: props.detection?.spbu_id ?? props.spbu_id,
});

const isEditMode = computed(() => !!props.detection);

const handleSubmit = () => {
    if (isEditMode.value) {
        form.put(`/spbu/${form.spbu_id}`);
    } else {
        // ini ubah sesuai storenya tapi kelihatannya udah bener?
        form.post(route("detection.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        });
    }
};
</script>

<template>
    <div class="Detection-Form">
        <div class="container">
            <h2>Detection Form</h2>
            <form id="adminForm" @submit.prevent="handleSubmit">
                <div class="form-group">
                    <label for="idSpbu">ID SPBU:</label>
                    <input
                        type="text"
                        id="idSpbu"
                        name="idSpbu"
                        placeholder="Masukkan ID"
                        v-model="form.spbu_id"
                        disabled
                    />
                    <fieldset v-if="isEditMode">
                        <label for="idDetection">ID Detection:</label>
                        <input
                            type="text"
                            id="idDetection"
                            name="idDetection"
                            placeholder="Detection ID"
                            v-model="form.detection_id"
                            disabled
                        />
                    </fieldset>

                    <label for="CCTV">Pilih CCTV:</label>
                    <select name="CCTV" id="CCTV" required style="width: 100px">
                        <option disabled selected>CCTV</option>
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
                        <option disabled selected>Type</option>
                        <option
                            v-for="detection in detectionOptions"
                            :key="detection"
                            :value="detection"
                        >
                            {{ detection }}
                        </option>
                    </select>
                </div>
                <Button
                    type="submit"
                    :value="isEditMode ? 'Update' : 'Save'"
                    color="blue"
                />
            </form>
        </div>
    </div>
    <div class="back-button">
        <!-- routingnya  -->
        <Button
            type="link"
            :href="`/spbu/${dispenser?.spbu_id ?? props.spbu_id}/edit`"
            value="Back"
            color="blue"
        />
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
input[type="text"] {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1.1em;
}
.back-button {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}
</style>

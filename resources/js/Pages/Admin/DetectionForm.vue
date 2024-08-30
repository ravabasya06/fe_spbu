<script setup>
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";
import Layout from "../../Components/Main/Layout.vue";

const props = defineProps({
    detection: {
        type: Object,
        default: null,
    },
    spbu_id: {
        type: String,
    },
    cctvs: {
        type: Object,
    },
    type_detections: {
        type: Object,
    },
});

const form = useForm({
    detection_id: props.detection?.detection_id ?? "",
    spbu_id: props.detection?.spbu_id ?? props.spbu_id,
    cctv_id: props.detection?.cctv_id ?? "",
    type_detection_id: props.detection?.type_detection_id ?? "",
});

const isEditMode = computed(() => !!props.detection);

const handleSubmit = () => {
    if (isEditMode.value) {
        form.put(`/detection/${form.detection_id}`);
    } else {
        form.post(route("detection.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        });
    }
};
</script>

<template>
    <Layout title="Detection Form">
        <div class="Detection-Form">
            <div class="container">
                <h2>Detection Form</h2>
                <form id="adminForm" @submit.prevent="handleSubmit">
                    <div class="form-group">
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
                        <label for="idSpbu">ID SPBU:</label>
                        <input
                            type="text"
                            id="idSpbu"
                            name="idSpbu"
                            placeholder="Masukkan ID"
                            v-model="form.spbu_id"
                            disabled
                        />
                        <label for="CCTV">Pilih CCTV:</label>
                        <select
                            name="CCTV"
                            id="CCTV"
                            required
                            style="width: 100px"
                            v-model="form.cctv_id"
                        >
                            <option disabled selected>CCTV</option>
                            <option
                                v-for="cctv in cctvs"
                                :key="cctv.cctv_number"
                                :value="cctv.cctv_id"
                            >
                                CCTV {{ cctv.cctv_number }}
                            </option>
                        </select>

                        <label for="provinceSelect">Detection Type:</label>
                        <select
                            name="detection"
                            id="detection"
                            required
                            v-model="form.type_detection_id"
                        >
                            <option disabled selected>Type</option>
                            <option
                                v-for="type in type_detections"
                                :key="type.type_detection_id"
                                :value="type.type_detection_id"
                            >
                                {{ type.type }}
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
                :href="`/spbu/${detection?.spbu_id ?? props.spbu_id}/edit`"
                value="Back"
                color="blue"
            />
        </div>
    </Layout>
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

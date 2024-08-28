<script setup>
import { ref } from "vue";
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";
import Layout from "../../Components/Main/Layout.vue";
const statusOptions = ref([0, 1]);

const props = defineProps({
    cctv: {
        type: Object,
        default: null,
    },
    spbu_id: {
        type: Number,
    },
});

const form = useForm({
    cctv_id: props.cctv?.cctv_id ?? "",
    spbu_id: props.cctv?.spbu_id ?? props.spbu_id,
    cctv_number: props.cctv?.cctv_number ?? "",
    status: props.cctv?.status ?? "",
    man: props.cctv?.man ?? "",
    woman: props.cctv?.woman ?? "",
    link: props.cctv?.link ?? "",
});

const isEditMode = computed(() => !!props.cctv);

const handleSubmit = () => {
    if (isEditMode.value) {
        form.put(`/cctv/${form.cctv_id}`);
    } else {
        form.post(route("cctv.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        });
    }
};
</script>

<template>
    <Layout title="CCTV Form">
        <div class="CCTV-Form">
            <div class="container">
                <h2>{{ isEditMode ? "Edit" : "Create New" }} CCTV</h2>

                <form id="adminForm" @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <fieldset v-if="isEditMode">
                            <label for="idCCTV">ID CCTV:</label>
                            <input
                                type="text"
                                id="idCCTV"
                                name="idCCTV"
                                placeholder="Masukkan ID"
                                v-model="form.cctv_id"
                                disabled
                            />
                        </fieldset>
                        <fieldset>
                            <label for="idSPBU">ID SPBU:</label>
                            <input
                                type="text"
                                id="idSPBU"
                                name="idSPBU"
                                placeholder="Masukkan ID"
                                v-model="form.spbu_id"
                                disabled
                            />
                        </fieldset>
                        <fieldset>
                            <label for="no">CCTV Number:</label>
                            <input
                                type="number"
                                id="no"
                                name="no"
                                min="0"
                                value="0"
                                v-model="form.cctv_number"
                                :disabled="isEditMode"
                            />
                        </fieldset>
                        <fieldset>
                            <label for="status">Status:</label>
                            <select
                                name="status"
                                id="status"
                                v-model="form.status"
                                required
                            >
                                <option disabled>Status</option>
                                <option
                                    v-for="status in statusOptions"
                                    :key="status"
                                    :value="status"
                                >
                                    {{ status }}
                                </option>
                            </select>
                        </fieldset>
                        <fieldset>
                            <label for="man">Pria</label>
                            <input
                                type="number"
                                id="man"
                                name="man"
                                min="0"
                                value="0"
                                v-model="form.man"
                                required
                            />
                        </fieldset>
                        <fieldset>
                            <label for="woman">Wanita</label>
                            <input
                                type="number"
                                id="woman"
                                name="woman"
                                min="0"
                                value="0"
                                v-model="form.woman"
                                required
                            />
                        </fieldset>
                        <fieldset>
                            <label for="link">CCTV Link</label>
                            <input
                                type="text"
                                id="link"
                                name="link"
                                v-model="form.link"
                                required
                            />
                        </fieldset>
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
            <Button
                type="link"
                :href="`/spbu/${cctv?.spbu_id ?? props.spbu_id}/edit`"
                value="Back"
                color="blue"
            />
        </div>
    </Layout>
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
.back-button {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}
</style>

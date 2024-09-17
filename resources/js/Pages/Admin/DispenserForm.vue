<script setup>
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";
import Layout from "../../Components/Main/Layout.vue";

const props = defineProps({
    dispenser: {
        type: Object,
        default: null,
    },
    spbu_id: {
        type: String,
    },
    type_dispensers: {
        type: Object,
    },
});

const form = useForm({
    dispenser_id: props.dispenser?.dispenser_id ?? "",
    spbu_id: props.dispenser?.spbu_id ?? props.spbu_id,
    type_dispenser_id: props.dispenser?.type_dispenser_id ?? "",
    dispenser_number: props.dispenser?.dispenser_number ?? "",
    queue: props.dispenser?.queue ?? "",
});

const isEditMode = computed(() => !!props.dispenser);

const handleSubmit = () => {
    if (isEditMode.value) {
        form.put(`/dispenser/${form.dispenser_id}`);
    } else {
        form.post(route("dispenser.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        });
    }
};
</script>

<template>
    <Layout title="Dispenser Form">
        <div class="Dispenser-Form">
            <div class="container">
                <h2>{{ isEditMode ? "Edit" : "Create New" }} Dispenser</h2>

                <form id="adminForm" @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <fieldset v-if="isEditMode">
                            <label for="idDispenser">ID Dispenser:</label>
                            <input
                                type="text"
                                id="idDispenser"
                                name="idDispenser"
                                placeholder="Masukkan ID"
                                v-model="form.dispenser_id"
                                disabled
                            />
                        </fieldset>
                        <fieldset>
                            <label for="idSpbu">ID SPBU:</label>
                            <input
                                type="text"
                                id="idSpbu"
                                name="idSpbu"
                                placeholder="Masukkan ID"
                                v-model="form.spbu_id"
                                disabled
                            />
                        </fieldset>
                        <fieldset>
                            <label for="no">Dispenser Number:</label>
                            <input
                                type="number"
                                id="no"
                                name="no"
                                min="0"
                                value="0"
                                v-model="form.dispenser_number"
                                required
                                :disabled="isEditMode"
                            />
                        </fieldset>
                        <fieldset>
                            <label for="type">Tipe Dispenser:</label>
                            <select
                                name="type"
                                id="type"
                                v-model="form.type_dispenser_id"
                                required
                            >
                                <option
                                    v-for="type in type_dispensers"
                                    :key="type.type_dispenser_id"
                                    :value="type.type_dispenser_id"
                                >
                                    {{ type.type }}
                                </option>
                            </select>
                        </fieldset>
                        <fieldset>
                            <label for="queue">Queue:</label>
                            <input
                                type="number"
                                id="queue"
                                name="queue"
                                min="0"
                                value="0"
                                v-model="form.queue"
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
                :href="`/spbu/${dispenser?.spbu_id ?? props.spbu_id}/edit`"
                value="Back"
                color="blue"
            />
        </div>
    </Layout>
</template>
<style scoped>
.Dispenser-Form {
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

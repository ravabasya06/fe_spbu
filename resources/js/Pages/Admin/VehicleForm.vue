<script setup>
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";
import Layout from "../../Components/Main/Layout.vue";

const props = defineProps({
    vehicle: {
        type: Object,
        default: null,
    },
    spbu_id: {
        type: String,
    },
    type_vehicles: {
        type: Object,
    },
});

const form = useForm({
    vehicle_id: props.vehicle?.vehicle_id ?? "",
    spbu_id: props.vehicle?.spbu_id ?? props.spbu_id,
    type_vehicle_id: props.vehicle?.type_vehicle_id ?? "",
});

const isEditMode = computed(() => !!props.vehicle);

const handleSubmit = () => {
    if (isEditMode.value) {
        form.put(`/vehicle/${form.vehicle_id}`);
    } else {
        form.post(route("vehicle.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        });
    }
};
</script>

<template>
    <Layout title="Vehicle Form">
        <div class="Vehicle-Form">
            <div class="container">
                <h2>Vehicle Form</h2>
                <form id="adminForm" @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <fieldset v-if="isEditMode">
                            <label for="idVehicle">ID Vehicle:</label>
                            <input
                                type="text"
                                id="idVehicle"
                                name="idVehicle"
                                placeholder="Vehicle ID"
                                v-model="form.vehicle_id"
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

                        <label for="VehicleType">Vehicle Type:</label>
                        <select
                            name="VehicleType"
                            id="VehicleType"
                            required
                            v-model="form.type_vehicle_id"
                        >
                            <option disabled selected>Type</option>
                            <option
                                v-for="type in type_vehicles"
                                :key="type.type_vehicle_id"
                                :value="type.type_vehicle_id"
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
                :href="`/spbu/${vehicle?.spbu_id ?? props.spbu_id}/edit`"
                value="Back"
                color="blue"
            />
        </div>
    </Layout>
</template>
<style scoped>
.Vehicle-Form {
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

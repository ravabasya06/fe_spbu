<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../../Components/Main/Button.vue";

const props = defineProps({
    spbu: {
        type: Object,
        default: null,
    },
    islands: {
        type: Object,
    },
    provinces: {
        type: Object,
    },
});

const advance = ref(false);
const isEditMode = computed(() => !!props.spbu);

const form = useForm({
    spbu_id: props.spbu?.spbu_id ?? "",
    name: props.spbu?.name ?? "",
    road: props.spbu?.road ?? "",
    city: props.spbu?.city ?? "",
    province_id: props.spbu?.province_id ?? "",
    island_id: props.spbu?.island_id ?? "",
    latitude: props.spbu?.latitude ?? "",
    longitude: props.spbu?.longitude ?? "",
});

const handleSubmit = () => {
    if (isEditMode.value) {
        form.put(`/spbu/${form.spbu_id}`);
    } else {
        form.post(route("spbu.store"), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        });
    }
};

const toggle = () => {
    advance.value = !advance.value;
};

const filteredProvinces = (id) => {
    return props.provinces.filter((province) => province.island_id == id);
};
</script>

<template>
    <div class="Spbu-Form">
        <div class="container">
            <h2>{{ isEditMode ? "Edit" : "Create New" }} SPBU</h2>

            <form id="adminForm" @submit.prevent="handleSubmit">
                <div class="form-group">
                    <fieldset v-if="isEditMode">
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

                    <label for="branchName">Nama Cabang:</label>
                    <input
                        type="text"
                        id="branchName"
                        name="branchName"
                        placeholder="Masukkan Nama Cabang"
                        v-model="form.name"
                        required
                        autocomplete="off"
                    />

                    <label for="streetName">Nama Jalan:</label>
                    <input
                        type="text"
                        id="streetName"
                        name="streetName"
                        placeholder="Masukkan Nama Jalan"
                        v-model="form.road"
                        required
                        autocomplete="off"
                    />

                    <label for="city">Kota:</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        placeholder="Masukkan Nama Kota"
                        v-model="form.city"
                        required
                        autocomplete="off"
                    />
                    <label for="pulau">Pulau:</label>
                    <select
                        name="pulau"
                        id="pulau"
                        v-model="form.island_id"
                        required
                    >
                        <option disabled>Pulau</option>
                        <option
                            v-for="island in islands"
                            :key="island.island_id"
                            :value="island.island_id"
                        >
                            {{ island.name }}
                        </option>
                    </select>
                    <label for="provinsi">Provinsi:</label>
                    <select
                        name="provinsi"
                        id="provinsi"
                        v-model="form.province_id"
                        required
                    >
                        <option disabled>Nama Provinsi</option>
                        <option
                            v-for="province in filteredProvinces(
                                form.island_id,
                            )"
                            :key="province.province_id"
                            :value="province.province_id"
                        >
                            {{ province.name }}
                        </option>
                    </select>
                    <div class="dropdown" @click="toggle">
                        <span>Advanced Options</span>
                        <font-awesome-icon
                            :icon="advance ? 'caret-up' : 'caret-down'"
                        />
                    </div>

                    <transition name="slide-fade">
                        <fieldset v-show="advance">
                            <label for="latitude">Latitude:</label>
                            <input
                                type="number"
                                id="latitude"
                                name="latitude"
                                v-model="form.latitude"
                                autocomplete="off"
                                step="any"
                            />
                            <label for="longitude">Longitude:</label>
                            <input
                                type="number"
                                id="longitude"
                                name="longitude"
                                v-model="form.longitude"
                                autocomplete="off"
                                step="any"
                            />
                        </fieldset>
                    </transition>
                </div>
                <Button
                    type="submit"
                    :value="isEditMode ? 'Update' : 'Save'"
                    color="blue"
                />
            </form>
        </div>
    </div>
</template>

<style scoped>
.Spbu-Form {
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
.dropdown {
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 15px;
    margin-top: 20px;
    color: white;
    width: fit-content;
}
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition:
        opacity 0.5s,
        transform 0.5s;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}
</style>

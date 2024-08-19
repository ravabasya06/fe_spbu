<script setup>
import { ref, reactive } from "vue";
import { useForm } from "@inertiajs/vue3";
import Button from "../../Components/Main/Button.vue";

// Pulau (Island) and Provinsi (Province) options
const pulauOptions = ref([
    "Jawa",
    "Papua",
    "Kalimantan",
    "Sulawesi",
    "Sumatera",
]);
const provinsiOptions = ref([
    "Jawa Barat",
    "Jawa Timur",
    "Jawa Tengah",
    "DKI Jakarta",
    "Banten",
    "Papua Barat",
    "Papua Selatan",
    "Papua Tengah",
    "Papua Pegunungan",
    "Papua Barat Daya",
    "Kalimantan Tengah",
    "Kalimantan Timur",
    "Kalimantan Utara",
    "Kalimantan Selatan",
    "Kalimantan Barat",
    "Sulawesi Barat",
    "Sulawesi Utara",
    "Sulawesi Tengah",
    "Sulawesi Selatan",
    "Gorontalo",
    "Lampung",
    "Sumatera Selatan",
    "Sumatera Barat",
    "Sumatera Utara",
    "Riau",
]);

// Define props
const props = defineProps({
    spbu: {
        type: Object,
        required: true,
    },
});

// Create a reactive form object using the props data
const form = reactive({
    spbu_id: props.spbu.spbu_id,
    name: props.spbu.name,
    road: props.spbu.road,
    city: props.spbu.city,
    province: props.spbu.province,
    island: props.spbu.island,
});

// Function to handle the update
const update = () => {
    const formHandler = useForm(form);
    formHandler.put(`/spbu/${form.spbu_id}`);
};
</script>

<!-- <script>
export default {
    data() {
        return {
            form: {
                spbu_id: this.spbu.spbu_id,
                name: this.spbu.name,
                road: this.spbu.road,
                city: this.spbu.city,
                province: this.spbu.province,
                island: this.spbu.island,
            },
        };
    },
    methods: {
        update() {
            this.$inertia.put("/spbu/" + this.spbu.spbu_id, this.form);
        },
    },
};
</script> -->

<template>
    <div class="Spbu-Edit">
        <div class="container">
            <h2>Edit</h2>

            <form id="adminForm" @submit.prevent="update">
                <div class="form-group">
                    <fieldset disabled="disabled">
                        <label for="idSpbu">ID SPBU:</label>
                        <input
                            type="text"
                            id="idSpbu"
                            name="idSpbu"
                            placeholder="Masukkan ID"
                            v-model="form.spbu_id"
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
                    />
                    <label for="streetName">Nama Jalan:</label>
                    <input
                        type="text"
                        id="streetName"
                        name="streetName"
                        placeholder="Masukkan Nama Jalan"
                        v-model="form.road"
                        required
                    />
                    <label for="city">Kota:</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        placeholder="Masukkan Nama Kota"
                        v-model="form.city"
                        required
                    />

                    <label for="provinceSelect">Provinsi:</label>
                    <select
                        name="provinsi"
                        id="provinsi"
                        width="100"
                        style="width: 150px"
                        v-model="form.province"
                    >
                        <option disabled>Nama Provinsi</option>
                        <option
                            v-for="provinsi in provinsiOptions"
                            :key="provinsi"
                            :value="provinsi"
                        >
                            {{ provinsi }}
                        </option>
                    </select>
                    <label for="island">Pulau:</label>
                    <select
                        name="pulau"
                        id="pulau"
                        width="100"
                        style="width: 100px"
                        v-model="form.island"
                    >
                        <option disabled>Pulau</option>
                        <option
                            v-for="pulau in pulauOptions"
                            :key="pulau"
                            :value="pulau"
                        >
                            {{ pulau }}
                        </option>
                    </select>
                </div>
                <Button type="submit" value="Update" color="blue" />
            </form>
        </div>
    </div>
</template>
<style scoped>
.Spbu-Edit {
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
</style>

<script setup>
import Button from "../../../Components/Main/Button.vue";
import { ref } from "vue";

const emit = defineEmits(["update-layout"]);
const currentLayout = ref("spbu");
const showLayout = (layout) => {
    currentLayout.value = layout;
    emit("update-layout", layout);
};
</script>
<template>
    <div class="buttons">
        <Button
            type="button"
            @click="showLayout('spbu')"
            value="Spbu"
            color="blue"
        />
        <Button
            type="button"
            @click="showLayout('dispenser')"
            value="Dispenser"
            color="blue"
        />
        <Button
            type="button"
            @click="showLayout('cctv')"
            value="CCTV"
            color="blue"
        />
        <Button
            type="button"
            @click="showLayout('detection')"
            value="Detection"
            color="blue"
        />
        <Button
            type="button"
            @click="showLayout('vehicle')"
            value="Vehicle"
            color="blue"
        />
    </div>
</template>
<style scoped>
.buttons {
    display: flex;
    text-align: center;
    gap: 25px;
    justify-content: center;
    margin-top: 10px;
}
@media only screen and (max-width: 600px) {
    .buttons {
        display: grid;
        grid-template-columns: auto auto auto;
    }
}
</style>

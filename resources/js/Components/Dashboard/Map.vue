<script setup>
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import { ref } from "vue";
import "leaflet/dist/leaflet.css";
const zoom = ref(5);
const center = ref([-0.5143059767194057, 120.73280216006904]);
const markerLatLng = ref({
    marker1: [-0.5143059767194057, 111.73280216006904],
    marker2: [-0.5143059767192034, 100.73280216757332],
});
</script>

<template>
    <div class="map-container">
        <l-map
            ref="map"
            v-model:zoom="zoom"
            v-model:center="center"
            :useGlobalLeaflet="false"
        >
            <l-tile-layer
                url="https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png"
                layer-type="base"
                name="Stadia Maps Basemap"
            ></l-tile-layer>
            <l-marker v-for="lat in markerLatLng" :lat-lng="lat"></l-marker>
        </l-map>
    </div>
</template>

<style scoped>
.map-container {
    height: 90vh;
    width: 100vw;
    z-index: 1;
}
</style>

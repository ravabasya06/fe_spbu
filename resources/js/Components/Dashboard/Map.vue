<script setup>
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import { ref } from "vue";
import "leaflet/dist/leaflet.css";
const zoom = ref(5);
const center = ref([-0.5, 120.7]);
const markerLatLng = ref({
    Kalimantan1: [-1, 110],
    Kalimantan2: [4.3, 117],
    Sumatera1: [5.6, 95.4],
    Sumatera2: [-5.4, 105.3],
    Jawa1: [-8, 114.3],
    Jawa2: [-6.8, 105.3],
    Sulawesi1: [-1, 120],
    Sulawesi2: [-5.3, 119.4],
    Papua1: [-2, 137.5],
    Papua2: [-9, 140.9],
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

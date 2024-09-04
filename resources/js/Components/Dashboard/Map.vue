<script setup>
import Button from "../Main/Button.vue";
import {
    LMap,
    LTileLayer,
    LMarker,
    LPopup,
    LIcon,
} from "@vue-leaflet/vue-leaflet";
import { ref } from "vue";
import "leaflet/dist/leaflet.css";

defineProps(["spbus"]);

const zoom = ref(5);
const center = ref([-0.5, 120.7]);

const iconOptions = {
    iconUrl: "/images/dispenser.png",
    iconSize: [20, 25], // size of the icon
    iconAnchor: [19, 38], // point of the icon which will correspond to marker's location
    popupAnchor: [-10, -35], // point from which the popup should open relative to the iconAnchor
};
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
            <l-marker
                v-for="spbu in spbus"
                :key="spbu.spbu_id"
                :lat-lng="[spbu.latitude, spbu.longitude]"
            >
                <l-icon
                    :icon-url="iconOptions.iconUrl"
                    :icon-size="iconOptions.iconSize"
                    :icon-anchor="iconOptions.iconAnchor"
                    :popup-anchor="iconOptions.popupAnchor"
                ></l-icon>
                <l-popup :options="{ maxWidth: auto, minWidth: auto }">
                    <p>{{ spbu.name }}</p>
                    <p class="volume">VOLUME KENDARAAN</p>
                    <div class="detection-items">
                        <div class="full-day">
                            <p class="atas">00.00 - saat ini</p>
                            <p class="bawah">4000</p>
                            <div class="detection-vehicle-left">
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="motorcycle"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="car"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="bus"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="truck"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                            </div>
                        </div>
                        <div class="half-day">
                            <p class="atas">30 menit terakhir</p>
                            <p class="bawah">50</p>
                            <div class="detection-vehicle-right">
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="motorcycle"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="car"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="bus"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                                <div class="vehicle-item">
                                    <font-awesome-icon
                                        icon="truck"
                                        class="fa-xl"
                                        style="color: #000"
                                    />
                                    <p>2</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <Button
                        type="link"
                        :href="`/spbu/${spbu.spbu_id}`"
                        value="Lihat"
                        color="blue"
                        style="width: 100%; margin-top: 5px"
                    />
                </l-popup>
            </l-marker>
        </l-map>
    </div>
</template>

<style scoped>
.leaflet-container {
    font-family: "Lexend Deca", "sans-serif";
}
.map-container {
    height: 90vh;
    width: 100vw;
    z-index: 1;
}
.volume {
    background-color: red;
    padding: 10px;
    text-align: center;
    margin: 0;
    color: white;
    font-weight: bold;
}
.atas {
    margin: 0;
    padding: 10px;
    font-size: 12px;
    background-color: #0044cc;
    text-align: center;
    color: white;
}
.bawah {
    margin: 0;
    padding: 10px;
    font-size: 12px;
    background-color: #051621;
    text-align: center;
    color: white;
}

.detection-items {
    display: flex;
    flex-direction: row;
    background-color: #ededed;
}

.detection-vehicle-left,
.detection-vehicle-right {
    display: grid;
    grid-template-columns: auto auto;
    gap: 30px;
}
.detection-vehicle-right {
    border-left: 2px dashed lightgray;
}

.vehicle-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 10px;
}
.vehicle-item p {
    margin: 0;
}
</style>

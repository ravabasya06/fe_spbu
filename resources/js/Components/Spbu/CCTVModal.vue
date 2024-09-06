<script setup>
defineProps(["cctv"]);
</script>

<template>
    <!-- Modal -->
    <div
        class="modal fade"
        id="cctvpopup"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        CCTV {{ cctv.cctv_number }}
                    </h1>
                    <div class="modal-header-right">
                        <span
                            :style="{ color: cctv.status ? 'green' : 'black' }"
                            class="fs-5 fw-bold"
                        >
                            {{ cctv.status ? "ONLINE" : "OFFLINE" }}
                        </span>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                </div>
                <div class="modal-body">
                    <img
                        :src="cctv.status ? cctv.link : null"
                        alt=""
                        class="placeholder-img"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.placeholder-img {
    width: 100%;
}
.modal-header {
    display: flex;
    justify-content: space-between;
    background-color: #c32130;
}
.modal-header-right {
    display: flex;
    gap: 10px;
    justify-content: space-between;
    align-items: center;
}

.btn-close:focus {
    outline: none; /* Remove focus outline */
    box-shadow: none; /* Remove box-shadow on focus */
}

.modal-content {
    background-color: rgb(255, 255, 255);
    color: rgb(255, 255, 255);
}

.modal-body h2 {
    color: black;
    font-size: 25px;
}

.modal-body p {
    color: black;
    font-size: 15px;
}
</style>

<template>
    <div
        class="modal fade"
        id="vehiclepopup"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        <!-- {{ detectionTitle }} Detection -->
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="body-title">
                        <h2>Vehicle Detection Details</h2>
                        <p>Total Vehicle Detections: 0</p>
                    </div>
                    <div class="detection-modal">
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="motorcycle"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="car"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="bus"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                        <div class="vehicle-item">
                            <font-awesome-icon
                                icon="truck"
                                class="fa-2xl"
                                style="color: #000"
                            />
                            <p>0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal-header {
    background-color: #c32130;
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

.detection-modal {
    display: flex;
    justify-content: center;
    gap: 50px;
}

.vehicle-item {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.vehicle-item p {
    margin-top: 10px;
}
</style>

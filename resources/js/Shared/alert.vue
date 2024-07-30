<template>
    <div
        class="modal fade"
        id="alertpopup"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        ??? DETECTION
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <h2>Nama cabang pertamina</h2>
                    <p>Total Detection: 1</p>
                    <div class="detection">
                        <div class="table-container">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="no">NO</th>
                                        <th class="date-time">DATE TIME</th>
                                        <th class="cctv">CCTV</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="table-body-wrapper">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="no">1</td>
                                            <td class="date-time">01:20</td>
                                            <td class="cctv">CCTV 1</td>
                                        </tr>
                                        <tr>
                                            <td class="no">2</td>
                                            <td class="date-time">01:30</td>
                                            <td class="cctv">CCTV 2</td>
                                        </tr>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
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

.detection {
    display: flex;
    flex-direction: column; /* Ensure items are in a column */
    margin: 10px 0;
    overflow: hidden; /* Prevent the container from scrolling */
    flex: 1; /* Allow cctv-item to take available space */
}

.table-container {
    display: flex;
    flex-direction: column;
    max-height: 100%; /* Set the maximum height to the parent container's height */
}

.table-container table {
    width: 100%;
    border-collapse: collapse;
    color: black;
}

.table-container thead {
    background-color: #006cb8;
    color: white; /* Ensure header text is readable */
}

.table-container th,
.table-container td {
    padding: 8px; /* Add padding to all cells for consistent spacing */
}

.table-container th.no,
.table-container td.no {
    width: 60px; /* Fixed width for 'NO' column */
    text-align: center; /* Center-align text in this column */
    padding-left: 10px; /* Add padding to avoid sticking to the edge */
    padding-right: 10px; /* Add padding to avoid sticking to the edge */
}

.table-container th.date-time,
.table-container td.date-time,
.table-container th.cctv,
.table-container td.cctv {
    text-align: left; /* Left-align text in these columns */
}

.table-container th.date-time,
.table-container td.date-time {
    width: 120px; /* Fixed width for 'DATE TIME' column */
}

.table-container th.cctv,
.table-container td.cctv {
    width: 120px; /* Fixed width for 'CCTV' column */
}

.table-body-wrapper {
    max-height: 200px; /* Adjust the height as needed */
    overflow-y: auto; /* Add vertical scrolling for the table body */
}

.table-body-wrapper table {
    width: 100%;
}
</style>

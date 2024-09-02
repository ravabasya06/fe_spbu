<template>
    <section class="list-spbu">
        <div class="list-column">
            <table>
                <thead>
                    <tr>
                        <th>JAWA</th>
                        <th>10</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Banten</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>DKI Jakarta</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Jawa Barat</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Jawa Tengah</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Jawa Timur</td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="list-column">
            <table>
                <thead>
                    <tr>
                        <th>KALIMANTAN</th>
                        <th>1</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kalimantan Tengah</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Kalimantan Timur</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>Kalimantan Utara</td>
                        <td>7</td>
                    </tr>
                    <tr>
                        <td>Kalimantan Selatan</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Kalimantan Barat</td>
                        <td>9</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="list-column">
            <table>
                <thead>
                    <tr>
                        <th>SUMATERA</th>
                        <th>2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lampung</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>Sumatera Selatan</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Sumatera Barat</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td>Sumatera Utara</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <td>Riau</td>
                        <td>15</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="list-column">
            <table>
                <thead>
                    <tr>
                        <th>SULAWESI</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Sulawesi Barat</td>
                        <td>16</td>
                    </tr>
                    <tr>
                        <td>Sulawesi Utara</td>
                        <td>17</td>
                    </tr>
                    <tr>
                        <td>Sulawesi Tengah</td>
                        <td>18</td>
                    </tr>
                    <tr>
                        <td>Sulawesi Selatan</td>
                        <td>19</td>
                    </tr>
                    <tr>
                        <td>Gorontalo</td>
                        <td>20</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="list-column">
            <table>
                <thead>
                    <tr>
                        <th>PAPUA</th>
                        <th>9</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Papua Barat</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td>Papua Selatan</td>
                        <td>22</td>
                    </tr>
                    <tr>
                        <td>Papua Tengah</td>
                        <td>23</td>
                    </tr>
                    <tr>
                        <td>Papua Pegunungan</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>Papua Barat Daya</td>
                        <td>25</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<style scoped>
.list-spbu {
    font-family: "Lexend Deca", "sans-serif";
    display: flex;
    justify-content: space-around;
    background-color: #000000;
    padding: 10px;
    font-size: 0.75em;
    border-top: 1px solid #ff0000;
    z-index: 1;
    top: 90%;
    left: 0;
    right: 0;
    color: white;
}
.list-column {
    width: 14%;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    text-align: left;
    padding-bottom: 5px;
}

td {
    padding: 5px 0;
}

thead th {
    border-bottom: 1px solid #ffffff;
}
</style>

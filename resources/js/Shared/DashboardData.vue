<template>
  <section class="list-spbu">
    <div class="list-column">
      <div class="list-column-title">JAWA</div>
      <ul>
        <li>Banten</li>
        <li>DKI Jakarta</li>
        <li>Jawa Barat</li>
        <li>Jawa Tengah</li>
        <li>Jawa Timur</li>
      </ul>
    </div>
    <div class="list-column">
      <div class="list-column-title">KALIMANTAN</div>
      <ul>
        <li>Kalimantan Tengah</li>
        <li>Kalimantan Timur</li>
        <li>Kalimantan Utara</li>
        <li>Kalimantan Selatan</li>
        <li>Kalimantan Barat</li>
      </ul>
    </div>
    <div class="list-column">
      <div class="list-column-title">SUMATERA</div>
      <ul>
        <li>Lampung</li>
        <li>Sumatera Selatan</li>
        <li>Sumatera Barat</li>
        <li>Sumatera Utara</li>
        <li>Riau</li>
      </ul>
    </div>
    <div class="list-column">
      <div class="list-column-title">SULAWESI</div>
      <ul>
        <li>Sulawesi Barat</li>
        <li>Sulawesi Utara</li>
        <li>Sulawesi Tengah</li>
        <li>Sulawesi Selatan</li>
        <li>Gorontalo</li>
      </ul>
    </div>
    <div class="list-column">
      <div class="list-column-title">PAPUA</div>
      <ul>
        <li>Papua Barat</li>
        <li>Papua Selatan</li>
        <li>Papua Tengah</li>
        <li>Papua Pegunungan</li>
        <li>Papua Barat Daya</li>
      </ul>
    </div>
  </section>
</template>
<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap");
.list-spbu {
  font-family: "Lexend Deca", "sans-serif";
  display: flex;
  justify-content: space-around;
  background-color: #000000;
  padding: 10px;
  font-size: 0.75em;
  border-top: 1px solid #ff0000;
  z-index: 1;
  position: absolute;
  top: 90%;
  left: 0;
  right: 0;
  color: white;
}
.list-column {
  width: 14%;
}

.list-column ul {
  list-style-type: none;
  padding: 0;
}

.list-column ul li {
  padding: 5px 0;
}
.list-column-title {
  display: flex;
  justify-content: space-between;
}
.list-column-provinsi {
  display: flex;
  justify-content: space-between;
}
</style>

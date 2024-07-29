<script setup>
import { RouterLink } from "vue-router";
</script>
<template>
  <div class="container-cards" id="mylist">
    <RouterLink to="/spbu">
      <div class="card">
        <p>test huruf panjang</p>
        <h3>test</h3>
      </div>
    </RouterLink>
    <RouterLink to="/spbu">
      <div class="card">
        <p>test huruf panjang</p>
        <h3>test</h3>
      </div>
    </RouterLink>
    <RouterLink to="/spbu">
      <div class="card">
        <p>test huruf panjang</p>
        <h3>test</h3>
      </div>
    </RouterLink>
  </div>
</template>

<style scoped>
.container-cards {
  display: flex;
  gap: 15px;
  margin: 30px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  border: solid 1px red;
  border-radius: 5px;
  text-align: center;
  background-color: #121212;
  color: white;
  font-family: "Lexend Deca", "sans-serif";
  text-decoration: none;
}
</style>

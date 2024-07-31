<template>
    <div class="search-container">
        <form method="get">
            <input
                type="text"
                name="cari"
                placeholder="Cari apa hari ini?"
                autocomplete="off"
            />
            <button type="submit">Cari</button>
        </form>
    </div>
</template>

<style scoped>
.search-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.search-container input {
    padding: 10px;
    border-radius: 15px;
    border: none;
    width: 300px;
    margin-right: 5px;
}
.search-container input:focus {
    outline: none;
}
.search-container button {
    padding: 10px 20px;
    border: none;
    border-radius: 15px;
    background-color: blue;
    color: white;
    cursor: pointer;
}
</style>

<script setup>
const props = defineProps(["islands", "provinces"]);

const filteredProvinces = (island) => {
    return props.provinces.filter(
        (province) => province.island_id == island.island_id,
    );
};
</script>

<template>
    <section class="list-spbu">
        <div
            class="list-column"
            v-for="island in props.islands"
            :key="island.island_id"
        >
            <table>
                <thead>
                    <tr>
                        <th>{{ island.name }}</th>
                        <th>{{ island.spbu_count }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="province in filteredProvinces(island)"
                        :key="province.province_id"
                    >
                        <td>{{ province.name }}</td>
                        <td>{{ province.spbu_count }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<style scoped>
.list-spbu {
    display: flex;
    justify-content: space-around;
    background-color: #000000;
    padding: 10px;
    font-size: 0.75em;
    border-top: 1px solid #ff0000;
    z-index: 1;
}

.list-column {
    width: 14%;
}

table {
    width: 100%;
}

th {
    text-align: left;
    padding-bottom: 5px;
    border-bottom: 1px solid #ffffff;
}

td {
    padding: 5px 0;
}

td:not(:first-child),
th:not(:first-child) {
    text-align: right;
}

/* Mobile View */
@media (max-width: 500px) {
    .list-spbu {
        display: grid;
        grid-template-columns: auto auto;
    }

    .list-column {
        width: 100%;
        margin-bottom: 20px;
    }

    table {
        display: block;
        width: 100%;
    }

    tbody {
        display: block;
    }
    th {
        padding: 10px;
    }
    tr {
        display: flex;
        flex-direction: row;
    }

    td {
        padding: 5px;
        display: flex;
        flex-direction: row;
        text-align: left;
    }
}
</style>

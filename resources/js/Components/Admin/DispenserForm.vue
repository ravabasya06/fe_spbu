<script setup>
import Button from "../../Components/Main/Button.vue";
</script>

<template>
    <div class="Dispenser-Form">
        <div class="container">
            <h2>Edit DISPENSER</h2>

            <form id="adminForm">
                <div class="form-group">
                    <fieldset disabled="disabled">
                        <label for="idDispenser">ID DISPENSER:</label>
                        <input
                            type="text"
                            id="idDispenser"
                            name="idDispenser"
                            placeholder="Masukkan ID"
                        />
                    </fieldset>
                    <label for="queue">QUEUE:</label>
                    <input
                        type="number"
                        id="queue"
                        name="queue"
                        placeholder="0"
                        min="0"
                        value="0"
                        required
                    />
                </div>
                <Button type="submit" value="Update" color="blue" />
            </form>
        </div>
    </div>
</template>
<style scoped>
.Dispenser-Form {
    display: flex;
    justify-content: center;
}

.container {
    border: 1px solid #ffffff;
    max-width: 750px;
    width: 100%;
    margin: 20px;
    background: #000000;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    color: #fff;
}
h2 {
    text-align: center;
    color: #ffffff;
    margin-bottom: 20px;
}
form {
    display: flex;
    flex-direction: column;
}
.form-group {
    margin-bottom: 30px;
}
label {
    display: block;
    margin-bottom: 10px;
    font-size: 1.2em;
}
input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 12px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1.1em;
}
</style>

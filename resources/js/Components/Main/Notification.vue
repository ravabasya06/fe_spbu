<template>
    <div v-if="$page.props.flash.message" class="alert">
        <font-awesome-icon
            icon="circle-info"
            size="lg"
            style="color: #ffffff"
        />
        {{ $page.props.flash.message }}
    </div>
</template>
<style scope>
.alert {
    margin: 15px;
    position: absolute;
    z-index: 4;
    width: max-content;
    border: solid 1px white;
    border-radius: 10px;
    color: white;
    background-color: black;
}
</style>

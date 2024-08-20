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
    left: 10px;
    top: 10px;
    width: max-content;
    border-radius: 10px;
    color: white;
    background-color: black;
}
</style>

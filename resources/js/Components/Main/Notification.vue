<template>
    <div v-if="$page.props.flash.message" class="alert">
        {{ $page.props.flash.message }}
    </div>
</template>
<style scope>
.alert {
    color: white;
    background-color: black;
}
</style>

<template>
    <input class="custom-control-input"
           type="radio"
           v-bind:id=id
           v-bind:name=name
           v-bind:value=value
           v-bind:checked=checked
    >
</template>

<script>
    export default {
        name: "BaseRadio",
        props: {
            id: {
                type:String,
                required:true,
            },
            name: {
                type:String,
                required:true,
            },
            value: {
                type:String,
                required:true,
            },
            checked: {
                type:Boolean,
                default:false
            }
        },
    }
</script>

<style scoped>

</style>

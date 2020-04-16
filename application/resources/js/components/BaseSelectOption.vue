<template>
    <option v-bind:value=value>{{ text }}</option>
</template>

<script>
export default {
    name: "BaseSelectOption",
    props: {
        value: {
            type:String,
            required:true,
        },
        text: {
            type:String,
            required:true,
        },
    },
}
</script>

<style scoped>

</style>

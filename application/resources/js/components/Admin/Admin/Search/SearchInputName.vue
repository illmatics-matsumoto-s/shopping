<template>
    <div class="col-md-6 mb-3">
        <search-input-name-input
            v-bind:value=name
        >
        </search-input-name-input>
    </div>
</template>

<script>
    import SearchInputNameInput from "./SearchInputNameInput";
    export default {
        name: "SearchInputName",
        components:{SearchInputNameInput},
        props: {
            name: {
                type:String,
            },
        }
    }
</script>

<style scoped>

</style>

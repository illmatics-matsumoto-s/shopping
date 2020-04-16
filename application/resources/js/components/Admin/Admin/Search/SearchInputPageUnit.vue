<template>
    <div class="col-md-2 mb-3">
        <search-input-page-unit-select
            v-bind:pageUnit=pageUnit
        >
        </search-input-page-unit-select>
    </div>
</template>

<script>
import SearchInputPageUnitSelect from "./SearchInputPageUnitSelect";
export default {
    name: "SearchInputPageUnit",
    components:{SearchInputPageUnitSelect},
    props: {
        pageUnit:{
            type:String,
            required:true,
        },
    },
}
</script>

<style scoped>

</style>

<template>
    <div class="col-md-4 mb-3">
        <search-input-sort-direction-select
            v-bind:sortDirection=sortDirection
        >
        </search-input-sort-direction-select>
    </div>
</template>

<script>
import SearchInputSortDirectionSelect from "./SearchInputSortDirectionSelect";
export default {
    name: "SearchInputSortDirection",
    components:{SearchInputSortDirectionSelect},
    props: {
        sortDirection:{
            type:String|null,
            required:true,
        },
    },
}
</script>

<style scoped>

</style>

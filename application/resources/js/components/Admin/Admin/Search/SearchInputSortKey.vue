<template>
    <div class="col-md-4 mb-3">
        <search-input-sort-key-select
            v-bind:sortKey=sortKey
        >
        </search-input-sort-key-select>
    </div>
</template>

<script>
import SearchInputSortKeySelect from "./SearchInputSortKeySelect";
export default {
    name: "SearchInputSortKey",
    components:{SearchInputSortKeySelect},
    props: {
        sortKey:{
            type:String,
            required:true,
        },
    },
}
</script>

<style scoped>

</style>

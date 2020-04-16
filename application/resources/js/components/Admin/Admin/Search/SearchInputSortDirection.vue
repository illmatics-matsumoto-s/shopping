<template>
  <div class="col-md-4 mb-3">
    <SearchInputSortDirectionSelect
      v-bind:sort-direction=sortDirection
    >
    </SearchInputSortDirectionSelect>
  </div>
</template>

<script>
import SearchInputSortDirectionSelect from "./SearchInputSortDirectionSelect";
export default {
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

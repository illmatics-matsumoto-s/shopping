<template>
  <div class="col-md-4 mb-3">
    <SearchInputSortKeySelect
      v-bind:sortKey=sortKey
    >
    </SearchInputSortKeySelect>
  </div>
</template>

<script>
import SearchInputSortKeySelect from "./SearchInputSortKeySelect";
export default {
  components:{SearchInputSortKeySelect},
  props: {
    sortKey:{
      type:String|null,
      required:true,
    },
  },
}
</script>

<style scoped>

</style>

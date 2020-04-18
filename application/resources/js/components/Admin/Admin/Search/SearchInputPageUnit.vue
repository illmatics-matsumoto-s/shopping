<template>
  <div class="col-md-2 mb-3">
    <SearchInputPageUnitSelect
      v-bind:page-unit=pageUnit
    >
    </SearchInputPageUnitSelect>
  </div>
</template>

<script>
import SearchInputPageUnitSelect from "./SearchInputPageUnitSelect";
export default {
  components:{SearchInputPageUnitSelect},
  props: {
    pageUnit:{
      type:String|null,
      required:true,
    },
  },
}
</script>

<style scoped>

</style>

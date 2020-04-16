<template>
  <div class="col-md-2 mb-3">
    <SearchInputPageUnitSelect
      v-bind:pageUnit=pageUnit
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

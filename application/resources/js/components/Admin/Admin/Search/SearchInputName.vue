<template>
  <div class="col-md-6 mb-3">
    <SearchInputNameInput
      v-bind:value=name
    >
    </SearchInputNameInput>
  </div>
</template>

<script>
import SearchInputNameInput from "./SearchInputNameInput";
export default {
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

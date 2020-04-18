<template>
  <div class="col-md-6 mb-3">
    <SearchInputMailInput
      v-bind:value=email
    >
    </SearchInputMailInput>
  </div>
</template>

<script>
import SearchInputMailInput from "./SearchInputMailInput";
export default {
  components:{SearchInputMailInput},
  props: {
    email: {
      type:String,
    },
  }
}
</script>

<style scoped>

</style>

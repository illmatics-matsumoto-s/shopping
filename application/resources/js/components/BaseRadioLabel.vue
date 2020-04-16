<template>
  <label class="custom-control-label"
      v-bind:for=id
  >
  {{text}}
  </label>
</template>

<script>
export default {
  props: {
    id:{
      type:String,
      require:true,
    },
    text:{
      type:String,
    }
  }
}
</script>

<style scoped>

</style>

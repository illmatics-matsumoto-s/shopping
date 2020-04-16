<template>
  <button type="submit"
      v-bind:class=classes
  >
    {{text}}
  </button>
</template>

<script>
export default {
  props:{
    classes:{
      type:Array,
    },
    text:{
      type:String,
      require:true,
    }
  },
}
</script>

<style scoped>

</style>

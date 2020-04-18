<template>
  <option v-bind:value=value>{{ text }}</option>
</template>

<script>
export default {
  props: {
    value: {
      type:String,
      required:true,
    },
    text: {
      type:String,
      required:true,
    },
  },
}
</script>

<style scoped>

</style>

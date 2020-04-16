<template>
  <BaseInput
    name="name"
    id="name"
    v-bind:value=value
    type="text"
    placeholder="名称"
    v-bind:autofocus="true"
  ></BaseInput>
</template>

<script>
import BaseInput from "../../../BaseInput";
export default {
  components:{BaseInput},
  props: {
    value: {
      type:String
    }
  },
}
</script>

<style scoped>

</style>

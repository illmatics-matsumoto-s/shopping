<template>
  <BaseInput
    name="email"
    id="email"
    v-bind:value=value
    type="text"
    placeholder="メールアドレス"
  ></BaseInput>
</template>

<script>
import BaseInput from "../../../BaseInput";
export default {
  components:{BaseInput},
  props: {
    value:{
      type:String
    }
  },
}
</script>

<style scoped>

</style>

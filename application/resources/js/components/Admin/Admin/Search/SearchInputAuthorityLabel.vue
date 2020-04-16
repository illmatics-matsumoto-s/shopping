<template>
  <label v-bind:for=$_baseRadioLabel_for(value)
      class="custom-control-label"
  >
    {{text}}
  </label>
</template>

<script>
import BaseRadioLabel from "../../../BaseRadioLabel";
export default {
  components:{BaseRadioLabel},
  props: {
    prefix: {
      type:String,
      require:true
    },
    value: {
      type:String,
      require:true
    },
    text: {
      type:String,
    },
  },
  methods :{
    $_baseRadioLabel_for:function ($_value) {
      return this.prefix + "-" + $_value
    }
  }
}
</script>

<style scoped>

</style>

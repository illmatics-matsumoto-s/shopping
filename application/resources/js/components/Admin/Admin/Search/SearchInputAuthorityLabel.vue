<template>
  <base-radio-label
    v-bind:for="$_baseRadioLabel_for()"
    v-bind:text=text
  ></base-radio-label>
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
    $_baseRadioLabel_for:function () {
      return this.prefix + "-" + this.value
    }
  }
}
</script>

<style scoped>

</style>

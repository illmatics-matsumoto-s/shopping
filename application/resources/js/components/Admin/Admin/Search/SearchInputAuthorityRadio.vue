<template>
  <base-radio v-bind:id="$_baseRadio_labelName(value)"
        name="authority"
        v-bind:value=value
        v-bind:checked=$_baseRadio_isChecked()
  >
  </base-radio>
</template>

<script>
import BaseRadio from "../../../BaseRadio";
export default {
  components: {BaseRadio},
  props: {
    prefix: {
      type:String,
      require:true
    },
    value: {
      type:String,
      require:true
    },
    checked:{
      type:String,
      require:true,
    },
  },
  methods :{
    $_baseRadio_labelName:function ($_value) {
      return this.prefix + "-" + $_value
    },
    // 算出プロパティのほうが適切か検討
    $_baseRadio_isChecked: function () {
      return this.checked === this.value;
    },
  },
}
</script>

<style scoped>

</style>

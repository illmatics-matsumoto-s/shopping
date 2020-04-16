<template>
  <BaseSelectOption
    v-bind:value=value
    v-bind:text="labelText()"
  >
  </BaseSelectOption>
</template>

<script>
import BaseSelectOption from "../../../BaseSelectOption";
export default {
  components: {BaseSelectOption},
  props: {
    value:{
      type:String,
      default:'10',
      validator:function (value) {
        return ['10','20','50','100'].indexOf(value) !== -1
      },
      require:true,
    },
    strValue:{
      type:String,
    },
    placeholder:{
      type:String,
    }
  },
  methods:{
    labelText : function () {
      return this.placeholder + ":" + this.strValue
    }
  },
}
</script>

<style scoped>

</style>

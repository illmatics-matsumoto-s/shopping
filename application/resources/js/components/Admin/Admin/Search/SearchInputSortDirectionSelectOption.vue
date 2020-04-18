<template>
  <BaseSelectOption
    v-bind:value=value
    v-bind:text="$_baseSelectLabel_for()"
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
      default:'asc',
      validator:function (value) {
        return ['asc','desc'].indexOf(value) !== -1
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
    $_baseSelectLabel_for : function () {
      return this.placeholder + ":" + this.strValue
    }
  },
}
</script>

<style scoped>

</style>

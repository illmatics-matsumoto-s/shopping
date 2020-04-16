<template>
  <select class="form-control"
      v-model=selected
      v-bind:id=id
      v-bind:name=name
  >
    <SearchInputSortKeySelectOption
      v-for="(value,index) in values"
      v-bind:key="value"
      v-bind:value="index"
      v-bind:str-value="value"
      v-bind:placeholder="placeholder"
    ></SearchInputSortKeySelectOption>
  </select>
</template>

<script>
import SearchInputSortKeySelectOption from "./SearchInputSortKeySelectOption";
export default {
  components: {SearchInputSortKeySelectOption},
  props: {
  sortKey:{
    type:String,
    default:'id',
    validator:function (value) {
    return ['id', 'name', 'email'].indexOf(value) !== -1
    },
  },

  },
  data:function () {
  return {
    id : 'sort_key',
    name: 'sort_key',
    prefix: 'sort_key',
    values:{
    'id' : 'ID',
    'name' : '名称',
    'email' : 'メールアドレス',
    },
    placeholder: '並び替え',
    selected:this.sortKey,
  }
  },
}
</script>

<style scoped>

</style>

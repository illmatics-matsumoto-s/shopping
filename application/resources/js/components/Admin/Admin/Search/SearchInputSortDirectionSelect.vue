<template>
  <select class="form-control"
      v-model=selected
      v-bind:id=id
      v-bind:name=name
  >
    <SearchInputSortDirectionSelectOption
      v-for="(value,index) in values"
      v-bind:key="value"
      v-bind:value="index"
      v-bind:str-value="value"
      v-bind:placeholder="placeholder"
    ></SearchInputSortDirectionSelectOption>
  </select>
</template>

<script>
import SearchInputSortDirectionSelectOption from "./SearchInputSortDirectionSelectOption";
export default {
  components: {SearchInputSortDirectionSelectOption},
  props: {
    sortDirection:{
      type:String,
      default:'asc',
      validator:function (value) {
        return ['asc','desc'].indexOf(value) !== -1
      },
    },
  },
  data:function () {
    return {
      id : 'sort_direction',
      name: 'sort_direction',
      prefix: 'sort_direction',
      values:{
        'asc' : '昇順',
        'desc' : '降順',
      },
      placeholder: '並び替え順',
      selected:this.sortDirection,
    }
  },
}
</script>

<style scoped>

</style>

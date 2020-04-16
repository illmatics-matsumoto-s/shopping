<template>
  <div class="col-md-12 mb-3">
    <div class="custom-control custom-radio custom-control-inline"  v-for="(strValue,value) in values">
      <SearchInputAuthorityRadio
        prefix="is-owner"
        v-bind:value=value
        v-bind:checked=authority
      >
      </SearchInputAuthorityRadio>

      <SearchInputAuthorityLabel
        prefix="is-owner"
        v-bind:text=strValue
        v-bind:value=value
      ></SearchInputAuthorityLabel>
    </div>
  </div>
</template>

<script>
import SearchInputAuthorityLabel from "./SearchInputAuthorityLabel";
import SearchInputAuthorityRadio from "./SearchInputAuthorityRadio";
export default {
  components:{SearchInputAuthorityLabel,SearchInputAuthorityRadio},
  props: {
    authority: {
      type:String,
      default:'all'
    },
  },
  data:function () {
    return {
      values :{
        'all' : 'すべての権限',
        'owner' : 'オーナー',
        'ordinary' : '一般'
      }
    }
  },
}
</script>

<style scoped>

</style>

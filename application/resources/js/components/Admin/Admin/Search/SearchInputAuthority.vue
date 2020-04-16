<template>
  <div>
    <div class="custom-control custom-radio custom-control-inline"  v-for="(strValue,value) in values">
      <search-input-authority-radio
        prefix="is-owner"
        v-bind:value=value
        v-bind:checked=authority
      >
      </search-input-authority-radio>

      <search-input-authority-label
        prefix="is-owner"
        v-bind:text=strValue
        v-bind:value=value
      ></search-input-authority-label>
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

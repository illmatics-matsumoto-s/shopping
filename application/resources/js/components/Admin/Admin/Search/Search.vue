<template>
  <div>
    <div class="form-row">
      <SearchInputName
        v-bind:name="request.name"
      ></SearchInputName>

      <SearchInputMail
        v-bind:email="request.email"
      ></SearchInputMail>
    </div>

    <div class="form-row">
      <SearchInputAuthority
        v-bind:authority="request.authority"
      ></SearchInputAuthority>
    </div>

    <div class="form-row">
      <!-- 並び替え -->
      <SearchInputSortKey
        v-bind:sort-key="request.sortKey"
      ></SearchInputSortKey>

      <!-- 並び替え順 -->
      <SearchInputSortDirection
        v-bind:sort-direction="request.sortDirection"
      ></SearchInputSortDirection>

      <!-- 表示 -->
      <SearchInputPageUnit
        v-bind:page-unit="request.pageUnit"
      ></SearchInputPageUnit>

      <!-- 検索 -->
      <SearchButtonSubmit></SearchButtonSubmit>

    </div>
  </div>
</template>

<script>
import SearchInputName from "./SearchInputName";
import SearchInputMail from "./SearchInputMail";
import SearchInputAuthority from "./SearchInputAuthority";
import SearchInputSortKey from "./SearchInputSortKey";
import SearchInputSortDirection from "./SearchInputSortDirection";
import SearchInputPageUnit from "./SearchInputPageUnit";
import SearchButtonSubmit from "./SearchButtonSubmit";

export default {
  components:{
    SearchInputSortKey,
    SearchInputName,
    SearchInputMail,
    SearchInputAuthority,
    SearchInputSortDirection,
    SearchInputPageUnit,
    SearchButtonSubmit,
  },
  props:{
    request: {
      type: Object|Array,
      required:true,
      name:{
        type:String,
      },
      email:{
        type:String,
      },
      authority:{
        type:String,
      },
      sortKey:{
        type:String,
      },
      sortDirection:{
        type:String,
      },
      pageUnit:{
        type:String,
      },
    },
  },
}
</script>

<style scoped>

</style>

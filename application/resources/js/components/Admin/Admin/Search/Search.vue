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
        v-bind:sortKey="request.sort_key"
      ></SearchInputSortKey>

      <!-- 並び替え順 -->
      <SearchInputSortDirection
        v-bind:sortDirection="request.sort_direction"
      ></SearchInputSortDirection>

      <!-- 表示 -->
      <SearchInputPageUnit
        v-bind:pageUnit="request.page_unit"
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
      // todo:スネークケースからキャメルにリファクタリングしたい(リクエストの対応)
      sort_key:{
        type:String,
      },
      // todo:スネークケースからキャメルにリファクタリング(リクエストの対応)
      sort_direction:{
        type:String,
      },
      // todo:スネークケースからキャメルにリファクタリング(リクエストの対応)
      page_unit:{
        type:String,
      },
    },
  },
}
</script>

<style scoped>

</style>

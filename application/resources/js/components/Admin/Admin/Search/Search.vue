<template>
  <div>
    <div class="form-row">
      <search-input-name
        v-bind:name="request.name"
      ></search-input-name>

      <search-input-mail
        v-bind:email="request.email"
      ></search-input-mail>
    </div>

    <div class="form-row">
      <search-input-authority
        v-bind:authority="request.authority"
      ></search-input-authority>
    </div>

    <div class="form-row">
      <!-- 並び替え -->
      <search-input-sort-key
        v-bind:sortKey="request.sort_key"
      ></search-input-sort-key>

      <!-- 並び替え順 -->
      <search-input-sort-direction
        v-bind:sortDirection="request.sort_direction"
      ></search-input-sort-direction>

      <!-- 表示 -->
      <search-input-page-unit
        v-bind:pageUnit="request.page_unit"
      ></search-input-page-unit>

      <!-- 検索 -->
      <search-button-submit></search-button-submit>

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

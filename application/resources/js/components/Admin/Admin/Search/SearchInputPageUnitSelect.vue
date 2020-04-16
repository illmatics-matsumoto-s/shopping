<template>
    <select class="form-control"
            v-model=selected
            v-bind:id=id
            v-bind:name=name
    >
        <search-input-page-unit-select-option
            v-for="(value,index) in values"
            v-bind:key="value"
            v-bind:value="index"
            v-bind:strValue="value"
            v-bind:placeholder="placeholder"
        ></search-input-page-unit-select-option>
    </select>
</template>

<script>
import SearchInputPageUnitSelectOption from "./SearchInputPageUnitSelectOption";
export default {
    name: "SearchInputPageUnitSelect",
    components: {SearchInputPageUnitSelectOption},
    props: {
        pageUnit:{
            type:String,
            default:'10',
            validator:function (value) {
                return ['10','20','50','100'].indexOf(value) !== -1
            },
        },
    },
    data:function () {
        return {
            id : 'sort_direction',
            name: 'sort_direction',
            prefix: 'sort_direction',
            values:{
                '10':'10',
                '20':'20',
                '50':'50',
                '100':'100',
            },
            placeholder: '表示',
            selected:this.pageUnit,
        }
    },
}
</script>

<style scoped>

</style>

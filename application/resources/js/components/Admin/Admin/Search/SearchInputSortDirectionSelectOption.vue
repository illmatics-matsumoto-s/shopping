<template>
    <base-select-option
        v-bind:value=value
        v-bind:text="labelText()"
    >
    </base-select-option>
</template>

<script>
import BaseSelectOption from "../../../BaseSelectOption";
export default {
    name: "SearchInputSortDirectionSelectOption",
    components: {BaseSelectOption},
    props: {
        value:{
            type:String,
            default:'id',
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
        labelText : function () {
            return this.placeholder + ":" + this.strValue
        }
    },
}
</script>

<style scoped>

</style>

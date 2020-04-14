<template>
    <select class="form-control" v-model="selected" v-bind:id="id" v-bind:name="name">
        <option v-for="(strValue,value) in values" v-bind:value="value">{{ placeholder(placeholderText,strValue) }}</option>
    </select>
</template>

<script>
    export default {
        name: "AdminSearchSelectBox",
        props:{
            id:String,
            name:String,
            placeholderText:String,
            values:Object,
            selectedIndex:String
        },

        data :function () {
            return {
                selected:(this.selectedIndex),
            }
        },
        methods : {
            placeholder : function (_value,_strValue) {
                return _value + ":" + _strValue;
            }
        }
    }
</script>

<style scoped>

</style>

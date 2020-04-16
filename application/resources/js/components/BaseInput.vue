<template>
    <!-- todo:オートフォーカスの制御を見直す   -->
    <input class="form-control"
           v-bind:id=id
           v-bind:name=name
           v-bind:value=value
           v-bind:type=type
           v-bind:placeholder=placeholder
           v-bind:autofocus=getAutoFocus()
           >
</template>

<script>
    export default {
        name: "BaseInput",
        props: {
            id: {
                type:String,
                required:true,
            },
            name: {
                type:String,
                required:true,
            },
            value: {
                type:String,
            },
            type: {
                type:String,
                required:true,
                validator: function (value) {
                    // Todo:許可する入力フォーマットを追加する
                    return ['text'].indexOf(value) !== -1
                }
            },
            placeholder: {
                type:String,
                default:null
            },
            autofocus: {
                type:Boolean,
                default:false
            }
        },
        methods: {
            getAutoFocus:function () {
                return (this.autofocus)
                    ? "autofocus"
                    : null;
            },
        }
    }
</script>

<style scoped>

</style>

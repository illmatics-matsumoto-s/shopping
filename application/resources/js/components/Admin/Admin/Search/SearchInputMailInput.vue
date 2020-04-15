<template>
    <base-input
        name="email"
        id="email"
        v-bind:value=value
        type="text"
        placeholder="メールアドレス"
    ></base-input>
</template>

<script>
    import BaseInput from "../../../BaseInput";
    export default {
        name: "SearchInputMailInput",
        components:{BaseInput},
        props: {
            value:{
                type:String
            }
        },
    }
</script>

<style scoped>

</style>

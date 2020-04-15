<template>
    <div class="col-md-6 mb-3">
        <search-input-mail-input
            v-bind:value=email
        >
        </search-input-mail-input>
    </div>
</template>

<script>
    import SearchInputMailInput from "./SearchInputMailInput";
    export default {
        name: "SearchInputMail",
        components:{SearchInputMailInput},
        props: {
            email: {
                type:String,
            },
        }
    }
</script>

<style scoped>

</style>

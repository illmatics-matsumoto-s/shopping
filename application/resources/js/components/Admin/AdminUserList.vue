<template>
<div class="pt-2">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">名称</th>
            <th scope="col">メールアドレス</th>
            <th scope="col">権限</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(user,index) in users.data">
            <td>{{ user.id }}</td>
            <td><a>{{ user.name }}</a></td>
            <td>{{ user.email }}</td>
            <td>{{ is_owner[user.is_owner]}}</td>
        </tr>
        </tbody>
    </table>
</div>
</template>

<script>
    export default {
        name: "UserList",
        data: function()  {
            return {
                is_owner: [
                    '一般',
                    'オーナー'
                ],
            }
        },
        props:{
            users:Object,
        },
    }
</script>

<style scoped>

</style>

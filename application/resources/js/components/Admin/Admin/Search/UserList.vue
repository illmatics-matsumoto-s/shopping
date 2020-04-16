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
            <tr v-for="(user,index) in userList">
                <td>{{ user.id }}</td>
                <td><a>{{ user.name }}</a></td>
                <td>{{ user.email }}</td>
                <!-- todo:スネークケースを直す -->
                <td>{{ isOwner[user.is_owner]}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "SearchUserList",
    props:{
        users:Object,
    },
    data: function()  {
        return {
            //　todo:どこかから取得してObjectを受け取るだけにしたい。
            isOwner: [
                '一般',
                'オーナー'
            ],
            userList:this.users.data
        }
    },
}
</script>

<style scoped>

</style>

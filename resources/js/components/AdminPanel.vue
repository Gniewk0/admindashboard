<template>
<div class="d-flex justify-content-center">
    <Dashboard></Dashboard>
    <UserList>
        <p>no witam</p>
    </UserList>
</div>
</template>

<script>
    import UserList from './AdminPanelUserList';
    import Dashboard from './AdminPanelDashboard';
    export default {
        data(){
            return {
                users_id: '',
                users: [],
            }
        },
        components: {
            UserList,
            Dashboard,
        },
        mounted() {
            axios.get('/sesja')
                .then(response => this.users_id = response.data)
                .catch(error => this.errors.record(error.response.data));
        },
        watch: {
            'users_id': function(newVal, oldVal) {
                axios.get('/users', { params: {users_id: this.users_id}})
                    .then(response => console.log(response.data))
                    // .then(response => this.users.push[response.data])
                    .catch(error => this.errors.record(error.response.data));
            }
        },
        computed: {

        },
        methods: {

        }
    }
</script>

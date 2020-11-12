<template>
<div class="d-flex justify-content-center">
    <Dashboard>

    </Dashboard>
    <UserList>
        <ul class="list-group">
        <li class="list-group-item border-0" v-for="user in online" :key="user.id">
            <svg width="1em" height="1em" viewBox="0 0 16 16" :class="!user.away ? 'text-success' : 'text-warning'" class="bi bi-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <circle cx="7" cy="7" r="7"/>
            </svg>
            <span>{{user.name}}</span>
        </li>
        </ul>
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
                online: '',
                loginlist: ''
            }
        },
        components: {
            UserList,
            Dashboard,
        },
        mounted() {
            this.getOnlineUsers()
            this.getLoginList()
        },
        watch: {
            'users_id': function(newVal, oldVal) {
                axios.get('/users', { params: {users_id: this.users_id}})
                    .then(response => dataFix(response.data))
                    // .then(response => this.users.push[response.data])
                    .catch(error => this.errors.record(error.response.data));
            }
        },
        computed: {

        },
        methods: {
            getOnlineUsers(){
                axios.get('/onlineusers')
                .then(response => this.online = response.data)
                .catch(error => this.errors.record(error.response.data));
            },
            session(){
                axios.get('/sesja')
                .then(response => this.users_id = response.data)
                .catch(error => this.errors.record(error.response.data));
            },
            getLoginList(){
                axios.get('/loginlist')
                .then(response => console.log(response.data))
                .catch(error => this.errors.record(error.response.data));
            }
        }
    }
</script>

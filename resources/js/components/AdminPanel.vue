<template>
<div>
    <div class="d-flex justify-content-center">
        <Dashboard>
            <ul class="list-group">
                <li class="list-group-item border-0" v-for="login in loginlist" :key="login.id">
                    <span>{{login}}</span>
                </li>
            </ul>
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
    <div class="d-flex justify-content-center pt-2 mt-4">
        <Magicbutton>

        </Magicbutton>
    </div>
</div>
</template>

<script>
    import UserList from './AdminPanelUserList';
    import Dashboard from './AdminPanelDashboard';
    import Magicbutton from './AdminPanelMagicbutton';
    export default {
        data(){
            return {
                users_id: '',
                users: [],
                online: '',
                loginlist: [],
            }
        },
        watch: {
            'users_id': function(newVal, oldVal) {
                axios.get('/users', { params: {users_id: this.users_id}})
                    .then(response => dataFix(response.data))
                    // .then(response => this.users.push[response.data])
                    .catch(error => this.errors.record(error.response.data));
            }
        },
        components: {
            UserList,
            Dashboard,
            Magicbutton
        },
        mounted() {
            this.getOnlineUsers()
            this.getLoginList()
        },

        computed: {

        },
        methods: {
            dataFix(data){
                for(let i=0; i<data.lenght; i++){

                }
            },
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
                .then(response => this.loginlist = response.data)
                .catch(error => this.errors.record(error.response.data));
            },
        }
    }
</script>



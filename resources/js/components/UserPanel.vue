<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#" @click="getData()">Main Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <button class="btn btn-outline-secondary mx-2" type="submit" @click="showModal = true, searchcheck = false">Add</button>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model="search">
                    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" @click="searchmethod()">Search</button>
                </form>
            </div>
        </nav>

        <form>
            <div class="form-group mx-3">
                <label for="exampleFormControlTextarea1">Example textarea</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" v-model="textarea"></textarea>
            </div>
        </form>

        <div id="counter" class="flex flex-column mx-3">
            <button @click="decrementValue" class="button-reset bg-blue ba b--black ph4 pv3 mb2 white f4 dim">Decrement Counter Value</button>
            <button @click="incrementValue" class="button-reset bg-green ba b--black ph4 pv3 mb2 white f4 dim">Increments Counter Value</button>
            <button @click="resetValue" class="button-reset bg-red ba b--black ph4 pv3 mb2 white f4 dim">Reset Counter Value</button>
            <div class="f2 tc pa4 mv4 bg-light-gray ba b--light-silver">{{counter}}</div>
            <!--   <div class="ph4 pv4 ba b--black-20">
                <input type="text" v-model="firstName" placeholder="First Name" class="input-reset ba b--black-10 ph4 pv3" />
            <button @click="logName" class="button-reset pv3 ph2 bg-white ba b--black-20">Log User Name</button>
            </div> -->
        </div>

        <div class="d-flex justify-content-center pt-2 mt-4">
            <Magicbutton>
                <button type="button" class="btn btn-secondary button" @click="saveData">sus button</button>
            </Magicbutton>
        </div>
    </div>
</template>

<script>
    import Magicbutton from './Magicbutton';
    export default {
        data(){
            return {
                showModal: false,
                showModalEdit: false,
                data: [],
                searchcheck: false,
                search: '',
                curentId: '',
                textarea: '',
                counter: 0,
                firstName: ''
            }
        },
        components: {
            Magicbutton
        },
        mounted() {
            this.getText()
            this.getCount()
        },
        computed: {
            vuexdata: {
                get () {
                return this.$store.getters.getData
                },
                set (value) {
                    this.$store.commit('getData', value);
                }
            },
        },
        watch: {
        },
        methods: {
            getText(){
                axios.get('/usertextget', { textarea: this.textarea })
                    .then(response => this.textarea = response.data[0])
                    .catch(error => this.errors.record(error.response.data));
            },
            getCount(){
                axios.get('/usercountget', { counter: this.counter })
                    .then(response => this.counter = response.data[0])
                    .catch(error => this.errors.record(error.response.data));
            },
            getData(){
                this.getText()
                this.getCount()
            },
            saveData(){
                this.saveText(),
                this.saveCount()
            },
            saveText(){
                axios.post('/usertextsave', { textarea: this.textarea })
                    // .then(response => console.log(response.data))
                    .catch(error => this.errors.record(error.response.data));
            },
            saveCount(){
                axios.post('/usercountsave', { counter: this.counter })
                    // .then(response => console.log(response.data))
                    .catch(error => this.errors.record(error.response.data));
            },
            closeModal(){
                this.showModalEdit = false
                this.showModal = false
                this.showModalDestroy = false
                this.getData()
            },
            getData(){
                axios.get('/users')
                    .then(response => this.data = response.data)
                    .catch(error => this.errors.record(error.response.data));
            },
            searchmethod(){
                this.Searching(this.search)
            },
            getVuexData(){//pobiera dane wniosku dla e03 przez case_document_1_id
                this.$store.dispatch('getData');
            },
            Searching(value){
                axios.get('/users/search',{
                    params: {
                        key: value
                    }
                })
                .then((response) => {
                    this.data = response.data;
                },(error) => {
                    console.log(error);
                });
            },
            Delete(payload){
                if (confirm('Are you sure you want to delete this user?')) {
                axios.delete('/users', { params: { id: payload}})
                    .then(response => this.getData())
                    .catch(error => this.errors.record(error.response.data));
                }
            },
            // incrementValue: function(){
            //   return this.counter == ++this.counter;
            // },
            // resetValue: function(){
            //   this.counter = 0;
            // },
            // decrementValue: function(){
            //   return this.counter == --this.counter;
            // },
            incrementValue() {
            this.counter++;
            },
            decrementValue() {
            this.counter--;
            },
            resetValue() {
            this.counter = 0;
            },
            logName: function(){
            console.log('firstName:', this.firstName);
            }
        }
    }
</script>

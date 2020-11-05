<template>
<div class="d-flex justify-content-center">
    <div class="container col-md-8 mr-2">
        <div class="card">
            <div class="card-header">dashboard</div>

            <div class="card-body">
                <h1>hi</h1>
            </div>
        </div>
    </div>
    <div class="container col-md-3 ml-2">
        <div class="card">
            <div class="card-header">users online</div>

            <div class="card-body">
                <h1>hi</h1>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return {

            }
        },
        mounted() {
            axios.get('/sesja')
                .then(response => console.log(response.data))
                .catch(error => this.errors.record(error.response.data));
        },
        computed: {

        },
        methods: {

        }
    }
</script>

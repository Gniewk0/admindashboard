<template>
    <div class="container col-md-8 mr-2">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                <p>{{date}}</p>
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                date: new Date()
            }
        },
        mounted() {
        },
        computed: {

        },
        methods: {

        }
    }
</script>

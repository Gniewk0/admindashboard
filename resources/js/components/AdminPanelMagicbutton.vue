<template>
    <transition name="bounce">
        <button type="button" class="btn btn-secondary button">sus button</button>
    </transition>
</template>

<script>
    export default {
        data(){
            return {
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

<style scoped>
.button:active {
  transform: scale(1.1);
  transition: 0.1s
}
</style>

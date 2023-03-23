<template>
    <div>
       
        <navbar></navbar>
        <sidebar></sidebar>
       
       

        <router-view></router-view>
        
    </div>
</template>

<script>
import navbar from './components/navbar.vue';
import sidebar from './components/sidebar.vue';




    export default {
        components: {
        navbar,sidebar,
        }
    }
</script>

<style lang="scss" scoped>

</style>
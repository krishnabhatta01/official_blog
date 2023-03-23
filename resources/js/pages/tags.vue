<template>
    <div>
       
        <navbar></navbar>
        <sidebar></sidebar>

        <tags/>
           
    </div>
</template>

<script>
import navbar from '../components/navbar.vue';
import sidebar from '../components/sidebar.vue';
import tags from '../components/tags.vue';

    export default {
        components: {
        navbar,sidebar,tags,
        }
    }
</script>

<style lang="scss" scoped>

</style>
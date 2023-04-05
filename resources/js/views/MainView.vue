<template>
    <div class="main-container">
        <the-navbar/>
        <the-header/>
        <area-location/>
        <the-footer/>
    </div>
</template>

<script>
import TheNavbar from '../components/TheNavbar.vue'
import TheHeader from '../components/TheHeader.vue'
import AreaLocation from "../components/AreaLocation.vue";
import TheFooter from "../components/TheFooter.vue";

export default {
    name: 'MainView',
    components: {TheFooter, AreaLocation, TheNavbar, TheHeader },

}
</script>

<style scoped>

</style>

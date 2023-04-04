<template>
    <div class="main-container">
        <the-navbar/>
        <the-header/>
    </div>
</template>

<script>
import TheNavbar from '../components/TheNavbar.vue'
import TheHeader from '../components/TheHeader.vue'

export default {
    name: 'MainView',
    components: { TheNavbar, TheHeader },

}
</script>

<style scoped>

</style>

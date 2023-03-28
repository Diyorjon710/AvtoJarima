<template>
    <the-navbar/>
    <Header/>
  
</template>

<script>
import TheNavbar from '../components/ui/TheNavbar.vue'
import Header from '../components/Header.vue'

export default {
    name: 'MainView',
    components: { TheNavbar, Header },

}
</script>

<style>

</style>
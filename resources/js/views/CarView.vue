<template>
    <div class="car-container">
        <the-navbar/>
        <car-info-card/>
        <car-location/>
        <the-footer/>
    </div>
</template>

<script>
import TheNavbar from "../components/TheNavbar.vue";
import CarInfoCard from "../components/CarInfoCard.vue";
import CarLocation from "../components/CarLocation.vue";
import TheFooter from "@/components/TheFooter.vue";

export default {
    name: "CarView",
    components: {TheFooter, CarLocation, CarInfoCard, TheNavbar},

    computed: {
        carData() {
            return this.$store.getters.getCarData
        }
    },

    mounted() {
        console.log(this.carData)
    }
}
</script>

<style scoped>

</style>

<template>
    <div class="car-location-container">
        <div class="location-text">
            <div class="title">Maydon lokatsiyasi</div>
            <div class="link">{{ getCarData.maydon_nomi }}: <a href="#">{{ getCarData.maydon_lokatsiyasi }}</a></div>
        </div>
        <div class="location-map">
            <img src="/assets/main-page/img/maps.png" alt="MAP">
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "CarLocation",

    computed: {
        ...mapGetters(['getCarData'])
    }
}
</script>

<style scoped>

.car-location-container {
    margin-top: 100px;
    padding: 30px 350px;
    background-color: white;
}

.title {
    font-size: 2rem;
    font-family: Inter-Semibold;
    text-align: center;
    letter-spacing: -1.5px;
    margin: 0;
}

.link {
    text-align: center;
    font-family: Inter-Regular;
    font-size: 1rem;
    margin: 1.5rem 0;
}

.link a {
    color: var(--primary-blue);
}

.location-map {
    width: 1170px;
    margin: 0 auto;
}

</style>

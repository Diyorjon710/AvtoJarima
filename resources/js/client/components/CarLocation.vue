<template>
    <div class="car-location-container">
        <div class="location-text">
            <div class="title">Maydon lokatsiyasi</div>
            <div class="link">{{ getCarData.maydon_nomi }}</div>
        </div>
        <keep-alive>
            <div class="location-map">
                <div id="YMapsID2"></div>
            </div>
        </keep-alive>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "CarLocation",

    computed: {
        ...mapGetters(['getCarData'])
    },

    setup() {
        ymaps.ready(function () {
            var myMap = new ymaps.Map("YMapsID2", {
                center: [41.311153, 69.279729],
                zoom: 10
            });
        });
    },
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
    margin: 0 auto;
}

.location-map #YMapsID2 {
    height: 350px;
    object-fit: cover;
}

</style>

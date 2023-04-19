<template>
    <div class="location-container">
        <div class="location-title">Jarima maydonlari lokatsiyasi</div>
        <div class="location-filter">
            <div class="filter-area">
                <select name="viloyat" id="">
                    <option disabled selected>Viloyat</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                </select>
            </div>
            <div class="filter-area">
                <select name="tuman" id="">
                    <option disabled selected>Tuman</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                </select>
            </div>
            <div class="filter-area">
                <select name="maydon" id="">
                    <option disabled selected>Maydon</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                    <option>Toshkent shaxar</option>
                </select>
            </div>
            <button>Ko'rish</button>
        </div>
        <div class="location-map">
<!--            <img src="/assets/main-page/img/maps.png" alt="MAP">-->
<!--            <yandex-map :settings="settings"></yandex-map>-->
            <div id="YMapsID"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: "AreaLocation",

    setup() {
        ymaps.ready(function () {
            var myMap = new ymaps.Map("YMapsID", {
                center: [41.311153, 69.279729],
                zoom: 10
            });
        });
    },

    data() {
        return {

        }
    }
}
</script>


<style scoped>

.location-container {
    width: 100%;
    margin-top: 100px;
    background-color: white;
    padding: 50px 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.location-title {
    font-size: 2rem;
    font-family: Inter-Semibold;
    letter-spacing: -1.5px;
}

.location-filter {
    margin-top: 50px;
    display: flex;
    gap: 1.25rem;
}

.filter-area select {
    width: 200px;
    height: 50px;
    border-radius: 8px;
    font-size: 1rem;
    font-family: Inter-Regular;
    outline: none;
    opacity: 0.5;
    cursor: pointer;
    padding: 5px;
}

.location-filter button {
    width: 114px;
    background-color: var(--primary-blue);
    border: none;
    border-radius: 5px;
    font-family: Inter-Regular;
    font-size: 1rem;
    color: white;
}

.location-map {
    width: 65%;
    margin-top: 50px;
}

.location-map #YMapsID {
    width: 100%;
    height: 350px;
    object-fit: cover;
}

</style>
